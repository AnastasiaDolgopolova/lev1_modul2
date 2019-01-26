<?php
session_start();
 $_SESSION['username'];
$_SESSION['user_id'];
//чтение из БД,вывод всех постов
$pdo = new PDO('mysql:host=localhost;dbname=php_course','root','');

$statement = $pdo->query('SELECT * FROM posts');
$posts= $statement->fetchAll(PDO::FETCH_ASSOC);
//var_dump($posts);
?>
