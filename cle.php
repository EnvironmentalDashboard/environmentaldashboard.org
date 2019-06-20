<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Citywide Dashboard. An animated display of current electricity and water use and environmental conditions. “Flash” the energy squirrel and “Walley” the Walleye narrate dynamic resource use.">
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
      <?php include 'includes/header.php'; ?>
      <iframe src="https://environmentaldashboard.org/digital-signage/display/1/present" frameborder="0" style="width: 100%;height: 80vh"></iframe>
      <iframe src="https://environmentaldashboard.org/digital-signage/remote/1" frameborder="0" style="width: 100%"></iframe>
      <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/js.php'; ?>
  </body>
</html>