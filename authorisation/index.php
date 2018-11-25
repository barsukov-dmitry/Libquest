<?php
if(!isset($_POST['log_in']))
{
    include "input_form.html";
}
if(isset($_POST['log_in']))
{
    include '../includes/dbconnect.php';
}
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT G_id FROM users WHERE login='$login' AND password = '$password';";
    $result = $pdo->query($sql);
    $g_id = $result->fetch();
    $user_not_found = $result->rowcount();
    if($user_not_found == 0)
    {
        $error_message = "Логин и Пароль введены некорректно";
        $_SESSION['error_message'] = $error_message;
        include "../includes/error.php";
        exit();
    }
    $group_id = $g_id['G_id'];

    $sql = "SELECT login, password FROM groups WHERE G_id = '$group_id';";
    $result = $pdo->query($sql);
    $group = $result->fetch();
    $_SESSION['db_login'] = $group['login'];
    $_SESSION['db_password'] = $group['password'];
    header("location:../index.php");
}
?>