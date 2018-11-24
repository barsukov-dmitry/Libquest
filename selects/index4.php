<?php
	 $dbname = "library";
	 $login = "root";
	 $password = "root";
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
		<title>Отчет 4</title>
		<link rel="stylesheet" href="../css/book.css">
        <link rel="shortcut icon" type="image/png" href="../img/badger2.png">
	</head>
	<body><br><br>
		<?php if ($flag == 0): ?>
			<div >Нет данных, соответствующих данному запросу,<br>
			с выбранным значением года.</div>
			<br><br>
		<?php else: ?>
			<br><br>
		<table border = "2" ><tbody>
			<th colspan="7" >Сведения об издательстве</th>
			<tr>
				<td > Pub_id</td>
				<td > Pub_name</td>
				<td > Adress</td>
				<td > Contact_name</td>
				<td > Number</td>
				<td > Foundation_year</td>
				<td > Contract_date</td>
			</tr>
			<?php foreach ($pubhouses as $pubhouse):?>
				<tr>
					<td > <?php echo $pubhouse['Pub_id']; ?> </td>
					<td > <?php echo $pubhouse['Pub_name']; ?> </td>
					<td > <?php echo $pubhouse['Adress']; ?> </td>
					<td > <?php echo $pubhouse['Contact_name']; ?> </td>
					<td > <?php echo $pubhouse['Number']; ?> </td>
					<td > <?php echo $pubhouse['Foundation_year']; ?> </td>
					<td > <?php echo $pubhouse['Contract_date']; ?> </td>
				</tr>
			</tbody>
		<?php endforeach; ?>
		</table><br>
		<?php endif; ?>
  	<?php if ($flag == 0): ?>
  	<form action ="input_form4.html"  >
   		<button  class="b1">
    		<img src="../img/bookk.png" alt="Перо" style="vertical-align:middle" align = left>
				<H3>Ввести другое значение</H3>
   		</button></p>
  	</form>
  	  <?php endif; ?>
	  <br>
      <form action ="../index.php"  >
   		<button  class="b1">
    		<img src="../img/bookk.png" alt="Перо" style="vertical-align:middle" align = left>
				<H3>Вернуться  к  меню  библиотеки</H3>
   		</button></p>
  	</form>  
	</body>
</html>
