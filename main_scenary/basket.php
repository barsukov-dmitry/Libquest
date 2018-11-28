<?php
    include $_SERVER['DOCUMENT_ROOT'] . '/includes/u_dbconnect.php';
    $sql = "SELECT * FROM basket";
    $result = $pdo->query($sql);
    $baskets = $result->fetchAll();
    $empty_basket = $result->rowcount();
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
        <?php if ($empty_basket == 0):?>
            <div class = "error_header">Ваша корзина пуста</div>
        <?php else: ?>
        <div class = "error_header">Товары в корзине</div>
        <?php endif; ?>
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
        <?php if ($empty_basket != 0):?>
        <a href = "index.php?Order"><button  class="b1">
            <img src="../img/bookk.png" style="vertical-align:middle" align = left>
            <h3>Оформить заказ</h3>
        </button></a>
        <?php endif; ?>
        <?php  if ($empty_basket != 0): ?>
        <a href =  "index.php?DeleteAll"><button  class="b1">
            <img src="../img/bookk.png" style="vertical-align:middle" align = left>
            <h3>Очистить корзину</h3>
        </button></a><br>
        <?php endif; ?>
        <a href = "index.php?Add"><button  class="b1">
            <img src="../img/bookk.png" style="vertical-align:middle" align = left>
            <h3>Продолжить выбор</h3>
        </button></a>
        <a href =  "../index.php"><button  class="b1">
            <img src="../img/bookk.png" style="vertical-align:middle" align = left>
            <h3>Вернуться к меню</h3>
        </button></a>
</body>
</html>