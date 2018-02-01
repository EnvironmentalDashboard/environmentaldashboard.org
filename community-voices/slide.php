<?php
require '../../includes/db.php';
error_reporting(-1);
ini_set('display_errors', 'On');
$galleries = ['serving-our-community', 'our-downtown', 'next-generation', 'neighbors', 'nature_photos', 'heritage'];
$num_galleries = count($galleries);
if (!isset($_GET['gallery']) || !in_array($_GET['gallery'], $galleries)) {
  $gallery = $galleries[mt_rand(0, $num_galleries-1)];
} else {
  $gallery = $_GET['gallery'];
}
$files = [];
foreach (glob(dirname(__DIR__)."/images/uploads/photocache/{$gallery}/*.png") as $path) {
  $files[] = "/images/uploads/photocache/{$gallery}/".basename($path);
}
shuffle($files);
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=9ByOqqx0o3">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=9ByOqqx0o3">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=9ByOqqx0o3">
    <link rel="manifest" href="/manifest.json?v=9ByOqqx0o3">
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v=9ByOqqx0o3" color="#00a300">
    <link rel="shortcut icon" href="/favicon.ico?v=9ByOqqx0o3">
    <meta name="theme-color" content="#000000">
    <title>Environmental Dashboard</title>
    <style>
      @keyframes fadeIn {
        0% {
          display: none;
          opacity: 0;
        }
        1% {
          display: block;
          opacity: 0;
        }
        100% {
          display: block;
          opacity: 1;
        }
      }
      @keyframes fadeOut {
        0% {
          display: block;
          opacity: 1;
        }
        99% {
          display: block;
          opacity: 0;
        }
        100% {
          display: none;
          opacity: 0;
        }
      }
      .fade-in {
        -webkit-animation: fadeIn 2s linear 0s 1 normal forwards;
        -o-animation: fadeIn 2s linear 0s 1 normal forwards;
        animation: fadeIn 2s linear 0s 1 normal forwards;
      }
      .fade-out {
        -webkit-animation: fadeOut 2s linear 0s 1 normal forwards;
        -o-animation: fadeOut 2s linear 0s 1 normal forwards;
        animation: fadeOut 2s linear 0s 1 normal forwards;
      }
    </style>
  </head>
  <body style="background: #000">
    <img id='img1' src="<?php echo $files[0]; ?>" alt="" style="width: 100%;height: auto;position: absolute;top: 0;left: 0;right: 0">
    <img id="img2" src="<?php echo $files[1]; ?>" alt="" style="width: 100%;height: auto;position: absolute;top: 0;left: 0;right: 0">
  </body>
  <script>
    var paths = <?php echo json_encode($files); ?>;
    var images = [document.getElementById('img1'), document.getElementById('img2')];
    var current_path = 2,
        current_img = 1;
    setInterval(function() {
      if (current_img === 0) {
        images[current_img].className = 'fade-out';
        setTimeout(function() { images[0].setAttribute('src', paths[current_path++]); }, 2000);
        current_img = 1;
        images[current_img].className = 'fade-in';
      } else {
        images[current_img].className = 'fade-out';
        setTimeout(function() { images[1].setAttribute('src', paths[current_path++]); }, 2000);
        current_img = 0;
        images[current_img].className = 'fade-in';
      }
    }, <?php echo (isset($_GET['ms'])) ? $_GET['ms'] : 5000 ?>);
  </script>
</html>