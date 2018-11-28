<html>
<head>
    <title>Отчет 1</title>
    <link rel="stylesheet" href="../css/book.css">
    <link rel="shortcut icon" type="image/png" href="../img/badger2.png">
</head>
<body>
<br><br>
<table border = "2"  ><tbody>
    <th colspan="3"  style = "color: brown">Отчет о поставках</th>
    <tr style = "color: brown">
        <td > Book_id</td>
        <td > Copy_price</td>
        <td > Copies_number</td>
    </tr>
    <?php foreach ($deliveries as $delivery):?>
    <tr>
        <td > <?php echo $delivery['Book_id']; ?> </td>
        <td > <?php echo $delivery['Copy_price']; ?> </td>
        <td > <?php echo $delivery['Copies_number']; ?> </td>
    </tr>
    </tbody>
    <?php endforeach; ?>
</table><br><br>
<form action ="../index.php">
    <button  class="b1">
        <img src="../img/bookk.png" alt="Перо" style="vertical-align:middle" align = left>
        <h3>Вернуться  к  меню  библиотеки</h3>
    </button></p>
</form>
</body>
</html>