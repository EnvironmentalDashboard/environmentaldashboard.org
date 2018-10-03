<?php
header("Content-type: text/plain");
require '../../includes/db.php';
$stmt = $db->prepare('SELECT value, recorded FROM meter_data WHERE meter_id = 346 AND resolution = ? ORDER BY recorded DESC');
$stmt->execute([(isset($_GET['resolution']) ? $_GET['resolution'] : 'quarterhour')]);
foreach ($stmt->fetchAll() as $row) {
	echo implode(',', array_values($row)) . "\n";
}

