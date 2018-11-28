<?php
    if(!isset($_GET['send']))
    {
        include 'input_form1.html';
        exit();
    }
    if(isset($_GET['send']))
    {
        include $_SERVER['DOCUMENT_ROOT'].'/includes/u_dbconnect.php';
    }
	$d_year = $_GET['ryear'];
	$d_month = $_GET['rmonth'];
	$sql = "select Book_id, Copy_price, Copies_number from list join delivery using(Del_id) join book using(Book_id) where year(Del_date)='$d_year' and month(Del_date)='$d_month' group by(Book_id);";
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
    include "result1.php";
?>

