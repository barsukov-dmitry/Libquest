<?php
    $dbname = "library";
    $login = "root";
    $password = "root";
    try
    {
        $pdo = new PDO("mysql:host=LocalHost; dbname=$dbname",$login,$password);
        $pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo "Ошибка подключения БД";
        echo $e->getMessage();
        exit();
    }
?>