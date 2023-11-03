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
      <object type="image/svg+xml" data="//<?php echo $subdomain ?>.environmentaldashboard.org/cwd-files/dashboard.php?<?php echo http_build_query($_GET); ?>" class='img-fluid'></object>
      <?php include 'includes/footer.php'; ?>
    </div>
    <?php include 'includes/js.php'; ?>
  </body>
</html>