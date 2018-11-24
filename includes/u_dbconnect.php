<?php
    session_start();
    $dbname = "library";
    $login = $_SESSION['db_login'];
    $password = $_SESSION['db_password'];
    try
    {
        $pdo = new PDO("mysql:host=LocalHost; dbname=$dbname",$login,$password);
        $pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "Ошибка подключения БД";
        echo $e->getMessage();
        include 'output.php';
        exit();
    }
?>