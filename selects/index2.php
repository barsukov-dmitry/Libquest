<?php
    include $_SERVER['DOCUMENT_ROOT'].'/includes/dbconnect.php';
	$d_year = $_GET['ryear'];
	$d_month = $_GET['rmonth'];
	$sql = "select Pub_id, Pub_name, SUM(Del_cost) from delivery join pubhouse using(Pub_id) where year(Del_date)=$d_year and month(Del_date)=$d_month group by (Pub_id);";
	$result = $pdo->query($sql);
	$deliveries = $result->fetchAll();
	$flag = $result->rowcount();
?>
<html>
	<head>
		<title>Отчет 2</title>
        <link rel="stylesheet" href="../css/book.css">
        <link rel="shortcut icon" type="image/png" href="../img/badger2.png">
	</head>
	<body><br><br>
		<?php if ($flag == 0): ?>
			<div >Нет данных, соответствующих данному запросу,<br>
			с выбранными значениями года и месяца.</div>
		<br><br>
		<?php else: ?>
		<table border = "2"  ><tbody>
			<th colspan="3" >Отчет о поставках</th>
			<tr>
				<td > Pub_id</td>
				<td > Pub_name</td>
				<td > Sum_Del_cost)</td>
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
		<?php endif; ?>
	<?php if ($flag == 0): ?>
  	<form action ="input_form2.html"  >
   		<button  class="b1">
    		<img src="../img/bookk.png" alt="Перо" style="vertical-align:middle" align = left>
				<H3>Ввести другие значения</H3>
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
