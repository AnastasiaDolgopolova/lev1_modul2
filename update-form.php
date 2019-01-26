<?php  
session_start();
echo $_SESSION['username']."<br>";
$_SESSION['user_id'];
$id=$_GET['id'];


//изменение статьи
if(count($_POST)<1){
//var_dump($id);
$user_id=$_SESSION['user_id'];

$pdo = new PDO('mysql:host=localhost;dbname=php_course','root','');
$query ="SELECT * FROM posts WHERE id =  '$id' && user_id = '$user_id' "; 
			//var_dump($query);
		
			$result=$pdo->query($query)->fetchAll(PDO::FETCH_ASSOC);
			//var_dump($result);
	if($result) {
	$name=$result[0]["name"];
	$description=$result[0]["description"];	
	$text=$result[0]["article"];

	echo "Измените необходимую информацию в полях <br> и нажмите кнопку Send. ";
	}
 }

if(count($_POST)>0){

$user_id=$_SESSION['user_id'];
$name= trim($_POST['name']);
$name= htmlspecialchars($name);

$description= trim($_POST['description']);
$description=htmlspecialchars($description);

$text=trim($_POST['text']);
$text=htmlspecialchars($text);


//$id=$result[0]["id"];

	if(empty($name) || empty($description) || empty($text)) {

       		echo 'Необходимо заполнить все поля!'.'<br>';
   			}

	else{
		$pdo = new PDO('mysql:host=localhost;dbname=php_course','root','');
		//var_dump($pdo);

		$statement ="UPDATE posts SET name='$name', description='$description', article='$text' WHERE id='$id'";
		//var_dump($statement);
		$result=$pdo->exec($statement);
		//var_dump($result);
			echo 'Статья успешно изменена!'."<br>";
			echo '<a href="user.php">/ Мои статьи /</a>';
			die;
		//header('Location: user-posts.php');
			}
			
		
}


?>

 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create article</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">	
</head>
<body>
 <form method="POST" >
 <p>Название статьи :</p>
 <input name="name" type="text" size="57" value="<?php echo $name;?>"/> <br>
 <p>Краткое описание :</p>
  <textarea rows="3" cols="60" maxlength="250" name="description"> <?php echo $description;?> </textarea><br>
  <p>Текст статьи :</p>
  <textarea rows="10" cols="60" maxlength="2000" name="text" > <?php echo $text;?> </textarea><br>
  <input type="submit" name="send" value="Send">
 </form>
</body>
</html>
