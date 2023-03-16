<?php
session_start();
require("php/db_content.php");

$login = $_POST['login'];
$password = $_POST['password'];
$md5_password = md5($password);

$query = mysqli_query($connect, "SELECT * FROM `users` WHERE login='$login' AND password='$md5_password'");
if (mysqli_num_rows($query) > 0){

    $_SESSION['user'] = ['nick' => $login];
    header("Location: user.php");
} else {
    $_SESSION['error'] = "Ошибка: Данный логин или пароль неправильны.";
    header('Location: authorization.php');
}
?>