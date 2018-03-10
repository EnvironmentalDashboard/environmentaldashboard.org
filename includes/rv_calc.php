<?php
require '../../includes/db.php';
require '../../includes/class.Meter.php';
$meter = new Meter($db);
$stmt = $db->prepare('SELECT grouping, meter_uuid FROM relative_values WHERE id = ?');
$stmt->execute([$_REQUEST['rvid']]);
$row = $stmt->fetch();
$meter->updateRelativeValueOfMeter($meter->UUIDtoID($row['meter_uuid']), $row['grouping'], null, true);
?>