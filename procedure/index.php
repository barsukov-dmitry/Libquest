﻿<?php
    if(!isset($_GET['send']))
    {
        include 'input_form.html';
        exit();
    }
    if(isset($_GET['send']))
    {
        include $_SERVER['DOCUMENT_ROOT'].'/includes/u_dbconnect.php';
    }
	$Del_num = $_GET['Del_id'];                     //transfer argument from html

	$sql = "SELECT Updating from delivery where Del_id = '$Del_num';";
	$result = $pdo->query($sql);

    $select_not_found = $result->rowcount();
    if($select_not_found == 0)
    {
        $error_message = "Партии с таким ID не существует!<br>";
        $_SESSION['error_message'] = $error_message;
        include "../includes/error.php";
        exit();
    }
	else
	{
		echo "Введен корректный ID партии!<br>";
		$sql = "SELECT rechall.* from rechall join book on rechall.Books_id = book.Book_id join list using(Book_id) where Del_id = '$Del_num';";
		$result1 = $pdo->query($sql);
		$old_strings = $result1->fetchAll();

        $select_not_found = $result1->rowcount();
        if($select_not_found == 0)
        {
            $error_message = "Ни одно издательство не совершало эту поставку!<br>";
            $_SESSION['error_message'] = $error_message;
            include "../includes/error.php";
            exit();
        }
		else
		{
			$test_field_updating = $result->fetch();
			$flag = $test_field_updating['Updating'];
			if($flag == 1) 								//updated before
				echo "Обновление для этой партии выполнялось ранее!<br>";
			else
			{
				$pdo->exec("Call rechall_update($Del_num)");
				echo "Обновление успешно завершено!<br>";
			}
			$sql = "SELECT rechall.* from rechall join book on rechall.Books_id = book.Book_id join list using(Book_id) where Del_id = '$Del_num';";
			$result = $pdo->query($sql);
			$updating_strings = $result->fetchAll();
		}
	}
?>

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