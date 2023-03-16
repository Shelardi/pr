<?php
session_start();
require("php/db_content.php");
$login = $_POST['login'];
$password = $_POST['password'];
$md5_password = md5($password);
$query = mysqli_query($connect, "SELECT * FROM 'users' WHERE 'login'='{$login}'");
if (mysqli_num_rows($query) == 0) {
    $_SESSION['user'] = ['nick' => $login];
    mysqli_query($connect, "INSERT INTO 'users' ('login', 'password') VALUES ('{$login}', '{$md5_password}')");
    header("Location: /user.php");
} else {
    echo("Ошибка: Данный логин занят другим пользователем.");
}
?>