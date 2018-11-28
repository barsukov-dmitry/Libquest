<html>
<head>
    <title>Процедура обновления</title>
    <link rel="stylesheet" href="../css/book.css"> 	<link rel="shortcut icon" type="image/png" href="../img/badger2.png">
</head>
<body><br>
<?php if ($flag == 0): ?>
    <table border = "2"  ><tbody>
        <th colspan="4" >_Строки таблицы "Хранилище книг" до обновления_</th>
        <tr>
            <td > Rec_id</td>
            <td > Same_id_cost</td>
            <td > Same_id_number</td>
            <td > Books_id</td>
        </tr>
        <?php foreach ($old_strings as $old_str):?>
        <tr>
            <td > <?php echo $old_str['Rec_id']; ?> </td>
            <td > <?php echo $old_str['Same_id_cost']; ?> </td>
            <td > <?php echo $old_str['Same_id_number']; ?> </td>
            <td > <?php echo $old_str['Books_id']; ?> </td>
        </tr>
        </tbody>
        <?php endforeach; ?>
    </table>
<?php endif; ?>
<br><br>
<table border = "2"  ><tbody>
    <th colspan="4" >Строки таблицы "Хранилище книг" после обновления</th>
    <tr>
        <td > Rec_id</td>
        <td > Same_id_cost</td>
        <td > Same_id_number</td>
        <td > Books_id</td>
    </tr>
    <?php foreach ($updating_strings as $updating_str):?>
    <tr>
        <td > <?php echo $updating_str['Rec_id']; ?> </td>
        <td > <?php echo $updating_str['Same_id_cost']; ?> </td>
        <td > <?php echo $updating_str['Same_id_number']; ?> </td>
        <td > <?php echo $updating_str['Books_id']; ?> </td>
    </tr>
    </tbody>
    <?php endforeach; ?>
</table><br>
<form action ="input_form.html">
    <button  class="b1">
        <img src="../img/bookk.png" alt="Перо" style="vertical-align:middle" align = left>
        <h3>Ввести другое значение</h3>
    </button>
</form>
<br>
<form action ="../index.php"  >
    <button  class="b1">
        <img src="../img/bookk.png" alt="Перо" style="vertical-align:middle" align = left>
        <h3>Вернуться  к  меню  библиотеки</h3>
    </button>
</form>
</body>
</html>