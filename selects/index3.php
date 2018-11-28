<?php
    if(!isset($_GET['send']))
    {
        include 'input_form3.html';
        exit();
    }
    if(isset($_GET['send']))
    {
        include $_SERVER['DOCUMENT_ROOT'].'/includes/u_dbconnect.php';
    }
	$d_year = $_GET['ryear'];
	$d_month = $_GET['rmonth'];
	$book_name = $_GET['rbook_name'];
	$sql = "select pubhouse.* from list join delivery using(Del_id) join pubhouse using(Pub_id) join book using(Book_id) where Book_name='$book_name' and year(Del_date)=$d_year and month(Del_date)=$d_month and Copy_price = (select MAX(Copy_price) from list join book using(Book_id) join delivery using(Del_id) where Book_name='$book_name' and year(Del_date)=$d_year and month(Del_date)=$d_month);";
	$result = $pdo->query($sql);
	$pubhouses = $result->fetchAll();

    $select_not_found = $result->rowcount();
    if($select_not_found == 0)
    {
        $error_message = "Нет данных, соответствующих данному запросу";
        $_SESSION['error_message'] = $error_message;
        include "../includes/error.php";
        exit();
    }
    include "result3.php";
?>
