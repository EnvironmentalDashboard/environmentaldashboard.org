<?php
$external_css = $_GET['css'];

?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="https://environmentaldashboard.org/css/bootstrap.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="/css/ecolympics.css?v=<?php echo time(); ?>">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=9ByOqqx0o3">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=9ByOqqx0o3">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=9ByOqqx0o3">
<link rel="manifest" href="/manifest.json?v=9ByOqqx0o3">
<link rel="mask-icon" href="/safari-pinned-tab.svg?v=9ByOqqx0o3" color="#00a300">
<link rel="shortcut icon" href="/favicon.ico?v=9ByOqqx0o3">
<meta name="theme-color" content="#000000">
<title>Environmental Dashboard</title>
<script src="https://config.communityhub.cloud/ch-header/app-index.js?v=1.13" crossorigin="anonymous" type="module"></script>

<?php
if ($external_css) {
    echo "<link rel='stylesheet' href='{$external_css}'>";
}
?>