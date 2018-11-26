<?php
    $sql = "SELECT * FROM basket";
    $result = $pdo->query($sql);
    $baskets = $result->fetchAll();
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
        <?php foreach ($baskets as $basket):?>
        <form action = "" method = "GET">
            <div>
                <?php echo $basket['T_name'],"&nbsp", $basket['T_num']; ?>
                <input type = "hidden" name = "B_id" value = <?php echo $basket['B_id']; ?>>
                <input type = "submit" name = "Delete" value = "Удалить">
                <input type = "submit" name = "Edit" value = "Редактировать">
            </div>
        </form>
        <?php endforeach; ?><br><br>
    <form action ="Order">
        <button  class="b1">
            <img src="../img/bookk.png" style="vertical-align:middle" align = left>
            <h3>Оформить заказ</h3>
        </button></p>
    </form>
    <form action ="DeleteAll" method = "GET">
        <button  class="b1">
            <img src="../img/bookk.png" style="vertical-align:middle" align = left>
            <h3>Очистить корзину</h3>
        </button></p>
    </form>
    <form action ="../index.php">
        <button  class="b1">
            <img src="../img/bookk.png" style="vertical-align:middle" align = left>
            <h3>Вернуться  к  меню  библиотеки</h3>
        </button></p>
    </form>
</body>
</html>