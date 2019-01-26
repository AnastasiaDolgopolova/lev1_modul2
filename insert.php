<?php
session_start();
echo $_SESSION['username']."<br>";
$_SESSION['user_id'];

if(count($_POST)>0){
	
$user_id=$_SESSION['user_id'];
$name= trim($_POST['name']);
$name= htmlspecialchars($name);

$description= trim($_POST['description']);
$description=htmlspecialchars($description);

$text=trim($_POST['text']);
$text=htmlspecialchars($text);

	if(empty($name) || empty($description) || empty($text)) {

       		echo 'Необходимо заполнить все поля!'.'<br>';
   			}
    

		else{
			$pdo = new PDO('mysql:host=localhost;dbname=php_course','root','');
		//var_dump($pdo); 

		$query =  $pdo->query("INSERT INTO posts (user_id,name,description,article) VALUES ('$user_id','$name','$description' , '$text')"); 
		//var_dump($query);
		echo 'Статья успешно добавлена!'."<br>";
		echo '<a href="user.php">/ Мои статьи /</a>';
		die;
		}
}
else{
	$name='';
	$description='';
	$text='';

	echo "Заполните поля и нажмите кнопку Send. ";
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Insert post</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">	
</head>
<body>
 <form method="POST" >
  <input name="name" type="text" placeholder="название статьи" size="57" value="<?php echo $name;?>"/> <br>
   <p>Краткое описание :</p>
  <textarea rows="5" cols="60" maxlength="250" name="description" >  <?php echo $description;?></textarea><br>
  <p>Текст статьи :</p>
  <textarea rows="15" cols="60" maxlength="2000" name="text"  >  <?php echo $text;?> </textarea><br>
  <input type="submit" name="send" value="Send">
 </form>
</body>
</html>


