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
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
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