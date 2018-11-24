﻿<?php
    include $_SERVER['DOCUMENT_ROOT'].'/includes/dbconnect.php';
	$d_year = $_GET['ryear'];
	$d_month = $_GET['rmonth'];
	$sql = "select Book_id, Copy_price, Copies_number from list join delivery using(Del_id) join book using(Book_id) where year(Del_date)='$d_year' and month(Del_date)='$d_month' group by(Book_id);";
	$result = $pdo->query($sql);
	$deliveries = $result->fetchAll();
	$flag = $result->rowcount();
?>
<html>
	<head>
		<title>Отчет 1</title>
		<link rel="stylesheet" href="../css/book.css">
        <link rel="shortcut icon" type="image/png" href="../img/badger2.png">
	</head>
	<body><br><br>
		<?php if ($flag == 0): ?>
			<div >Нет данных, соответствующих данному запросу,<br>
		с выбранными значениями года и месяца.</div>
		<br><br>
	<?php else: ?>
		<br><br>
		<table border = "2"  ><tbody>
			<th colspan="3"  style = "color: brown">Отчет о поставках</th>
			<tr style = "color: brown">
				<td > Book_id</td>
				<td > Copy_price</td>
				<td > Copies_number</td>
			</tr>
			<?php foreach ($deliveries as $delivery):?>
				<tr>
					<td > <?php echo $delivery['Book_id']; ?> </td>
					<td > <?php echo $delivery['Copy_price']; ?> </td>
					<td > <?php echo $delivery['Copies_number']; ?> </td>
				</tr>
			</tbody>
		<?php endforeach; ?>
		</table><br>
	<?php endif; ?>
  	<?php if ($flag == 0): ?>
  	<form action = "input_form1.html" style="text-align:center">
   		<button  class="b1">
    		<img src="../img/bookk.png" alt="Перо" style="vertical-align:middle" align = left>
				<H3>Ввести другие значения</H3>
   		</button></p>
  	</form>
  	  <?php endif; ?>
	  <br>
      <form action ="../index.php">
   		<button  class="b1">
    		<img src="../img/bookk.png" alt="Перо" style="vertical-align:middle" align = left>
				<H3>Вернуться  к  меню  библиотеки</H3>
   		</button></p>
  	</form>  
	</body>
</html>
