<?php
session_start();
$_SESSION['username'];
$_SESSION['user_id'];

if (!isset($_SESSION['user_id']
)){
	exit("Доступ на эту страницу разрешен только зарегистрированным пользователям.<br> Если вы зарегистрированы, то войдите на сайт под своим логином и паролем.<br><a href='index.php'>Главная страница</a>");
}
$username=$_SESSION['username'];
?>

   <!doctype html>
<html lang = "en">
	<head>
		<meta charset="utf-8">
		<title>test</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">	
	</head>
	<body>
		<h1>Статьи пользователя <?echo "$username";?></h1>
		/<a href="index.php">Главная</a> //
		<a href="insert.php">Добавить статью</a> //
		<a href="http://google.com" target="_blank">Google</a> //
		<a href="exit.php?logout">Выход</a> /
		
		<hr>
		<div class="container">
			<div class="row">
				<?php
				include'user-posts.php';
			    foreach($posts as $post):?>
				<div class="col-md-4">
					<img src="uploads/<?php echo $post['picture_name'];?> " width="300">
					<h2> <?php echo $post['name'];?>  </h2>
					<p>
						<?php echo $post['description'];?>
					</p>
					<a href="post.php?id=<?php echo $post['id'];?>">Читать </a><br>
					<a href="update-form.php?id=<?php echo $post['id'];?>">Изменить</a><br>
					<a href="delete-form.php?name=<?php echo $post['name'];?>">Удалить</a><br>
					<a href="picture.php?name=<?php echo $post['name'];?>">Добавить картинку</a>
				</div> 
				<?php endforeach;?>
			</div> 
		</div>
		<hr>
   		&copy; &rarr; мой блог 
	</body>
</html>
	
 