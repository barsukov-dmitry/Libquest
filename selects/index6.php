<?php
    if(!isset($_GET['send']))
    {
        include 'input_form6.html';
        exit();
    }
    if(isset($_GET['send']))
    {
        include $_SERVER['DOCUMENT_ROOT'].'/includes/u_dbconnect.php';
    }
	$d_year = $_GET['ryear'];//obrabotka vvoda
	$d_month = $_GET['rmonth'];
	$sql = "SELECT pubhouse.* from pubhouse left join (select * from delivery 
	where year(Del_date)=$d_year and month(Del_date)=$d_month)d2017 using(Pub_id) where Del_id is null";
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
    include "result6.php";
?>
