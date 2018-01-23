<?php
$slug = 'used-photos';
$width = 1200;
$height = 800;
extract($_GET, EXTR_IF_EXISTS);
require '../../includes/db.php';
header('Content-Type: image/svg+xml');
// get image
$stmt = $db->prepare('SELECT id FROM cv_image_gallery WHERE slug = ?');
$stmt->execute([$slug]);
$gid = $stmt->fetchColumn();
$stmt = $db->prepare('SELECT id, fn FROM cv_images WHERE gid = ? ORDER BY RAND() LIMIT 1');
$stmt->execute([$gid]);
$result = $stmt->fetch();
$fn = $result['fn'];
$pid = $result['id'];
$url = "https://environmentaldashboard.org/images/uploads/gallery/{$_GET['slug']}/{$fn}";
// get quote
$stmt = $db->prepare('SELECT value FROM cv_image_meta WHERE `key` = ? AND pid = ? LIMIT 1');
$stmt->execute(['Message Text', $pid]);
$quote = $stmt->fetchColumn();
if (!$quote) {
	$quote = "There is no quote for this image";
}
?>
<svg width="<?php echo $width ?>" height="<?php echo $height ?>" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
	<rect x="0" y="0" width="100%" height="100%" fill='black' />
	<image href="<?php echo $url ?>" width="60%"/>
	<text x="0" y="35" font-family="Verdana" font-size="35" stroke="none" fill="#eee">
		<?php echo $quote; ?>
  </text>
  <image href="categorybars/<?php echo $slug ?>.png" width="100%" height="20%" x="0" y="<?php echo $height*0.8 ?>"/>
</svg>