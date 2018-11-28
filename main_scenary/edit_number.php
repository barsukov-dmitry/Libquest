<?php
$sql = "SELECT * FROM basket where B_id = '$B_id'";
$result = $pdo->query($sql);
$baskets = $result->fetch();
$Book_name = $baskets['T_name'];
$sql = "SELECT In_stock FROM rechall where Books_id = (SELECT Book_id FROM book where Book_name = '$Book_name');";
$result = $pdo->query($sql);
$In_stock = $result->fetch();
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
    <title>Корзина</title>
</head>
<body>
<br><br>
<div class = "error_header">Товары в корзине</div>
    <form action = "" method = "GET">
        <div>
            <?php echo $baskets['T_name'],"&nbsp"?>
            <input type = number step="1" min="1" max= <?php echo $In_stock['In_stock'];?> name = T_num style = "width: 40px" value = <?php echo $baskets['T_num']; ?>>
            <input type = "hidden" name = "B_id" value = <?php echo $baskets['B_id']; ?>>
            <input type = submit name="Edit_one" value = "Добавить в корзину" style = "width: 200px;" >
        </div>
    </form><br><br>
<form action ="../index.php">
    <button  class="b1">
        <img src="../img/bookk.png" style="vertical-align:middle" align = left>
        <h3>Вернуться  к  меню  библиотеки</h3>
    </button>
</form>
</body>
