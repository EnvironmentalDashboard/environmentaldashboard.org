<?php
require '../../includes/db.php';
error_reporting(-1);
ini_set('display_errors', 'On');
$page = (empty($_GET['page'])) ? 0 : intval($_GET['page']) - 1;
$params = [];
$sub_where = false;
if (isset($_GET['search']) && trim($_GET['search']) !== '') {
  $tmp = getcwd();
  chdir('/var/www/repos/search/');
  $lucene_cmd = 'java -cp "/var/www/repos/search/.:/var/www/repos/search/mysql-connector-java-5.1.45/mysql-connector-java-5.1.45-bin.jar:/var/www/repos/search/lucene-7.2.1/core/lucene-core-7.2.1.jar:/var/www/repos/search/lucene-7.2.1/queryparser/lucene-queryparser-7.2.1.jar:/var/www/repos/search/lucene-7.2.1/analysis/common/lucene-analyzers-common-7.2.1.jar" search/SearchCVImages '.escapeshellarg($_GET['search']);
  $lucene = shell_exec($lucene_cmd);
  if ($lucene != '') {
    $WHERE = 'WHERE id IN ('.$lucene.') AND id IN (SELECT pid FROM cv_image_meta';
  } else {
    $WHERE = 'WHERE id = -1 AND id IN (SELECT pid FROM cv_image_meta'; // no results
  }
  chdir($tmp);
} else {
  $WHERE = 'WHERE id IN (SELECT pid FROM cv_image_meta';
}
$buf = '';
if (isset($_GET['msg_cat_select']) && $_GET['msg_cat_select'] !== 'all') {
  if (!$sub_where) {
    $WHERE .= ' WHERE';
    $sub_where = true;
  }
  $buf .= " (`key` = ? AND value = ?) AND";
  $params[] = 'Message Category';
  $params[] = $_GET['msg_cat_select'];
}
if (isset($_GET['msg_attr_select']) && $_GET['msg_attr_select'] !== 'all') {
  if (!$sub_where) {
    $WHERE .= ' WHERE';
    $sub_where = true;
  }
  $buf .= " (`key` = ? AND value = ?) AND";
  $params[] = 'Message Attribution';
  $params[] = $_GET['msg_attr_select'];
}
if (isset($_GET['photographer_select']) && $_GET['photographer_select'] !== 'all') {
  if (!$sub_where) {
    $WHERE .= ' WHERE';
    $sub_where = true;
  }
  $buf .= " (`key` = ? AND value = ?) AND";
  $params[] = 'Photographer';
  $params[] = $_GET['photographer_select'];
}
if (isset($_GET['org_select']) && $_GET['org_select'] !== 'all') {
  if (!$sub_where) {
    $WHERE .= ' WHERE';
    $sub_where = true;
  }
  $buf .= " (`key` = ? AND value = ?) AND";
  $params[] = 'Organization';
  $params[] = $_GET['org_select'];
}
if (isset($_GET['end_use_select']) && $_GET['end_use_select'] !== 'all') {
  if (!$sub_where) {
    $WHERE .= ' WHERE';
    $sub_where = true;
  }
  $buf .= " (`key` = ? AND value = ?) AND";
  $params[] = 'End Use';
  $params[] = $_GET['end_use_select'];
}
$unused_photos = '';
if (isset($_GET['unused_photos'])) {
 $unused_photos = " AND id NOT IN (SELECT pid FROM cv_image_meta WHERE `key` = 'Message Text') ";
}
if ($buf === '') {
  $WHERE .= ')';
} else {
  $WHERE .= (substr($buf, 0, -3) . ')');
}

