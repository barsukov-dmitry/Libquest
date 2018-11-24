<?php
    include $_SERVER['DOCUMENT_ROOT'].'/includes/dbconnect.php';
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
		<title>Отчет 3</title>
		<link rel="stylesheet" href="../css/book.css">
        <link rel="shortcut icon" type="image/png" href="../img/badger2.png">
	</head>
	<body><br><br>
		<?php if ($flag == 0): ?>
			<div >Нет данных, соответствующих данному запросу,<br>
			с выбранными значениями года, месяца и названия книги.</div>
		<br><br>
		<?php else: ?>
		<table border = "2"  ><tbody>
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
  	<form action ="input_form3.html"  >
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
