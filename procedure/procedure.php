<?php
	 $dbname = "library";
	 $login = "root";
	 $password = "root";
	 echo "<br>";
	 try
	 {
	 	$pdo = new PDO("mysql:host=LocalHost; dbname=$dbname",$login,$password);
	 	$pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 }
	 catch(PDOException $e)
	 {
	 	echo "Ошибка подключения к базе данных<br>";
	 	echo $e->getMessage();
	 	exit();
	 }

	$Del_num = $_GET['Del_id'];                     //transfer argument from html

	$sql = "SELECT Updating from delivery where Del_id = '$Del_num';";
	$result = $pdo->query($sql);
	$numb = $result->rowcount(); 
	if($numb < 1)									//correct Del_id
	{
		echo "Партии с таким ID не существует!<br>";
		exit();
	}								
	else
	{
		echo "Введен корректный ID партии!<br>";

		$sql = "SELECT rechall.* from rechall join book on rechall.Books_id = book.Book_id join list using(Book_id) where Del_id = '$Del_num';";
		$result1 = $pdo->query($sql);
		$old_strings = $result1->fetchAll();
		$flag1 = $result1->rowcount();
		if($flag1 == 0)
			echo "Ни одно издательство не совершало эту поставку!<br><br>";
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
		<?php if ($flag1 != 0): ?>
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
		<?php endif; ?>
		<style>
   .b1 {
    background: white; 
    color: brown; 
    border-radius:  10px;
    border: 2px solid brown;
   		}
  	</style>
  	<form action ="input_form.html"  >
   		<button  class="b1">
    		<img src="../img/bookk.png" alt="Перо" style="vertical-align:middle" align = left>
				<H3>Ввести другое значение</H3>
   		</button></p>
  	</form>
	  <br>
      <form action ="../index.php"  >
   		<button  class="b1">
    		<img src="../img/bookk.png" alt="Перо" style="vertical-align:middle" align = left>
				<H3>Вернуться  к  меню  библиотеки</H3>
   		</button></p>
  	</form>  
	</body>
</html>