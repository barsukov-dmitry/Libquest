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

	$d_year = $_GET['ryear'];
	$d_month = $_GET['rmonth'];
	$sql = "select Pub_id, Pub_name, SUM(Del_cost) from delivery join pubhouse using(Pub_id) where year(Del_date)=$d_year and month(Del_date)=$d_month group by (Pub_id);";
	$result = $pdo->query($sql);
	$deliveries = $result->fetchAll();
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
			с выбранными значениями года и месяца.</div>
		<br><br>
		<?php else: ?>
		<table border = "2" bordercolor = brown align = center><tbody>
			<th colspan="3" align = center>Отчет о поставках</th>
			<tr>
				<td align = center> Pub_id</td>
				<td align = center> Pub_name</td>
				<td align = center> Sum_Del_cost)</td>
			</tr>
			<?php foreach ($deliveries as $delivery):?>
				<tr>
					<td align = center> <?php echo $delivery['Pub_id']; ?> </td>
					<td align = center> <?php echo $delivery['Pub_name']; ?> </td>
					<td align = center> <?php echo $delivery['SUM(Del_cost)']; ?> </td>
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
  	<form action ="select2_input_form.html" align = center >
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
