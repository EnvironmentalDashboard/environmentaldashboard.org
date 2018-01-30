<?php
require '../../includes/db.php';
$galleries = ['serving-our-community', 'our-downtown', 'next-generation', 'neighbors', 'nature_photos', 'heritage'];
$num_galleries = count($galleries);
if (!in_array($_GET['gallery'], $galleries)) {
  $gallery = $galleries[mt_rand(0, $num_galleries-1)];
} else {
  $gallery = $_GET['gallery'];
}
$files = glob(dirname(__DIR__)."/images/uploads/photocache/{$gallery}/*.png");
shuffle($files);
//   foreach ($files as $pic) {
//     $urls[$galleries[$i]][] = "/images/uploads/photocache/{$gallery}/".basename($pic);
//     if ($n++ === 4) {
//       break;
//     }
//   }
// }
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
    <img src="<?php echo "/images/uploads/photocache/{$gallery}/".basename($files[0]); ?>" alt="" style="width: 100%;height: auto;position: absolute;top: 0;left: 0;right: 0">
  </body>
  <script>
    setTimeout(function() {
      window.location.reload(true);
    }, <?php echo (isset($_GET['ms'])) ? $_GET['ms'] : 5000 ?>);
  </script>
</html>