<?php 
session_start();
echo $_SESSION['username']."<br>";
$_SESSION['user_id'];

if (isset($_SESSION['user_id']
)){
	echo "Вы уже зарегестрированы!<br>Если вы хотите зарегестрировать нового пользователя,<br> сперва зайдите в 'Мои статьи' и нажмите выход.<br>";
	echo '<a href="user.php">Мои статьи</a>';
	 return;
}
	if(count($_POST)>0){
		$pass1= trim($_POST['password1']);
		$pass1=htmlspecialchars($pass1);

		$pass2= trim($_POST['password2']);
		$pass2=htmlspecialchars($pass2);

		$username= trim($_POST['username']);
		$username=htmlspecialchars($username);

		$login= trim($_POST['login']);
		$login=htmlspecialchars($login);


		
			if($pass1!==$pass2){
			echo "пароли не одинаковы,введите парольеще раз.";
			echo "<br>";
			}
			else{
			$password=$pass1;	
			}
			if(empty($username) || empty($password) || empty($login)){
				echo "необходимо заполнить все поля";
			}

			else{
			$pdo = new PDO('mysql:host=localhost;dbname=php_course','root','');

			$query = "INSERT INTO signup (username,password,login) VALUES ('$username','$password','$login')"; 
			//var_dump($query);
			$pdo->exec($query);
			echo 'Все готово можете авторизоваться'."<br>";
			echo '<a href="authorize-form.php">/ Авторизация /</a>';
			}
	}		
		
else{
	$username='';
	$login='';
	
	echo "Здравствуйте!Заполните поля и нажмите кнопку Register. ";
}
	
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">	
</head>
<body>
 <form  method="post">
  <input type="text" name="username" value="<?php echo $username;?>" placeholder="username"> <br>
  <input type="text" name="login" value="<?php echo $login; ?>" placeholder="login"> <br>
  <input type="password" name="password1" placeholder="password"><br>
  <input type="password" name="password2" placeholder="repeat password"><br>
  <button type="submit">Register</button>
 </form>
</body>
</html>
