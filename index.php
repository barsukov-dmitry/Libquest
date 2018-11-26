<?php
    if (session_status() == PHP_SESSION_NONE)
        session_start();
    include "includes/dbconnect.php";
   if (isset($_SESSION['db_login']))
   {
       include "includes/u_dbconnect.php";
   }
    function no_roots()
    {
        $error_message = "У вас нет прав для совершения операции<br>";
        $_SESSION['error_message'] = $error_message;
        echo "href = \"../includes/error.php\"";
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset ="utf-8">
        <title >Библиотека Libquest</title>
       <link rel="stylesheet" href="css/book.css">
       <link rel="shortcut icon" type="image/png" href="img/badger2.png">
       <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
      <link href="https://fonts.googleapis.com/css?family=Noto+Serif" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css?family=Merriweather" rel="stylesheet">
        <style> body { margin: 0; padding: 0; background: url(img/home.jpg); background-size: 100%; font-family: 'Noto Serif', serif; font-size: 16px; text-align: center;}
                .header a { padding-right: 10px; }
        </style>
    </head>
    <body>
    <div class = "grid">
        <div class="header">
            <div class = "logo">Библиотека Libquest</div>
            <div class = "auth">
                <a href = "authorisation/index.php">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                    <div class = "role"><?php echo  $_SESSION['db_login'];?></div>
                </a>
            </div>
        </div>
        <div class="content cl-effect-21">
        	 <div class="content_header">Выберите пункт меню для выполнения операции:</div>
  				<div><a  <?php if (!isset($_SESSION['db_login'])) no_roots();
  				else { if($_SESSION['db_login'] != "analitic") no_roots();
                    else echo "href=\"selects/index1.php\""; } ?> title="Ресурс доступен только для аналитика">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    Отчет о поставках за указанный год и месяц по форме: код книги, цена экземпляра, общее количество экземпляров</a></div><br>
                <div><a  <?php if($_SESSION['db_login'] != "analitic") no_roots(); else echo "href=\"selects/index2.php\""; ?> title="Ресурс доступен только для аналитика">
                    <i class="fa fa-university" aria-hidden="true"></i>
                    Отчет о поставках за указанный год и месяц по форме: код издательства, название издательства, общая сумма заказов</a> </div><br>
                <div><a  <?php if($_SESSION['db_login'] != "analitic") no_roots(); else echo "href=\"selects/index3.php\""; ?> title="Ресурс доступен только для аналитика">
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                    Сведения об издательстве, у которого были самые дорогие экземпляры определенной книги за указанный год и месяц</a></div><br>
                <div><a  <?php if($_SESSION['db_login'] != "analitic") no_roots(); else echo "href=\"selects/index4.php\""; ?> title="Ресурс доступен только для аналитика">
                    <i class="fa fa-diamond" aria-hidden="true"></i>
                    Сведения об издательстве, в котором был размещен самый дорогой заказ в первом полугодии указанного года</a></div><br>
                <div><a  <?php if($_SESSION['db_login'] != "analitic") no_roots(); else echo "href=\"selects/index5.php\""; ?> title="Ресурс доступен только для аналитика">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    Все сведения об издательствах, не сделавших ни одной поставки.</a></div><br>
                <div><a  <?php if($_SESSION['db_login'] != "analitic") no_roots(); else echo "href=\"selects/index6.php\""; ?> title="Ресурс доступен только для аналитика">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    Все сведения об издательствах, не сделавших ни одной поставки в указанном месяце и году</a></div><br>
                <div><a  <?php if($_SESSION['db_login'] != "director") no_roots(); else echo "href=\"procedure/index.php\""; ?> title="Ресурс доступен только для директора">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    Процедура обновления количества и стоимости книг с одинаковым ID для конкретной партии книг</a></div><br>
                <div><a  <?php if($_SESSION['db_login'] != "worker") no_roots(); else echo "href=\"main_scenary/index.php\""; ?> title="Ресурс доступен только для работника библиотеки">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    Выполнение главного сценария "Выдача книги читателю"</a></div><br>
        </div>
        <div class="footer">Контактный телефон библиотеки: 8-926-438-05-91</div>
     </div>
    </body>
</html>