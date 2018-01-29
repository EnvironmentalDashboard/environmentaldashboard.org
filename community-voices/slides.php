<?php
require '../../includes/db.php';
$galleries = ['serving-our-community', 'our-downtown', 'next-generation', 'neighbors', 'nature_photos', 'heritage', 'random'];
$num_galleries = count($galleries);
$urls = [];
for ($i=0; $i < $num_galleries; $i++) {
  $gallery = ($i === $num_galleries-1) ? $galleries[mt_rand(0, $num_galleries-2)] : $galleries[$i];
  $n = 0;
  $files = glob(dirname(__DIR__)."/images/uploads/photocache/{$gallery}/*.png");
  shuffle($files);
  foreach ($files as $pic) {
    $urls[$galleries[$i]][] = "/images/uploads/photocache/{$gallery}/".basename($pic);
    if ($n++ === 4) {
      break;
    }
  }
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
          <div id="cvSlider" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
              <li data-target="#cvSlider" data-slide-to="0" class="active"></li>
              <li data-target="#cvSlider" data-slide-to="1"></li>
              <li data-target="#cvSlider" data-slide-to="2"></li>
              <li data-target="#cvSlider" data-slide-to="3"></li>
              <li data-target="#cvSlider" data-slide-to="4"></li>
            </ol>
            <div class="carousel-inner">
              <?php $i = 0; foreach ($urls[$galleries[0]] as $url) {
                echo ($i++ === 0) ? '<div class="carousel-item active">' : '<div class="carousel-item">';
                echo "<img class='d-block w-100' src='{$url}' alt='Slide {$i}' id='slide{$i}'></div>";
              } ?>
            </div>
            <a class="carousel-control-prev" href="#cvSlider" role="button" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#cvSlider" role="button" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </a>
          </div>
        </div>
      </div>
      <div class="row" style="padding: 30px">
        <?php
        $images = [];
        for ($i=0; $i < $num_galleries; $i++) { 
          $img = ($i === $num_galleries-1) ? 'random' : $galleries[$i];
          $images[] = $img;
          echo "<div class='col'><img id='{$img}' class='img-fluid' src='slider-images/{$img}.png' style='cursor:pointer' /></div>";
        } ?>
      </div>
      <?php include '../includes/footer.php'; ?>
    </div>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
      var urls = <?php echo json_encode($urls); ?>;
      $('#<?php echo implode(', #', $images) ?>').on('click', function(e) {
        e.preventDefault();
        var i = 1;
        urls[this.id].forEach(function(url) {
          $('#slide'+(i++)).attr('src', url);
        })
      });
    </script>
  </body>
</html>