<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../css/book.css">
    <link rel="shortcut icon" type="image/png" href="../img/badger2.png">
    <title>Ошибка ввода</title>
</head>
<body>
     <div class = "error_header"><?php echo $_SESSION['error_message']?></div>
     <?php if($_SESSION['error_message'] == "У вас нет прав для совершения операции<br>"): ?>
            <form action = "../authorisation/index.php" style="text-align:center">
                <button  class="b1">
                    <img src="../img/bookk.png" style="vertical-align:middle" align = left>
                    <H3>Авторизоваться</H3>
                </button></p>
            </form>
        <?php else: ?>
             <form action = "?" style="text-align:center">
                <button  class="b1">
                    <img src="../img/bookk.png" style="vertical-align:middle" align = left>
                    <H3>Ввести другие значения</H3>
                </button></p>
            </form>
        <?php endif; ?>
    <br>
    <form action ="../index.php">
        <button  class="b1">
            <img src="../img/bookk.png" style="vertical-align:middle" align = left>
            <H3>Вернуться  к  меню  библиотеки</H3>
        </button></p>
    </form>
</body>
</html>