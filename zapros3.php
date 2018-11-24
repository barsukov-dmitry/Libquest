﻿<?php
	 $dbname = "library";
	 $login = "root";
	 $password = "";
	 try
	 {
	 	$pdo = new PDO("mysql:host=LocalHost; dbname=$dbname",$login,$password);
	 	$pdo->SetAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	 }
	 catch(PDOException $e)
	 {
	 	echo "Ошибка подключения БД";
	 	echo $e->getMessage();
	 	exit();
	 }

	$d_year = $_GET['ryear'];
	$d_month = $_GET['rmonth'];
	$book_name = $_GET['rbook_name'];

	$sql = "select pubhouse.* from list join delivery using(Del_id) join pubhouse using(Pub_id) join book using(Book_id) where Book_name='$book_name' and year(Del_date)=$d_year and month(Del_date)=$d_month and Copy_price = (select MAX(Copy_price) from list join book using(Book_id) join delivery using(Del_id) where Book_name='$book_name' and year(Del_date)=$d_year and month(Del_date)=$d_month);";
	
	$result = $pdo->query($sql);
	$pubhouses = $result->fetchAll();
	$flag = $result->rowcount();
?>
<html>
	<head>
		<title>Report</title>
		<link rel="stylesheet" href="forma.css">
	</head>
	<body><br><br>
		<?php if ($flag == 0): ?>
			<div align = center>Нет данных, соответствующих данному запросу,<br>
			с выбранными значениями года, месяца и названия книги.</div>
		<br><br>
		<?php else: ?>
		<table border = "2" bordercolor = brown align = center><tbody>
			<th colspan="7" align = center>Сведения об издательстве</th>
			<tr>
				<td align = center> Pub_id</td>
				<td align = center> Pub_name</td>
				<td align = center> Adress</td>
				<td align = center> Contact_name</td>
				<td align = center> Number</td>
				<td align = center> Foundation_year</td>
				<td align = center> Contract_date</td>
			</tr>
			<?php foreach ($pubhouses as $pubhouse):?>
				<tr>
					<td align = center> <?php echo $pubhouse['Pub_id']; ?> </td>
					<td align = center> <?php echo $pubhouse['Pub_name']; ?> </td>
					<td align = center> <?php echo $pubhouse['Adress']; ?> </td>
					<td align = center> <?php echo $pubhouse['Contact_name']; ?> </td>
					<td align = center> <?php echo $pubhouse['Number']; ?> </td>
					<td align = center> <?php echo $pubhouse['Foundation_year']; ?> </td>
					<td align = center> <?php echo $pubhouse['Contract_date']; ?> </td>
				</tr>
			</tbody>
		<?php endforeach; ?>
		</table><br>
		<?php endif; ?>
		<style>
   .b1 {
    background: white; /* Синий цвет фона */ 
    color: brown; /* Белые буквы */ /* Размер шрифта в пунктах */
    border-radius:  10px;
    border: 2px solid brown;
   		}
  	</style>
	<?php if ($flag == 0): ?>
  	<form action ="select3_input_form.html" align = center >
   		<button  class="b1">
    		<img src="bookk.png" alt="Перо" style="vertical-align:middle" align = left> 
				<H3>Ввести другие значения</H3>
   		</button></p>
  	</form>
  	  <?php endif; ?>
	  <br>
      <form action ="index.php" align = center >
   		<button  class="b1">
    		<img src="bookk.png" alt="Перо" style="vertical-align:middle" align = left> 
				<H3>Вернуться  к  меню  библиотеки</H3>
   		</button></p>
  	</form>  
	</body>
</html>
