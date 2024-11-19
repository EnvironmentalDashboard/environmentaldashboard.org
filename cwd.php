<?php
require '../includes/db.php';
?>
<!doctype html>
<html lang="en">
  <head>
    <?php include 'includes/html-head.php'; ?>
    <meta name="description" content="Citywide Dashboard. An animated display of current electricity and water use and environmental conditions. “Flash” the energy squirrel and “Walley” the Walleye narrate dynamic resource use.">
  </head>
  <body>
    <?php include 'includes/header.php'; ?>
    <div class="container">
      <?php
      $queryParams = $_GET;
      $queryParams['interval'] = (isset($queryParams['interval'])) ? (int)$queryParams['interval'] * 1 : '';
      $queryParams['current_state'] = (isset($queryParams['current_state'])) ? $queryParams['current_state'] : 'electricity';
      $baseURL  = "cwd-files";
      $encodedParams = http_build_query($queryParams);
      $dashboardURL = $_SERVER['HTTP_HOST'] .  "/$baseURL/dashboard.php?$encodedParams";
  ?>
      <object type="image/svg+xml" data="//<?php echo $dashboardURL ?>" class='img-fluid'></object>
      <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/js.php'; ?>
  </body>
</html>