<?php
require '../../includes/db.php';
error_reporting(-1);
ini_set('display_errors', 'On');
if (isset($_GET['submit'])) {
  $query = true;
  $sql = 'WHERE ';
  $params = [];
  foreach ($_GET as $key => $value) {
    if ($value === 'all' || $key === 'submit' || $key === 'query') {
      continue;
    }
    $sql .= "(`key` = ? AND value = ?) OR ";
    $params[] = str_replace('$WS$', ' ', $key);
    $params[] = str_replace('$WS$', ' ', $value);
  }
  $sql = substr($sql, 0, -3); // remove the final 'OR '
  $stmt = $db->prepare('SELECT id, title, pdf, gmt FROM cv_lessons WHERE id IN (SELECT lesson_id FROM cv_lesson_meta '. $sql.') ORDER BY gmt DESC');
  $stmt->execute($params);
  $search_results = $stmt->fetchAll();
  // var_dump('SELECT title, pdf, gmt FROM cv_lessons WHERE id IN (SELECT lesson_id FROM cv_lesson_meta '. $sql.')');
  // var_dump($params);die;
} else {
  $query = false;
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/css/bootstrap.css?v=<?php echo time(); ?>">
    <title>Environmental Dashboard</title>
  </head>
  <body>
    <div class="container">
      <?php include '../includes/header.php'; ?>
      <div class="row" style="padding: 30px">
        <div class="<?php echo($query) ? 'col-12 col-sm-3' : 'col-12' ?>">
          <?php if (!$query) { ?>
          <h1 class="text-center">Search K-12 Instructor Toolkit</h1>
          <p>The Search table below allows you to search through our entire library of lessons easily and efficiently. Use the search box to search lesson titles or one of our logical operators to refine your search. On this site, you will be able to search for Environmental Dashboard specific lessons as well as external teaching resources that utilize Environmental Dashboard as a tool.</p>
          <p>For example, you could search for a lesson with the keyword "electricity" to see all lessons tagged or titled "electricity" with their respective sub data for quick assessment. You could also add use any of the other search parameters such as "grade" and "author(s)". To reset your search, simply click "reset" icon. The number in the brackets indicate the total quantity of lessons for each specific field you include in a search.</p>
          <?php } ?>
          <form action="" method="GET">
            <div class="card bg-light mb-3">
              <div class="card-header bg-transparent">Search Lessons</div>
              <div class="card-body">
                <div class="row">
                  <div class="col-12" style="margin-bottom: 10px">
                    <label for="query">Search</label>
                    <input type="text" class="form-control" id="query" name="query" placeholder="Enter search terms">
                  </div>
                  <?php foreach ($db->query('SELECT DISTINCT `key` FROM cv_lesson_meta ORDER BY `key` ASC') as $row) {
                    echo ($query) ? "<div class='col-12'>" : "<div class='col-12 col-sm-6 col-md-4'>";
                    echo "<p>{$row['key']}</p>";
                    $encoded = str_replace(' ', '$WS$', $row['key']);
                    echo "<select name='{$encoded}' class='custom-select'>";
                    $stmt = $db->prepare('SELECT DISTINCT value FROM cv_lesson_meta WHERE `key` = ? ORDER BY value ASC');
                    $stmt->execute([$row['key']]);
                    echo "<option value='all'>All</option>";
                    foreach ($stmt->fetchAll() as $row2) {
                      $encoded = str_replace(' ', '$WS$', $row2['value']);
                      echo "<option value='{$encoded}'>{$row2['value']}</option>";
                    }
                    echo "</select></div>";
                  } ?>
                </div>
              </div>
              <div class="card-footer bg-transparent"><input type="submit" name="submit" value="Search" class="btn btn-primary"></div>
            </div>
          </form>
        </div>
        <?php if ($query) { ?>
        <div class="col-12 col-sm-9">
          <?php $pdf_id = 0;
          foreach ($search_results as $result) {
            $stmt = $db->prepare('SELECT DISTINCT `key`, value FROM cv_lesson_meta WHERE lesson_id = ? GROUP BY value, `key` ORDER BY `key` ASC');
            $stmt->execute([$result['id']]);
            echo "<div class='card bg-light mb-3'><div class='card-body'><h5 class='card-title'>{$result['title']}</h5>";
            $last_key = -1;
            $rows = $stmt->fetchAll();
            $count = count($rows);
            for ($i=0; $i < $count; $i++) { 
              if ($last_key !== $rows[$i]['key']) {
                echo "<p class='card-text class{$pdf_id}'><b>{$rows[$i]['key']}</b>: ";
              }
              echo "{$rows[$i]['value']}, ";
              if ($i < $count-1 && $rows[$i + 1]['key'] !== $rows[$i]['key']) {
                echo "</p>";
              }
              $last_key = $rows[$i]['key'];
            }
            echo "</p>";
            echo "<embed src='' width='100%' height='500' type='application/pdf' style='display:none' id='pdf{$pdf_id}'>";
            echo "<p><a class='btn btn-primary open-pdf' href='#' data-pdf-url='{$result['pdf']}' data-pdf-id='pdf{$pdf_id}'>Open PDF</a> <a class='btn btn-secondary' href='{$result['pdf']}' download>Download PDF</a></p>";
            echo "</div><div class='card-footer bg-light'>".date('F j Y', strtotime($result['gmt']))."</div></div>";
            $pdf_id++;
          } ?>
        </div>
        <?php } ?>
      </div>
      <?php include '../includes/footer.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      $('.open-pdf').on('click', function(e) {
        e.preventDefault();
        var id = $(this).data('pdf-id'),
            url = $(this).data('pdf-url'),
            pdf = $('#pdf'+id);
        $('.class'+id).attr('style', 'display:none');
        $('#'+id).attr('src', url);
        $('#'+id).css('display', 'initial');
      });
    </script>
  </body>
</html>