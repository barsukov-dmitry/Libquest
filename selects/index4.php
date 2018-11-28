<?php
    if(!isset($_GET['send']))
    {
        include 'input_form4.html';
        exit();
    }
    if(isset($_GET['send']))
    {
        include $_SERVER['DOCUMENT_ROOT'].'/includes/u_dbconnect.php';
    }
	$d_year = $_GET['ryear'];
	$sql = "select pubhouse.* from delivery join pubhouse using(Pub_id) where month(Del_date) < 7 and year(Del_date)=$d_year and Del_cost = (select MAX(Del_cost) from delivery where month(Del_date) < 7 and year(Del_date) =$d_year);";
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
    include "result4.php";
?>
