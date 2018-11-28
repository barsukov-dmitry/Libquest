<?php
    session_start();
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/u_dbconnect.php';

    if(isset($_GET['Order']))
    {
        include "order.php";
    }

    if(isset($_GET['Edit_one']))
    {
        $T_num = $_GET['T_num'];
        $B_id = $_GET['B_id'];
        $sql = "UPDATE  basket SET T_num = '$T_num' WHERE B_id = '$B_id'";
        $result = $pdo->query($sql);
        include "basket.php";
    }

    if(isset($_GET['Edit']))
    {
        $B_id = $_GET['B_id'];
        include "edit_number.php";
    }

    if(isset($_GET['DeleteAll']))
    {
        $sql = "DELETE FROM basket";
        $result = $pdo->query($sql);
        include 'basket.php';
    }

    if(isset($_GET['Delete']))
    {
        $B_id = $_GET['B_id'];
        $sql = "DELETE FROM basket where B_id = '$B_id'";
        $result = $pdo->query($sql);
        include 'basket.php';
    }
    if(isset($_GET['basket']))
    {
        $T_name = $_SESSION['Book_name'];
        $T_num = $_GET['number'];

        $R_id = $_SESSION['R_id'];
        $sql = "SELECT * from basket where T_name = '$T_name'";
        $result = $pdo->query($sql);
        $strings = $result->fetchAll();
        $strings = $result->rowcount();
        if($strings == 0)
        {
            $sql = "INSERT INTO  basket SET T_name ='$T_name', T_num ='$T_num', R_id = '$R_id'";
            $result = $pdo->query($sql);
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
        $Book_name = $_GET['Book_name'];
        $sql = "SELECT Book_name from book where Book_name = '$Book_name'";
        $result = $pdo->query($sql);
        $test_correct_book_name = $result->fetch();

        $test_correct_book_name = $result->rowcount();
        if($test_correct_book_name == 0)
        {
            $error_message = "Указано неверное название книги";
            $_SESSION['error_message'] = $error_message;
            include "../includes/error.php";
            exit();
        }
        $_SESSION['Book_name'] = $Book_name;

        $R_id = $_GET['R_id'];
        $sql = "SELECT R_id from readers where R_id = '$R_id'";
        $result = $pdo->query($sql);
        $test_correct_R_id = $result->fetch();
        $test_correct_R_id = $result->rowcount();

        if($test_correct_R_id == 0)
        {
            $error_message = "Читателя с таким номером билета не существует";
            $_SESSION['error_message'] = $error_message;
            include "../includes/error.php";
            exit();
        }
        $_SESSION['R_id'] = $R_id;
        $sql = "SELECT In_stock FROM rechall where Books_id = (SELECT Book_id FROM book where Book_name = '$Book_name');";
        $result = $pdo->query($sql);
        $In_stock = $result->fetch();
        include 'in_stock.php';
    }

?>

