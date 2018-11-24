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
	$sql = "select Book_id, Copy_price, Copies_number from list join delivery using(Del_id) join book using(Book_id) where year(Del_date)='$d_year' and month(Del_date)='$d_month' group by(Book_id);";
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
		<br><br>
		<table border = "2" bordercolor = brown align = center><tbody>
			<th colspan="3" align = center style = "color: brown">Отчет о поставках</th>
			<tr style = "color: brown">
				<td align = center> Book_id</td>
				<td align = center> Copy_price</td>
				<td align = center> Copies_number</td>
			</tr>
			<?php foreach ($deliveries as $delivery):?>
				<tr>
					<td align = center> <?php echo $delivery['Book_id']; ?> </td>
					<td align = center> <?php echo $delivery['Copy_price']; ?> </td>
					<td align = center> <?php echo $delivery['Copies_number']; ?> </td>
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
  	<?php if ($flag == 0): ?>
  	<form action ="select1_input_form.html" align = center >
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
