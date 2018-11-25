<?php
    if(!isset($_GET['send']))
    {
        include 'input_form2.html';
        exit();
    }
    if(isset($_GET['send']))
    {
        include $_SERVER['DOCUMENT_ROOT'].'/includes/u_dbconnect.php';
    }
	$d_year = $_GET['ryear'];
	$d_month = $_GET['rmonth'];
	$sql = "select Pub_id, Pub_name, SUM(Del_cost) from delivery join pubhouse using(Pub_id) where year(Del_date)=$d_year and month(Del_date)=$d_month group by (Pub_id);";
	$result = $pdo->query($sql);
	$deliveries = $result->fetchAll();

    $select_not_found = $result->rowcount();
    if($select_not_found == 0)
    {
        $error_message = "Нет данных, соответствующих данному запросу,<br>
            с выбранными значениями года и месяца.";
        $_SESSION['error_message'] = $error_message;
        include "../includes/error.php";
        exit();
    }
?>
<html>
	<head>
		<title>Отчет 2</title>
        <link rel="stylesheet" href="../css/book.css">
        <link rel="shortcut icon" type="image/png" href="../img/badger2.png">
	</head>
	<body><br><br>
		<table border = "2"  ><tbody>
			<th colspan="3" >Отчет о поставках</th>
			<tr>
				<td>Pub_id</td>
				<td>Pub_name</td>
				<td>Sum_Del_cost</td>
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
	  <br>
      <form action ="../index.php"  >
   		<button  class="b1">
    		<img src="../img/bookk.png" alt="Перо" style="vertical-align:middle" align = left>
				<H3>Вернуться  к  меню  библиотеки</H3>
   		</button></p>
  	</form>  
	</body>
</html>
