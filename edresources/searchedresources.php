<?php
require '../../includes/db.php';
error_reporting(-1);
ini_set('display_errors', 'On');
$params = [];
if (isset($_POST['submit'])) {
  $page = (empty($_POST['page'])) ? 0 : intval($_POST['page']) - 1;
  $limit = 7;
  $offset = $limit * $page;
  $query = true;
  $sql = '';
  $search_query = '';
  foreach ($_POST as $key => $value) {
    if ($value === 'all' || $key === 'submit' || $key === 'query' || $key === 'page') {
      if ($key === 'query') {
        $search_query = $value;
      }
      continue;
    }
    foreach ($value as $v) {
      $sql .= "(`key` = ? AND value = ?) AND ";
      $params[] = str_replace('$WS$', ' ', $key);
      $params[] = str_replace('$WS$', ' ', $v);
      // $sql .= "(`key` = '".str_replace('$WS$', ' ', $key)."' AND value = '".str_replace('$WS$', ' ', $v)."') AND ";
    }
  }
  if ($sql !== '') {
    $sql = 'WHERE ' . substr($sql, 0, -4); // remove the final ' OR '
  }
  $sql2 = '';
  if (strlen($search_query) > 0) {
    $sql2 = ' AND (title LIKE ? OR id IN (SELECT lesson_id FROM cv_lesson_meta WHERE value LIKE ?))';
    $params[] = "%{$search_query}%";
    $params[] = "%{$search_query}%";
  }
  // var_dump($params);
  // echo "SELECT SQL_CALC_FOUND_ROWS id, title, pdf, published FROM cv_lessons WHERE id IN (SELECT lesson_id FROM cv_lesson_meta {$sql}){$sql2} ORDER BY published DESC LIMIT {$offset}, {$limit}";die;
  $stmt = $db->prepare("SELECT SQL_CALC_FOUND_ROWS id, title, pdf, published FROM cv_lessons WHERE id IN (SELECT lesson_id FROM cv_lesson_meta {$sql}){$sql2} ORDER BY published DESC LIMIT {$offset}, {$limit}");
  $stmt->execute($params);
  $search_results = $stmt->fetchAll();
  $count = $db->query('SELECT FOUND_ROWS();')->fetchColumn();
  $final_page = ceil($count / $limit);
} else {
  $query = false;
}
parse_str($_SERVER['QUERY_STRING'], $qs);
function cmp($a, $b) {
  $a = $a['value'];
  $b = $b['value'];
  if ($a == $b) {
    return 0;
  }
  $a_ = explode(' ', $a);
  $b_ = explode(' ', $b);
  if ($a_[0] === 'Grade' && $b_[0] === 'Grade') {
    return (intval($a_[1]) < intval($b_[1])) ? -1 : 1;
  }
  return ($a < $b) ? -1 : 1;
}
function format_key($str) {
  switch ($str) {
    case 'Select topic(s)':
      return 'Topic(s)';
    case 'Select subject(s)':
      return 'Subject(s)';
    case 'Select student level(s)':
      return 'Student level(s)';
    case 'Select grade level(s)':
      return 'Grade level(s)';
    case 'View units or lessons':
      return 'Type';
  }
  return $str;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Search our repository of Dashboard lesson plans that build on curricular standards and help students become better systems thinkers. Lessons use real data generated by students themselves and engage students in the power of speech to motivate pro-environmental thought and action.">
    <link rel="stylesheet" href="https://environmentaldashboard.org/css/bootstrap.css?v=<?php echo time(); ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=9ByOqqx0o3">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=9ByOqqx0o3">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=9ByOqqx0o3">
    <link rel="manifest" href="/manifest.json?v=9ByOqqx0o3">
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v=9ByOqqx0o3" color="#00a300">
    <link rel="shortcut icon" href="/favicon.ico?v=9ByOqqx0o3">
    <meta name="theme-color" content="#000000">
    <title>Environmental Dashboard</title>
  </head>
  <body>
    <div class="container">
      <?php include '../includes/header.php'; ?>
      <div class="row" style="padding: 30px">
        <div class="<?php echo ($query) ? 'col-12 col-sm-3' : 'col-12' ?>">
          <?php if (!$query) { ?>
          <h1 class="text-center">Search Lessons and Units</h1>
          <p>Educators from a variety of schools have creatively employed Environmental Dashboard to teach a variety of concepts, subjects and levels.  Use the selectors below to search our repository for Dashboard-related lessons and units by title, topic, grade level or any of the other search fields alone or in combination.</p>
          <p>For example, a search for the term "electricity" will take you to titles and summary descriptions of all lessons tagged as being related.  From  this list you can click and download PDFs of complete lessons.  This <a href="https://docs.google.com/document/d/1uJLghYhpDRiZadqeeacH2aUyiedKHI0DhQs_QWsQjLM/edit">Navigation Guide to BuildingOS</a> may be a useful resource as a general introduction to the tools and apps in the BuildingOS component of Dashboard.</p>
          <?php } ?>
          <form action="" method="POST">
            <div class="card bg-light mb-3">
              <div class="card-body">
                <div class="row">
                  <div class="col-12" style="margin-bottom: 10px">
                    <label for="query">Search</label>
                    <input type="text" class="form-control" id="query" name="query" value="<?php echo (isset($_POST['query'])) ? $_POST['query'] : '' ?>" placeholder="Enter search terms">
                  </div>
                  <?php foreach ($db->query('SELECT DISTINCT `key` FROM cv_lesson_meta ORDER BY `key` ASC') as $i => $row) {
                    if (in_array($row['key'], ['Materials', 'Objectives', 'Excerpt'])) {
                      continue;
                    }
                    echo ($query) ? "<div class='col-12'>" : "<div class='col-12 col-sm-6 col-md-4'>";
                    echo "<p style='margin-bottom:0px;margin-top:5px'>{$row['key']}</p>";
                    $encoded_key = str_replace(' ', '$WS$', $row['key']);
                    echo "<div style='max-height:130px;overflow-y:scroll'>";
                    $stmt = $db->prepare('SELECT DISTINCT value FROM cv_lesson_meta WHERE `key` = ? ORDER BY value ASC');
                    $stmt->execute([$row['key']]);
                    $isset = isset($_POST[$encoded_key]);
                    $rows = $stmt->fetchAll();
                    if ($row['key'] === 'Select grade level(s)') {
                      usort($rows, 'cmp');
                    }
                    foreach ($rows as $row2) {
                      $uniq = uniqid();
                      $encoded_val = str_replace(' ', '$WS$', $row2['value']);
                      if (
                          ($isset && is_array($_POST[$encoded_key]) && in_array($encoded_val, $_POST[$encoded_key])) || 
                          ($isset && $_POST[$encoded_key] === $encoded_val)
                        ) { // checked checkbox
                        $row2['value'] = ucwords($row2['value']);
                        echo "<div class=\"custom-control custom-checkbox\">
                        <input name=\"{$encoded_key}[]\" type=\"checkbox\" value=\"{$encoded_val}\" class=\"custom-control-input checkbox-btn{$i}\" id=\"{$uniq}\" data-triggeredBy=\"btn{$i}\" data-label=\"{$row2['value']}\" checked=\"checked\" />
                        <label class=\"custom-control-label\" for=\"{$uniq}\">{$row2['value']}</label></div>";
                      } else {
                        $row2['value'] = ucwords($row2['value']);
                        echo "<div class=\"custom-control custom-checkbox\">
                        <input name=\"{$encoded_key}[]\" type=\"checkbox\" value=\"{$encoded_val}\" class=\"custom-control-input checkbox-btn{$i}\" id=\"{$uniq}\" data-triggeredBy=\"btn{$i}\" data-label=\"{$row2['value']}\" />
                        <label class=\"custom-control-label\" for=\"{$uniq}\">{$row2['value']}</label></div>";
                      }
                    }
                    echo " </div></div>";
                  } ?>
                </div>
              </div>
              <div class="card-footer bg-transparent"><button type="button" id="reset" class="btn btn-secondary">Reset</button> <input type="submit" name="submit" value="Search" class="btn btn-primary"></div>
            </div>
          </form>
        </div>
        <?php if ($query) { ?>
        <div class="col-12 col-sm-9">
          <?php $pdf_id = 0;
          foreach ($search_results as $result) {
            $stmt = $db->prepare('SELECT DISTINCT `key`, value FROM cv_lesson_meta WHERE lesson_id = ? AND `key` != "Materials" GROUP BY value, `key` ORDER BY `key` DESC, value ASC');
            $stmt->execute([$result['id']]);
            echo "<div class='card bg-light mb-3'><div class='card-body'><h5 class='card-title'>{$result['title']}</h5>";
            $last_key = -1;
            $rows = $stmt->fetchAll();
            $count = count($rows);
            $buf = '';
            for ($i=0; $i < $count; $i++) {
              if ($rows[$i]['key'] === 'Excerpt') { // print excerpt first at top
                $buf .= "<p style='margin-bottom:2px' class='card-text classpdf{$pdf_id}'><b>{$rows[$i]['key']}</b>: {$rows[$i]['value']}</p>";
                break;
              }
            }
            for ($i=0; $i < $count; $i++) { 
              if ($rows[$i]['key'] === 'Excerpt') {
                continue;
              }
              if ($last_key !== $rows[$i]['key']) {
                $buf .= "<p style='margin-bottom:2px' class='card-text classpdf{$pdf_id}'><b>".format_key($rows[$i]['key'])."</b>: ";
              }
              $buf .= ($i === $count-1) ? "{$rows[$i]['value']}" : "{$rows[$i]['value']}, ";
              if ($i < $count-1 && $rows[$i + 1]['key'] !== $rows[$i]['key']) {
                $buf = substr($buf, 0, -2)."</p>";
              }
              $last_key = $rows[$i]['key'];
            }
            echo "{$buf}</p>";
            $result['pdf'] = trim($result['pdf']);
            echo "<embed src='' width='100%' height='600' type='application/pdf' style='display:none;margin-bottom:10px' id='pdf{$pdf_id}'>";
            echo "<p style='margin:15px 0px 0px 0px'><a class='btn btn-primary open-pdf' href='#' data-pdf-url='{$result['pdf']}' data-pdf-id='pdf{$pdf_id}'>Open PDF</a> <a class='btn btn-secondary' href='{$result['pdf']}' download>Download PDF</a></p></div></div>";
            $pdf_id++;
          }
          if ($pdf_id === 0) {
            echo "<h2 class='text-center'>No Results</h2><p class='text-center'>We couldn't find any lessons for your search query. Try broadening your search terms.</p>";
          } ?>
        </div>
        <?php } ?>
      </div>
      <?php if ($query) { ?>
      <div class="row" style="padding: 30px">
        <div class="col">
          <nav aria-label="Page navigation example" class="text-center">
            <ul class="pagination" style="display: inline-flex;">
              <?php if ($page > 0) { ?>
              <li class="page-item">
                <a class="page-link" href="?<?php echo http_build_query(array_replace($qs, ['page' => $page])) ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <?php }
              for ($i = 1; $i <= $final_page; $i++) {
                if ($page + 1 === $i) {
                  echo '<li class="page-item active"><a class="page-link" href="?'. http_build_query(array_replace($qs, ['page' => $i])).'">' . $i . '</a></li>';
                }
                else {
                  echo '<li class="page-item"><a class="page-link" href="?'. http_build_query(array_replace($qs, ['page' => $i])).'">' . $i . '</a></li>';
                }
              }
              if ($page + 1 < $final_page) { ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?php echo http_build_query(array_replace($qs, ['page' => $page+2])) ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
              <?php } ?>
            </ul>
          </nav>
        </div>
      </div>
      <?php } ?>
      <?php include '../includes/footer.php'; ?>
    </div>
    <?php include '../includes/js.php'; ?>
    <script>
      $('.open-pdf').on('click', function(e) {
        e.preventDefault();
        var id = $(this).data('pdf-id'),
            url = $(this).data('pdf-url'),
            pdf = $('#pdf'+id);
        if ($(this).text() === 'Open PDF') {
          $('.class'+id).css('display', 'none');
          $('#'+id).attr('src', url);
          $('#'+id).css('display', 'block');
          $(this).text('Back');
        } else {
          $('.class'+id).css('display', 'block');
          $('#'+id).css('display', 'none');
          $(this).text('Open PDF');
        }
      });
      $('#reset').on('click', function(e) {
        e.preventDefault();
        $('input:not(input[type="submit"])').val('');
        $('select').val('all');
        $('input:checkbox').removeAttr('checked');
      });
    </script>
  </body>
</html>

