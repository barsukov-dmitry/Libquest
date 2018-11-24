<?php
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

	$d_year = $_GET['ryear'];//obrabotka vvoda
	$sql = "select pubhouse.* from delivery join pubhouse using(Pub_id) where month(Del_date) < 7 and year(Del_date)=$d_year and Del_cost = (select MAX(Del_cost) from delivery where month(Del_date) < 7 and year(Del_date) =$d_year);";
	
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
			с выбранным значением года.</div>
			<br><br>
		<?php else: ?>
			<br><br>
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
  	<form action ="select4_input_form.html" align = center >
   		<button  class="b1">
    		<img src="bookk.png" alt="Перо" style="vertical-align:middle" align = left> 
				<H3>Ввести другое значение</H3>
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
