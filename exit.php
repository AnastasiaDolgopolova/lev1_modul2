<?php
session_start();
echo $_SESSION['username']."<br>";
$_SESSION['user_id'];

if(isset($_GET['logout'])){
unset ($_SESSION['username'],$_SESSION['user_id']);
 session_destroy ();
 echo "Выход осуществлен успешно."."<br>";
 echo '<a href="index.php">/ Главная /</a>'; 
}

/*
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">	
</head>
<body>
<form method=post >
 <button name="exit" type="submit" value="exit">Выход</button>
</form>
</body>
</html>
*/
?>