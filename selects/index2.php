<?php
    if(!isset($_GET['send']))
    {
        include 'input_form2.html';
        exit();
    }
    if(isset($_GET['send']))
    {
        include $_SERVER['DOCUMENT_ROOT'].'/includes/u_dbconnect.php';
    }
	$d_year = $_GET['ryear'];
	$d_month = $_GET['rmonth'];
	$sql = "select Pub_id, Pub_name, SUM(Del_cost) from delivery join pubhouse using(Pub_id) where year(Del_date)=$d_year and month(Del_date)=$d_month group by (Pub_id);";
	$result = $pdo->query($sql);
	$deliveries = $result->fetchAll();

    $select_not_found = $result->rowcount();
    if($select_not_found == 0)
    {
        $error_message = "Нет данных, соответствующих данному запросу";
        $_SESSION['error_message'] = $error_message;
        include "../includes/error.php";
        exit();
    }
    include "result2.php";
?>
