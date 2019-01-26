<?php 
session_start();
echo $_SESSION['username']."<br>";
$_SESSION['user_id'];
//удаление статьи при нажатии на кнопку "Удалить"
if(isset($_POST['send'])){
$del=trim($_GET['name']);
$user_id=$_SESSION['user_id'];
 $pdo = new PDO('mysql:host=localhost;dbname=php_course','root','');

//var_dump($_GET['name']);

$del_res = $pdo->query("DELETE FROM posts WHERE name='$del' && user_id='$user_id'");
//var_dump($del_res);
echo 'Статья успешно удалена.'."<br>";
echo '<a href="user.php">/ Мои статьи /</a>';
die;
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">	
</head>
<body>
 <form method="POST" >  
  <input name="name" type="text" value="<?php echo $_GET['name'];?>" readonly/> <br>
  <input type="submit" name="send" value="Delete">
 </form>
</body>
</html>