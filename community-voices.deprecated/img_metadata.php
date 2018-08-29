<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require '../../includes/db.php';
if (isset($_POST['id'])) {
	$stmt = $db->prepare('SELECT `key`, value FROM cv_image_meta WHERE pid = ?');
	$stmt->execute([$_POST['id']]);
	$ret = [];
	foreach ($stmt->fetchAll() as $row) {
		$ret[$row['key']] = $row['value'];
	}
	echo json_encode($ret);
}
?>