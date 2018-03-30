<?php
error_reporting(-1);
ini_set('display_errors', 'On');
require '../../includes/db.php';
$lookup = [];
$json = json_decode($_REQUEST['order']);
if ($json !== null) {
	foreach ($db->query('SELECT id, relative_value FROM relative_values WHERE meter_uuid IN (SELECT elec_uuid FROM orbs) OR meter_uuid IN (SELECT water_uuid FROM orbs)')->fetchAll() as $row) {
		$lookup[$row['id']] = $row['relative_value'];
	}
	$ret = [];
	foreach ($json as $rvid) {
		$ret[] = $lookup[$rvid];
	}
	echo json_encode($ret);
} else {
	echo "Malformed JSON\n";
}
?>