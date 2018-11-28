<?php
    include $_SERVER['DOCUMENT_ROOT'].'/includes/u_dbconnect.php';
	$sql = "select pubhouse.* from pubhouse left join delivery using(Pub_id) where Del_id is null";
	$result = $pdo->query($sql);
	$pubhouses = $result->fetchAll();
	include "result5.php";
?>
