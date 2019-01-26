<?php  
session_start();
echo $_SESSION['username'];
$_SESSION['user_id'];
$post_name=$_GET['name'];
$user_id=$_SESSION['user_id'];
if(count($_FILES)>0){
  $file= $_FILES ['image'];
  $post_name=$_GET['name'];
  

  function upload_file ($filename, $tmp_name,$post_name,$user_id){
    $newName = md5 (microtime()) . '.jpg';
   // echo $newName ;
    $picture_name = $newName ;
    


    $pdo = new PDO('mysql:host=localhost;dbname=php_course','root','');
  
    $query =  $pdo->query("UPDATE posts SET picture_name = '$picture_name' WHERE name='$post_name' && user_id='$user_id'"); //изменяем указанную статью вписывая в нее имя картинки.
    //var_dump($query);

    move_uploaded_file( $tmp_name, 'uploads/'."$picture_name");
  }

  upload_file ($file['name'],$file['tmp_name'],$post_name,$user_id);
    echo 'Картинка успешно добавлена!'."<br>";
    echo '<a href="user.php">/ Мои статьи /</a>';

  die;
}

?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>File</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">	
</head>
<body>
 <form  method="post" enctype="multipart/form-data">
 
  <input name="name" type="text" size="57" value="<?php echo $_GET['name'];?>" readonly/> <br>
  <input type="file" name="image"> <br>
  <button type="submit">Submit</button>
 </form>
</body>
</html>