<?php
session_start();
 $_SESSION['username'];
$_SESSION['user_id'];
$user_id=$_SESSION['user_id'];
//чтение из БД,вывод постов пользователя;
$pdo = new PDO('mysql:host=localhost;dbname=php_course','root','');

$statement = $pdo->query("SELECT * FROM posts WHERE user_id='$user_id'");
$posts= $statement->fetchAll(PDO::FETCH_ASSOC);
//var_dump($posts);
?>
