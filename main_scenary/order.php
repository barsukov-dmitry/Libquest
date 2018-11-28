<?php
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }
    $sql = "SELECT * FROM basket";
    $result = $pdo->query($sql);
    $baskets = $result->fetchAll();

    $select_not_found = $result->rowcount();
    if($select_not_found == 0)
    {
        $error_message = "Вы ничего не выбрали.";
        $_SESSION['error_message'] = $error_message;
        include "../includes/error.php";
        exit();
    }

    foreach ($baskets as $basket)
    {
        $T_name = $basket['T_name'];
        $T_num = $basket['T_num'];
        $R_id = $basket['R_id'];
        //Обновил количество книг в наличии
        $sql = "UPDATE rechall SET In_stock = In_stock - '$T_num' where Books_id = (SELECT Book_id FROM book where Book_name = '$T_name');";
        $pdo->query($sql);
        //Добавил запись в таблицу taken
        $sql = "INSERT INTO taken set Book1_id = (SELECT Book_id FROM book where Book_name = '$T_name'), Deadline = 30, R_id = '$R_id', Complete = 0 ,number = '$T_num'";
        $pdo->query($sql);
    }
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/book.css">
    <link rel="shortcut icon" type="image/png" href="../img/badger2.png">
    <title>Оформление заказа</title>
</head>
<body>
<br><br>
    <form action = "" method = "GET">
        <div class="error_header">
            Оформление заказа успешно завершено
        </div>
    </form><br><br>
    <a href = "index.php?DeleteAll"><button  class="b1">
        <img src="../img/bookk.png" style="vertical-align:middle" align = left>
        <h3>Вернуться  к  корзине</h3>
    </button></a>

</body>
</html>