<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="../css/book.css" rel="stylesheet">
    <link rel="shortcut icon" type="image/png" href="../img/badger2.png">
    <title>Добавление в корзину</title>
</head>
<body><br><br><br><br><br><br>
<form action =" " method="GET">
    <table border = "2">
        <tr>
            <td style = "width: 120px;"><?php echo $Book_name; ?></td>
            <td><input type = text name = number style="width: 40px;"></td>
        </tr>
        <tr>
            <td colspan="2"> <?php
                echo "В наличии: ";
                echo $In_stock['In_stock'];
                ?>
            </td>
        </tr>
        <tr>
            <td colspan="2"><input type = submit name="basket" value = "Добавить в корзину" style = "width: 100%" ></td>
        </tr>
    </table>
</form>
<br><br>
<form action ="../index.php">
    <button  class="b1">
        <img src="../img/bookk.png" alt="Перо" style="vertical-align:middle" align = left>
        <H3>Вернуться  к  меню  библиотеки</H3>
    </button>
</form>
</body>
</html>