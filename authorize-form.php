<?php 
session_start();
echo $_SESSION['username']."<br>";
$_SESSION['user_id'];

if (isset($_SESSION['user_id']
)){
	echo 'Вы уже авторизованы!'."<br>";
	echo '<a href="index.php">Главная</a>';
	 return;
}
	if(count($_POST)>0){
 	$user_login= trim($_POST['login']);
 	$user_login = htmlspecialchars($user_login);//превращаем весь html код в строку
	$user_password= trim($_POST['password']);
	$user_password = htmlspecialchars($user_password);
		if(empty($user_password) || empty($user_login)) {

       		echo 'Не указан логин или пароль'.'<br>';
   			}
    
		else{
			/*function user_authorize($user_login,$user_password){*/
				//var_dump($user_login,$user_password);
			$pdo = new PDO('mysql:host=localhost;dbname=php_course','root','');

			//var_dump($pdo);
			$query ="SELECT * FROM signup WHERE login =  '$user_login' && password = '$user_password' "; 
			//var_dump($query);
			$result=$pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
			//var_dump($result);
			
 			//user_authorize($user_login,$user_password);*/	
			if($result) {
				$user_id=intval($result[0]["user_id"]);

				$_SESSION['user_id'] =$user_id;
				$_SESSION['username'] = $result[0]["username"];

				//var_dump($_SESSION['user_id']);
				echo $_SESSION['username'];
				echo'<br>';
    			echo 'вы успешно авторизованы !'."<br>";
    			echo '<a href="index.php">/ Главная /</a>'; 
    			die;
    			  } 
   		 
					else{
	
 						echo'неверный логин или пароль';
						}
						
				
				}
			
	}	
else{
	$user_login='';
	$user_password='';
	echo "Здравствуйте!Заполните поля и нажмите кнопку Authorize. ";

}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Authorize</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">	
</head>
<body>

 <form   method="post">
  <input type="text" name="login" value="<?php echo $user_login;?>" placeholder="login"/> <br>
  <input type="password" name="password" value="<?php echo $user_password;?>" placeholder="password"/><br>
  <button type="submit">Authorize</button>
  <a href="register-form.php">Register</a>
 </form>
</body>
</html>
