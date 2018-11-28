<html>
<head>
    <title>Отчет 2</title>
    <link rel="stylesheet" href="../css/book.css">
    <link rel="shortcut icon" type="image/png" href="../img/badger2.png">
</head>
<body><br><br>
<table border = "2"  ><tbody>
    <th colspan="3" >Отчет о поставках</th>
    <tr>
        <td>Pub_id</td>
        <td>Pub_name</td>
        <td>Sum_Del_cost</td>
    </tr>
    <?php foreach ($deliveries as $delivery):?>
    <tr>
        <td > <?php echo $delivery['Pub_id']; ?> </td>
        <td > <?php echo $delivery['Pub_name']; ?> </td>
        <td > <?php echo $delivery['SUM(Del_cost)']; ?> </td>
    </tr>
    </tbody>
    <?php endforeach; ?>
</table><br>
<br>
<form action ="../index.php"  >
    <button  class="b1">
        <img src="../img/bookk.png" alt="Перо" style="vertical-align:middle" align = left>
        <H3>Вернуться  к  меню  библиотеки</H3>
    </button></p>
</form>
</body>
</html>