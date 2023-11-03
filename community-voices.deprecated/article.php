<?php
require '../../includes/db.php';
if (isset($_GET['name'])) {
  $stmt = $db->prepare('SELECT post_date, title, img, content FROM cv_posts WHERE slug = ?');
  $stmt->execute([$_GET['name']]);
  $article = $stmt->fetch();
} else {
  http_response_code(404);
  require '../404.php';
}
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
        <div class="col text-center">
          <h1><?php echo $article['title']; ?></h1>
          <p><?php echo date('l, F j, Y', strtotime($article['post_date'])); ?></p>
          <img src="<?php echo $article['img'] ?>" alt="" class='img-thumbnail'>
          <div style="text-align: initial;"><?php echo $article['content']; ?></div>
        </div>
      </div>
      <?php include '../includes/footer.php'; ?>
    </div>
    <?php include '../includes/js.php'; ?>
  </body>
</html>