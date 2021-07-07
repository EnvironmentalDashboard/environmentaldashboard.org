<?php 
if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') 
    $link = "https"; 
else
    $link = "http"; 
$link .= "://"; 
$link .= $_SERVER['HTTP_HOST']; 
$link .= $_SERVER['REQUEST_URI']; 
$remote = substr($link,(strpos($link,"/nav")+ 5));
$remoteNumber = substr($link,(strpos($link,"/nav") + 13 ));
$remoteLink = "remote";
if(is_numeric($remoteNumber)){
  $remoteLink = "https://oberlin.communityhub.cloud/digital-signage/remote/" . $remoteNumber;
}
?> 

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/css/cmn.css">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=9ByOqqx0o3">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=9ByOqqx0o3">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=9ByOqqx0o3">
    <link rel="manifest" href="/manifest.json?v=9ByOqqx0o3">
    <link rel="mask-icon" href="/safari-pinned-tab.svg?v=9ByOqqx0o3" color="#00a300">
    <link rel="shortcut icon" href="/favicon.ico?v=9ByOqqx0o3">
    <meta name="theme-color" content="#000000">
    <title>Oberlin Hub</title>
  </head>
  <body>
    <div class="container">
      <div class="topline">
        OBERLIN HUB
      </div>
      <div class="controllerlineone">
        <div class="col">
          <a href="<?php echo $remoteLink;?>"> <img class="buttons" src="/images/remoteicon.svg"> </a>
          <p class="below">Screen <br> Controller</p>
        </div>
        <div class="col">
          <a href="https://oberlin.communityhub.cloud/calendar/"> <img class="buttons" src="/images/Homepageonhover.png"> </a>
          <p class="below">Events <br> Calendar</p>
        </div>
      </div>
      <div class="controllerlinetwo">
        <div class="col">
          <a href="https://environmentaldashboard.org/community-voices"> <img class="buttons" src="/images/cv_logo.png"> </a>
          <p class="below">Community <br> Voices</p>
        </div>
        <div class="col">
          <a href="https://environmentaldashboard.org/cwd"> <img class="buttons" src="/images/cwd_icon.png"> </a>
          <p class="below">Citywide <br> Dashboard</p>
        </div>
      </div>
      <a class="subheader" href="https://oberlin.communityhub.cloud/calendar/">
        <div class="subflex">
          <img class="newsletter" src="/images/calendar_noborder_white.svg">
            <p class="captionline"> <b> SUBSCRIBE </b> <br> to our events newsletter<p>
        </div>
      </a>
   </div>
  </body>
</html>
