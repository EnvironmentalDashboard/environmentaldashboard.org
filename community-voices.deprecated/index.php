<?php
require '../../includes/db.php';
$page = (empty($_GET['page'])) ? 0 : intval($_GET['page']) - 1;
if (isset($_GET['search']) && trim($_GET['search']) !== '') {
  $count = $db->prepare('SELECT COUNT(*) FROM cv_posts WHERE content LIKE ?');
  $count->execute(array($user_id, "%{$_GET['search']}%"));
  $count = $count->fetchColumn();
}
else {
  $count = $db->query("SELECT COUNT(*) FROM cv_posts")->fetchColumn();
}
$limit = 5;
$offset = $limit * $page;
$final_page = ceil($count / $limit);
$search = (empty($_GET['search'])) ? '' : 'WHERE content LIKE ?'; // Use parameters for sql injection!
$stmt = $db->prepare("SELECT post_date, title, img, LEFT(content, 200) AS content, slug FROM cv_posts {$search} ORDER BY post_date DESC LIMIT {$offset}, {$limit}");
if (empty($_GET['search'])) {
  $stmt->execute();
}
else {
  $stmt->execute([$user_id, "%{$_GET['search']}%"]);
}
$results = $stmt->fetchAll();
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include '../includes/html-head.php'; ?>
  </head>
  <body>
    <div class="container">
      <?php include '../includes/header.php'; ?>
      <div class="row" style="padding: 30px">
        <div class="col">
          <h1 class="text-center">Community Voices Articles</h1>
          <p>The Community Voices component of Environmental Dashboard is designed to celebrate and promote thought and action that build stronger, more sustainable and more resilient communities. Community members representing the diversity of this community are being interviewed to share their perspectives. Click below to view recent interviews or search by subject name, interviewer or any keyword or topic to view associated stories. Many of the quotes used for Community Voices slides are taken from these interviews.</p>
        </div>
      </div>
      <div class="row">
        <div class="col">
          <ul class="list-unstyled">
            <?php if (count($results) > 0) { foreach ($results as $row) { ?>
            <li class="media" style="padding: 30px">
              <img class="mr-3" <?php echo "src='{$row['img']}' alt='{$row['slug']}'" ?> style="width: 150px">
              <div class="media-body">
                <h5 class="mt-0 mb-1"><?php echo $row['title'] ?></h5>
                <?php echo htmlentities(strip_tags($row['content'])); ?>
                <p><a href="article?name=<?php echo $row['slug'] ?>" class='btn btn-primary'>Read more</a></p>
              </div>
            </li>
            <?php } } else { echo "<h4 class='text-center'>No results</h4>"; } ?>
          </ul>
        </div>
      </div>
      <div class="row">
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
    <?php include '../includes/js.php'; ?>
  </body>
</html>