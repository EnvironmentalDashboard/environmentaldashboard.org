<?php
require '../../includes/db.php';
$page = (empty($_GET['page'])) ? 0 : intval($_GET['page']) - 1;
if (isset($_GET['search']) && trim($_GET['search']) !== '') {
  if (isset($_GET['criteria'])) {
    $whitelist = ['Message Text', 'Message Attribution', 'Date Photo Taken', 'Photographer', 'Organization', 'Parental Consent Documentation', 'Probability', 'Message Category', 'Interview Link', 'Date Added to Live Folder', 'Enable Decay', 'End Use'];
    $key = [];
    foreach ($_GET['criteria'] as $val) {
      if (in_array($val, $whitelist)) {
        $key[] = "'{$val}'";
      }
    }
  }
  $WHERE = 'WHERE alt LIKE ? OR id IN (SELECT pid FROM cv_image_meta WHERE `key` IN ('.implode(', ', $key).') AND value = ?)';
  $count = $db->prepare('SELECT COUNT(*) FROM cv_images '.$WHERE);
  $count->execute(["%{$_GET['search']}%", "%{$_GET['search']}%"]);
  $count = $count->fetchColumn();
}
else {
  $count = $db->query("SELECT COUNT(*) FROM cv_images")->fetchColumn();
  $WHERE = '';
}
$limit = 18;
$offset = $limit * $page;
$final_page = ceil($count / $limit);
$search = (empty($_GET['search'])) ? '' : 'WHERE content LIKE ?';
$stmt = $db->prepare("SELECT fn, alt, gid FROM cv_images {$WHERE} ORDER BY imgdate DESC LIMIT {$offset}, {$limit}");
if (empty($_GET['search'])) {
  $stmt->execute();
}
else {
  $stmt->execute(["%{$_GET['search']}%", "%{$_GET['search']}%"]);
}
$results = $stmt->fetchAll();
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="../css/bootstrap.css?v=<?php echo time(); ?>">
    <title>Environmental Dashboard</title>
  </head>
  <body>
    <div class="container">
      <?php include '../includes/header.php'; ?>
      <div class="row" style="padding: 30px">
        <div class="col">
          <h1 class="text-center">Advanced Image Search</h1>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <form action="" method="GET" style="padding: 40px">
            <div class="form-group row">
              <label for="search" class="col-sm-2 col-form-label">Enter search terms</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="search" name="search" placeholder="Search">
              </div>
            </div>
            <fieldset class="form-group">
              <div class="row">
                <legend class="col-form-label col-sm-2 pt-0">Match my query against</legend>
                <div class="col-sm-10">
                  <?php foreach ($db->query('SELECT DISTINCT `key` FROM cv_image_meta ORDER BY `key` ASC') as $criteria) {
                    $id = uniqid(); ?>
                  <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="criteria[]" id="<?php echo $id ?>" value="<?php echo $criteria['key'] ?>" checked>
                    <label class="form-check-label" for="<?php echo $id ?>">
                      <?php echo $criteria['key']; ?>
                    </label>
                  </div>
                  <?php } ?>
                </div>
              </div>
            </fieldset>
            <div class="form-group row">
              <div class="col-sm-10">
                <button type="submit" class="btn btn-primary">Search</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      <div class="row">
      <?php $i = 0;
      $galleries = [null, 'used-photos', 'nature_photos', 'neighbors', 'next-generation', 'serving-our-community', 'heritage', 'our-downtown']; // null to offset by 1
      foreach ($results as $row) {
        // if ($i % 4 === 0) {
          // echo '<div class="row">';
        // }
        echo '<div class="col-12 col-sm-6 col-md-4 col-lg-3">';
        echo "<img src='https://environmentaldashboard.org/images/uploads/gallery/{$galleries[$row['gid']]}/{$row['fn']}' class='img-thumbnail img-fluid' />";
        echo '</div>';
        // if ($i % 4 === 0) {
          // echo '</div>';
        // }
        $i++;
      } ?></div>
      <div class="row" style="margin: 30px 0px;">
        <div class="col">
          <nav aria-label="Page navigation example" class="text-center">
            <ul class="pagination" style="display: inline-flex;">
              <?php if ($page > 0) { ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page ?>" aria-label="Previous">
                  <span aria-hidden="true">&laquo;</span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <?php }
              $urlencoded = (isset($_GET['search'])) ? urlencode($_GET['search']) : '';
              for ($i = 1; $i <= $final_page; $i++) {
                if ($i === 20 && $final_page > 23) {
                  $i = $final_page - 3;
                  echo "<li class='page-item'><span class='page-link'>...</span></li>";
                }
                if ($page + 1 === $i) {
                  echo '<li class="page-item active"><a class="page-link" href="?page=' . $i . '&search=' .$urlencoded. '">' . $i . '</a></li>';
                }
                else {
                  echo '<li class="page-item"><a class="page-link" href="?page=' . $i . '&search=' .$urlencoded. '">' . $i . '</a></li>';
                }
              }
              if ($page + 1 < $final_page) { ?>
              <li class="page-item">
                <a class="page-link" href="?page=<?php echo $page + 2 ?>" aria-label="Next">
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
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>