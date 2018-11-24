<?php
include "input_form.html";
include '../includes/dbconnect.php';
session_start();
if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sql = "SELECT G_id FROM users WHERE login='$login' AND password = '$password';";
    $result = $pdo->query($sql);
    $g_id = $result->fetch();
    $group_id = $g_id['G_id'];

    $sql = "SELECT login, password FROM groups WHERE G_id = '$group_id';";
    $result = $pdo->query($sql);
    $group = $result->fetch();
    $_SESSION['db_login'] = $group['login'];
    $_SESSION['db_password'] = $group['password'];
    header("location:../index.php");
}
?>