<?php
    session_start();
    if(isset($_GET['DeleteAll']))
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/u_dbconnect.php';
        $sql = "DELETE FROM basket";
        $result = $pdo->query($sql);
        echo "Drop all!";
        include '../index.php';
    }

    if(isset($_GET['Delete']))
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/u_dbconnect.php';
        $B_id = $_GET['B_id'];
        $sql = "DELETE FROM basket where B_id = '$B_id'";
        $result = $pdo->query($sql);
        include 'basket.php';
    }
    if(isset($_GET['basket']))
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/u_dbconnect.php';
        $T_name = $_SESSION['Book_name'];
        $T_num = $_GET['number'];

        $sql = "SELECT * from basket where T_name = '$T_name'";
        $result = $pdo->query($sql);
        $strings = $result->fetchAll();
        $strings = $result->rowcount();
        if($strings == 0)
        {
            $sql = "INSERT INTO  basket SET T_name ='$T_name', T_num ='$T_num'";
            $result = $pdo->query($sql);
            //echo "table updated!!";
        }
        else
        {
            $sql = "UPDATE  basket SET T_num = T_num + '$T_num' WHERE T_name = '$T_name' ";
            $result = $pdo->query($sql);
        }
        include 'basket.php';
    }
    if(isset($_GET['Add']))
    {
        include 'input_form.html';
        exit();
    }
    if(isset($_GET['send']))
    {
        include $_SERVER['DOCUMENT_ROOT'] . '/includes/u_dbconnect.php';

        $Book_name = $_GET['Book_name'];
        $_SESSION['Book_name'] = $Book_name;
        $R_id = $_GET['R_id'];
        $sql = "SELECT In_stock FROM rechall where Books_id = (SELECT Book_id FROM book where Book_name = '$Book_name');";
        $result = $pdo->query($sql);
        $In_stock = $result->fetch();

        include 'in_stock.php';
    }

?>

