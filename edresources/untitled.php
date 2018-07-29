<?php
require 'db.php';
foreach ($db->query("SELECT * FROM `cv_lesson_meta` WHERE `key` = 'Objectives'") as $row) {
	$new_str = '';
	$last_lowercase = false;
	for ($i=0; $i < strlen($row['value']); $i++) { 
		$upper = ctype_upper($row['value'][$i]);
		if ($last_lowercase && $upper) {
			$new_str .= "; {$row['value'][$i]}";
		} else {
			$new_str .= $row['value'][$i];
		}
		if (!$upper && ord($row['value'][$i]) >= 97 && $row['value'][$i] <= 122) {
			$last_lowercase = true;
		} else {
			$last_lowercase = false;
		}
	}
	$stmt = $db->prepare('UPDATE cv_lesson_meta SET value = ? WHERE id = ?');
	$stmt->execute([$new_str, $row['id']]);
}