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
        <style>
            body {
                margin: 0;
                padding: 0;
                background: url(img/home.jpg);
                background-size: 100%;
                font-family: 'Noto Serif', serif;
                font-size: 16px;
                text-align: center;
            }
            .header a {
                padding-right: 10px;
            }
        </style>
    </head>
    <body>
    <div class = "grid">
        <div class="header">
            <div class = "logo">Библиотека Libquest</div>
            <div class = "auth">
                <a href = "authorisation/index.php">
                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                </a>
            </div>
        </div>
        <div class="content cl-effect-21">
        	 <div class="content_header">Выберите пункт меню для выполнения операции:</div>
  				<div><a href="selects/input_form1.html">
                    <i class="fa fa-book" aria-hidden="true"></i>
                    Отчет о поставках за указанный год и месяц по форме: код книги, цена экземпляра, общее количество экземпляров</a></div><br>
			    <div><a href="selects/input_form2.html">
                    <i class="fa fa-university" aria-hidden="true"></i>
                    Отчет о поставках за указанный год и месяц по форме: код издательства, название издательства, общая сумма заказов</a> </div><br>
  				<div><a href="selects/input_form3.html">
                    <i class="fa fa-address-book" aria-hidden="true"></i>
                    Сведения об издательстве, у которого были самые дорогие экземпляры определенной книги за указанный год и месяц</a></div><br>
  				<div><a href="selects/input_form4.html">
                    <i class="fa fa-diamond" aria-hidden="true"></i>
                    Сведения об издательстве, в котором был размещен самый дорогой заказ в первом полугодии указанного года</a></div><br>
  				<div><a href="selects/index5.php">
                    <i class="fa fa-frown-o" aria-hidden="true"></i>
                    Все сведения об издательствах, не сделавших ни одной поставки.</a></div><br>
  				<div><a href="selects/input_form6.html">
                    <i class="fa fa-truck" aria-hidden="true"></i>
                    Все сведения об издательствах, не сделавших ни одной поставки в указанном месяце и году</a></div><br>
                <div><a href="procedure/input_form.html">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    Процедура обновления количества и стоимости книг с одинаковым ID для конкретной партии книг</a></div><br>
                <div><a href="procedure/input_form.html">
                    <i class="fa fa-cogs" aria-hidden="true"></i>
                    Выполнение главного сценария</a></div><br>
        </div>
        <div class="footer">Контактный телефон библиотеки: 8-926-438-05-91</div>
     </div>
    </body>
</html>