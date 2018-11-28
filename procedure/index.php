<?php
    if(!isset($_GET['send']))
    {
        include 'input_form.html';
        exit();
    }
    if(isset($_GET['send']))
    {
        include $_SERVER['DOCUMENT_ROOT'].'/includes/u_dbconnect.php';
    }
	$Del_num = $_GET['Del_id'];                     //transfer argument from html

	$sql = "SELECT Updating from delivery where Del_id = '$Del_num';";
	$result = $pdo->query($sql);

    $select_not_found = $result->rowcount();
    if($select_not_found == 0)
    {
        $error_message = "Партии с таким ID не существует!<br>";
        $_SESSION['error_message'] = $error_message;
        include "../includes/error.php";
        exit();
    }
	else
	{
		echo "Введен корректный ID партии!<br>";
		$sql = "SELECT rechall.* from rechall join book on rechall.Books_id = book.Book_id join list using(Book_id) where Del_id = '$Del_num';";
		$result1 = $pdo->query($sql);
		$old_strings = $result1->fetchAll();

        $select_not_found = $result1->rowcount();
        if($select_not_found == 0)
        {
            $error_message = "Ни одно издательство не совершало эту поставку!<br>";
            $_SESSION['error_message'] = $error_message;
            include "../includes/error.php";
            exit();
        }
		else
		{
			$test_field_updating = $result->fetch();
			$flag = $test_field_updating['Updating'];
			if($flag == 1) 								//updated before
				echo "Обновление для этой партии выполнялось ранее!<br>";
			else
			{
				$pdo->exec("Call rechall_update($Del_num)");
				echo "Обновление успешно завершено!<br>";
			}
			$sql = "SELECT rechall.* from rechall join book on rechall.Books_id = book.Book_id join list using(Book_id) where Del_id = '$Del_num';";
			$result = $pdo->query($sql);
			$updating_strings = $result->fetchAll();
		}
	}
	include "result.php";
?>