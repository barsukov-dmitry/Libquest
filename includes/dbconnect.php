<?php
    $dbname = "library";
    $login = "virt";
    $password = "virt";
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