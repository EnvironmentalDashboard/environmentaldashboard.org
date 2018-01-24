<?php
$slug = 'nature_photos';
$width = 3000;
$height = 1448;
extract($_GET, EXTR_IF_EXISTS);
error_reporting(-1);
ini_set('display_errors', 'On');
header('Content-Type: image/svg+xml');
require '../../includes/db.php';
// get category (gallery) id
$stmt = $db->prepare('SELECT id FROM cv_image_gallery WHERE slug = ?');
$stmt->execute([$slug]);
$gid = $stmt->fetchColumn();
// get quote
$stmt = $db->prepare('SELECT pid, value FROM cv_image_meta WHERE `key` = ? AND pid IN (SELECT id FROM cv_images WHERE gid = ?) AND value != \'\' ORDER BY RAND() LIMIT 1');
$stmt->execute(['Message Text', $gid]);
$result = $stmt->fetch();
$quote = $result['value'];
$pid = $result['pid'];
// get image
$stmt = $db->prepare('SELECT fn FROM cv_images WHERE id = ?');
$stmt->execute([$pid]);
$fn = $stmt->fetchColumn();
$url = "https://environmentaldashboard.org/images/uploads/gallery/{$_GET['slug']}/{$fn}";
$words = explode(' ', $quote);
$count = 0;
?>
<svg width="<?php echo $width ?>" height="<?php echo $height ?>" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	<rect x="0" y="0" width="100%" height="100%" fill='black' />
	<image href="<?php echo $url ?>" width="61%"/>
	<text x="65%" y="10%" font-family="Verdana" font-size="70" stroke="none" fill="#eee">
		<?php foreach ($words as $word) {
			if ($count > 15) {
				echo '<tspan dy="1.2em" x="'.($width*0.65).'">';
			}
			echo $word . ' ';
			if ($count > 15) {
				echo '</tspan>';
				$count = 0;
			}
			$count += strlen($word);
		} ?>
  </text>
  <image href="/cv_slides/categorybars/<?php echo $slug ?>.png" width="100%" height="100%" x="0" y="0"/>
</svg>