// if (isset($_GET['search']) && trim($_GET['search']) !== '') {
//   if (isset($_GET['criteria'])) {
//     $whitelist = ['Message Text', 'Message Attribution', 'Date Photo Taken', 'Photographer', 'Organization', 'Parental Consent Documentation', 'Probability', 'Message Category', 'Interview Link', 'Date Added to Live Folder', 'Enable Decay', 'End Use'];
//     $key = [];
//     foreach ($_GET['criteria'] as $val) {
//       if (in_array($val, $whitelist)) {
//         $key[] = "'{$val}'";
//       }
//     }
//   }
//   $WHERE = 'WHERE alt LIKE ? OR id IN (SELECT pid FROM cv_image_meta WHERE `key` IN ('.implode(', ', $key).') AND value != \'\' AND value LIKE ?)';
//   $count = $db->prepare('SELECT COUNT(*) FROM cv_images '.$WHERE);
//   $count->execute(["%{$_GET['search']}%", "%{$_GET['search']}%"]);
//   $count = $count->fetchColumn();
// }
// else {
//   $count = $db->query("SELECT COUNT(*) FROM cv_images")->fetchColumn();
//   $WHERE = '';
// }
$limit = 18;
$offset = $limit * $page;
$stmt = $db->prepare("SELECT SQL_CALC_FOUND_ROWS id, fn, alt, gid FROM cv_images {$WHERE}{$unused_photos} ORDER BY imgdate DESC LIMIT {$offset}, {$limit}");
// var_dump("SELECT SQL_CALC_FOUND_ROWS id, fn, alt, gid FROM cv_images {$WHERE} ORDER BY imgdate DESC LIMIT {$offset}, {$limit}");var_dump($params);die;
$stmt->execute($params);
$results = $stmt->fetchAll();
$count = $db->query('SELECT FOUND_ROWS();')->fetchColumn();
$final_page = ceil($count / $limit);
$pids = implode(', ', array_column($results, 'id'));
$cv_image_meta = [];
if ($count > 0) {
  foreach ($db->query("SELECT pid, `key`, value FROM cv_image_meta WHERE (`key` = 'Message Text' OR `key` = 'Message Attribution') AND value != '' AND pid IN ({$pids}) ORDER BY pid") as $row) {
    $cv_image_meta[$row['pid']][$row['key']] = $row['value'];
  }
}
parse_str($_SERVER['QUERY_STRING'], $qs);
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include '../includes/html-head.php'; ?>
  </head>
  <body>
    <div class="modal fade" id="imageModal" tabindex="-1" role="dialog" aria-labelledby="imageModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="imageModalLabel"></h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img src="" alt="" id="modal-img" class="img-fluid" style="width: 100%">
            <p id="metadata" style="margin-top: 15px"></p>
          </div>
          <!-- <div class="modal-footer">
            <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
          </div> -->
        </div>
      </div>
    </div>


    <div class="container">
      <?php include '../includes/header.php'; ?>
      <div class="row" style="padding: 30px">
        <div class="col">
          <h1 class="text-center">Advanced Image Search</h1>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <form action="" method="GET" style="padding: 40px" id="form">
            <div class="form-group row">
              <label style="white-space: nowrap;" for="search" class="col-sm-2 col-form-label">Enter search terms</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="search" name="search" placeholder="Search" value="<?php echo (isset($_GET['search'])) ? $_GET['search'] : '' ?>">
              </div>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Filter search</legend>
                <div class="col-sm-10">
                  <div class="row">
                    <div class="col"> <!-- col-12 col-sm-6 col-md-4 -->
                      <label style="white-space: nowrap;" for="msg_cat_select">Message category</label>
                      <select class="custom-select" name="msg_cat_select" id="msg_cat_select">
                        <option value="all">All</option>
                        <?php foreach ($db->query('SELECT DISTINCT value FROM cv_image_meta WHERE value != \'\' AND `key` = \'Message Category\'') as $row) {
                          echo (isset($_GET['msg_cat_select']) && $_GET['msg_cat_select'] === $row['value']) ? "<option value='{$row['value']}' selected>{$row['value']}</option>" : "<option value='{$row['value']}'>{$row['value']}</option>";
                        } ?>
                      </select>
                    </div>
                    <div class="col">
                      <label style="white-space: nowrap;" for="msg_attr_select">Message Attribution</label>
                      <select class="custom-select" name="msg_attr_select" id="msg_attr_select">
                        <option value="all">All</option>
                        <?php foreach ($db->query('SELECT DISTINCT value FROM cv_image_meta WHERE value != \'\' AND `key` = \'Message Attribution\'') as $row) {
                          echo (isset($_GET['msg_attr_select']) && $_GET['msg_attr_select'] === $row['value']) ? "<option value='{$row['value']}' selected>{$row['value']}</option>" : "<option value='{$row['value']}'>{$row['value']}</option>";
                        } ?>
                      </select>
                    </div>
                    <div class="col">
                      <label style="white-space: nowrap;" for="photographer_select">Photographer</label>
                      <select class="custom-select" name="photographer_select" id="photographer_select">
                        <option value="all">All</option>
                        <?php foreach ($db->query('SELECT DISTINCT value FROM cv_image_meta WHERE value != \'\' AND `key` = \'Photographer\'') as $row) {
                          echo (isset($_GET['photographer_select']) && $_GET['photographer_select'] === $row['value']) ? "<option value='{$row['value']}' selected>{$row['value']}</option>" : "<option value='{$row['value']}'>{$row['value']}</option>";
                        } ?>
                      </select>
                    </div>
                    <div class="col">
                      <label style="white-space: nowrap;" for="org_select">Organization</label>
                      <select class="custom-select" name="org_select" id="org_select">
                        <option value="all">All</option>
                        <?php foreach ($db->query('SELECT DISTINCT value FROM cv_image_meta WHERE value != \'\' AND `key` = \'Organization\'') as $row) {
                          echo (isset($_GET['org_select']) && $_GET['org_select'] === $row['value']) ? "<option value='{$row['value']}' selected>{$row['value']}</option>" : "<option value='{$row['value']}'>{$row['value']}</option>";
                        } ?>
                      </select>
                    </div>
                    <div class="col">
                      <label style="white-space: nowrap;" for="end_use_select">End Use</label>
                      <select class="custom-select" name="end_use_select" id="end_use_select">
                        <option value="all">All</option>
                        <?php foreach ($db->query('SELECT DISTINCT value FROM cv_image_meta WHERE value != \'\' AND `key` = \'End Use\'') as $row) {
                          echo (isset($_GET['end_use_select']) && $_GET['end_use_select'] === $row['value']) ? "<option value='{$row['value']}' selected>{$row['value']}</option>" : "<option value='{$row['value']}'>{$row['value']}</option>";
                        } ?>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </fieldset>
            <div class="form-group row">
              <div class="col-sm-10 offset-sm-2">
                <div class="custom-control custom-checkbox">
                  <input type="checkbox" class="custom-control-input" name="unused_photos" id="unused_photos" <?php echo (isset($_GET['unused_photos'])) ? 'checked' : ''; ?>>
                  <label class="custom-control-label" for="unused_photos">Show only photos without text</label>
                </div>
                <button type="submit" class="btn btn-primary float-right">Search</button>
                <button type="button" id="reset" class="btn btn-secondary">Reset</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row" style="padding: 15px">
        <div class="col-12">
          <?php if ($count === '0') {
            echo "<h2 class='text-center'>No images matched your query</h2>";
          } ?>
          <div class="card-columns">
            <?php $galleries = [];
            foreach ($db->query('SELECT id, slug FROM cv_image_gallery') as $row) {
              $galleries[$row['id']] = $row['slug'];
            }
            foreach ($results as $row) {
              if (isset($cv_image_meta[$row['id']]['Message Text']) && isset($cv_image_meta[$row['id']]['Message Attribution'])) {
                echo "<div class='card'>
                        <img class='card-img-top' src='https://environmentaldashboard.org/images/uploads/gallery/{$galleries[$row['gid']]}/{$row['fn']}' alt='{$row['alt']}' data-toggle='modal' data-target='#imageModal' data-img='https://environmentaldashboard.org/images/uploads/gallery/{$galleries[$row['gid']]}/{$row['fn']}' data-alt='{$row['alt']}' data-imgid='{$row['id']}'>
                        <div class='card-body'>
                          <blockquote class='blockquote mb-0 card-body'>
                            <p>{$cv_image_meta[$row['id']]['Message Text']}</p>
                            <footer class='blockquote-footer'>
                              <small class='text-muted'>
                                <cite title='{$cv_image_meta[$row['id']]['Message Attribution']}'>{$cv_image_meta[$row['id']]['Message Attribution']}</cite>
                              </small>
                            </footer>
                          </blockquote>
                        </div>
                      </div>";
              } else {
                echo "<div class='card'>
                        <img class='card-img-top' src='https://environmentaldashboard.org/images/uploads/gallery/{$galleries[$row['gid']]}/{$row['fn']}' alt='{$row['alt']}' data-toggle='modal' data-target='#imageModal' data-img='https://environmentaldashboard.org/images/uploads/gallery/{$galleries[$row['gid']]}/{$row['fn']}' data-alt='{$row['alt']}'></div>";
              }
              // echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3">';
              // echo "<img src='https://environmentaldashboard.org/images/uploads/gallery/{$galleries[$row['gid']]}/{$row['fn']}' class='img-thumbnail img-fluid' />";
              // echo '</div>';
            } ?>
          </div>
        </div>
      </div>
      <div class="row" style="margin: 30px 0px;">
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
              $urlencoded = (isset($_GET['search'])) ? urlencode($_GET['search']) : '';
              $ok = true;
              for ($i = 1; $i <= $final_page; $i++) {
                if ($page > 20 && $i > 3 && $ok) {
                  $i = $page - 2;
                  $ok = false;
                  echo "<li class='page-item'><span class='page-link'>...</span></li>";
                }
                if ($i >= 20 && $final_page > ($i+3) && $page+3 < $i) {
                  $i = $final_page - 3;
                  echo "<li class='page-item'><span class='page-link'>...</span></li>";
                }
                if ($page + 1 === $i) {
                  echo '<li class="page-item active"><a class="page-link" href="?'.http_build_query(array_replace($qs, ['page' => $i])).'">' . $i . '</a></li>';
                }
                else {
                  echo '<li class="page-item"><a class="page-link" href="?'.http_build_query(array_replace($qs, ['page' => $i])).'">' . $i . '</a></li>';
                }
              }
              if ($page + 1 < $final_page) { ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?php echo http_build_query(array_replace($qs, ['page' => $page+2])); ?>" aria-label="Next">
                  <span aria-hidden="true">&raquo;</span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
              <?php } ?>
            </ul>
          </nav>
        </div>
      </div>
      <?php include '../includes/footer.php'; ?>
    </div>
    <?php include '../includes/js.php'; ?>
    <script>
      function img_metadata(id) {
        // https://stackoverflow.com/a/9713078/2624391
        var http = new XMLHttpRequest();
        var url = "img_metadata.php";
        var params = "id="+id;
        http.open("POST", url, true);
        http.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
        http.onreadystatechange = function() {
          if(http.readyState == 4 && http.status == 200) {
            var json = JSON.parse(http.responseText);
            for (var key in json) {
              $('#metadata').append("<h4>"+key+"</h4><p>"+json[key]+"</p>");
              // console.log(key, json[key]);
            }
          }
        }
        http.send(params);
      }
      $('#imageModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var img = button.data('img'), alt = button.data('alt'), imgid = button.data('imgid');
        var modal = $(this);
        $('#metadata').text('');
        img_metadata(imgid);
        modal.find('.modal-title').text(alt);
        $('#modal-img').attr('src', img);
      });
      $('#reset').on('click', function(e) {
        e.preventDefault();
        $('input').val('');
        $('select').val('all');
      });
    </script>
  </body>
</html>