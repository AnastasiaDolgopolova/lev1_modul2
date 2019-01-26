<?php
session_start();
 $_SESSION['username'];
$_SESSION['user_id'];
$username=$_SESSION['username'];
//чтение из БД,вывод текста статьи
if(isset($_GET['id'])){
$post_id=$_GET['id'];
//var_dump($post_id);
$pdo = new PDO('mysql:host=localhost;dbname=php_course','root','');

$query = $pdo->query("SELECT * FROM posts WHERE id='$post_id'");
$post= $query->fetchAll(PDO::FETCH_ASSOC);
//var_dump($post);

	$name=$post[0]["name"];
	$description=$post[0]["description"];	
	$text=$post[0]["article"];
	$picture=$post[0]["picture_name"];
 /* var_dump($name);
  var_dump($description);
  var_dump($text);
  var_dump($picture); 
 */ 
 } 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Статья</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"> 
</head>
<body>
  <h3>Статья пользователя <?echo "$username";?></h3>
   /<a href="index.php">На главную</a> //
   <a href="user.php">Мои статьи</a> //
   <a href="http://google.com" target="_blank">Google</a>/
   <hr>
   <h1> <?php echo $name  ?></h1>
    <img src="uploads/<?php echo  $picture  ?> " width="400" height="250">
   <hr>
   <h3><?php echo $description ?></h3>
  
   <hr>
   <?php echo $text ?>
   <hr>
   &copy; &rarr; мой блог
</body>
</html>
