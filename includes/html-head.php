<?php
$external_css = isset($_GET['css']) ? $_GET['css'] : '';
?>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<link rel="stylesheet" href="/css/bootstrap.css?v=<?php echo time(); ?>">
<link rel="stylesheet" href="/css/ecolympics.css?v=<?php echo time(); ?>">
<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=9ByOqqx0o3">
<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png?v=9ByOqqx0o3">
<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png?v=9ByOqqx0o3">
<link rel="manifest" href="/manifest.json?v=9ByOqqx0o3">
<link rel="mask-icon" href="/safari-pinned-tab.svg?v=9ByOqqx0o3" color="#00a300">
<link rel="shortcut icon" href="/favicon.ico?v=9ByOqqx0o3">
<meta name="theme-color" content="#000000">
<title>Environmental Dashboard</title>
<script src="https://config.communityhub.cloud/ch-header/app-index.js?v=2.25" crossorigin="anonymous" type="module"></script>

<?php
if ($external_css) {
    echo "<link rel='stylesheet' href='{$external_css}'>";
}

$domainName = isset($_SERVER['SCRIPT_URI']) ? $_SERVER['SCRIPT_URI'] : "https://environmentaldashboard.org/";

$generateURL = function($basePath, $queryParams = []) use ($domainName)
{    
    // Get the current query parameters
    $currentParams = $_GET;

    // Merge the current parameters with the new parameters
    $mergedParams = array_merge($currentParams, $queryParams);

    // Build the merged query string
    $mergedQueryString = http_build_query($mergedParams);

    // Get the current URL without the query string
    $currentUrl = $domainName . $basePath;
    // echo "<pre>";
    // print_r(['$currentUrl' => $currentUrl]);
    // print_r($_SERVER);
    // exit;
    // Create the final merged URL
    // $mergedUrl = $currentUrl . '?' . $mergedQueryString;
    if($mergedQueryString){
        return $currentUrl . '?' . $mergedQueryString;
    }

    return $currentUrl;
}
?>