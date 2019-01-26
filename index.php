<?php
session_start();
echo $_SESSION['username'];
$_SESSION['user_id'];

?>

   <!doctype html>
<html lang = "en">
	<head>
		<meta charset="utf-8">
		<title>test</title>
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">	
	</head>
	<body>
		<h1>Статьи пользователей</h1>
		/<a href="authorize-form.php">Авторизация</a> //
		<a href="register-form.php">Регистрация</a> //
		<a href="user.php">Мои статьи</a> //
		<a href="http://google.com" target="_blank">Google</a>/
		<hr>
		<div class="container">
			<div class="row">
				<?php
				include'select.php';
			    foreach($posts as $post):?>
				<div class="col-md-4">
					<img src="uploads/<?php echo $post['picture_name'];?> " width="300">
					<h2> <?php echo $post['name'];?>  </h2>
					<p>
						<?php echo $post['description'];?>
					</p>
					<a href="post.php?id=<?php echo $post['id'];?>">Читать далее</a>

				</div> 
				<?php endforeach;?>
			</div> 
		</div> 
		<hr>
   		&copy; &rarr; мой блог
	</body>
</html>
	
 