﻿<?php
    if(!isset($_GET['send']))
    {
        include 'input_form4.html';
        exit();
    }
    if(isset($_GET['send']))
    {
        include $_SERVER['DOCUMENT_ROOT'].'/includes/u_dbconnect.php';
    }
	$d_year = $_GET['ryear'];
	$sql = "select pubhouse.* from delivery join pubhouse using(Pub_id) where month(Del_date) < 7 and year(Del_date)=$d_year and Del_cost = (select MAX(Del_cost) from delivery where month(Del_date) < 7 and year(Del_date) =$d_year);";
	$result = $pdo->query($sql);
	$pubhouses = $result->fetchAll();

    $select_not_found = $result->rowcount();
    if($select_not_found == 0)
    {
        $error_message = "Нет данных, соответствующих данному запросу,<br>с выбранными значениями года";
        $_SESSION['error_message'] = $error_message;
        include "../includes/error.php";
        exit();
    }
?>
<html>
	<head>
		<title>Отчет 4</title>
		<link rel="stylesheet" href="../css/book.css">
        <link rel="shortcut icon" type="image/png" href="../img/badger2.png">
	</head>
	<body><br><br>
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
	  <br>
      <form action ="../index.php"  >
   		<button  class="b1">
    		<img src="../img/bookk.png" alt="Перо" style="vertical-align:middle" align = left>
				<H3>Вернуться  к  меню  библиотеки</H3>
   		</button></p>
  	</form>  
	</body>
</html>
