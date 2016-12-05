<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('login.php'); // Includes Login Script
if(isset($_POST['signup'])){
header("location: signup.php");
}
if(isset($_SESSION['login_user'])){
$username = $_SESSION['login_user'];
$connection = mysqli_connect("localhost:8889","root","root","ezgc");
$query = mysqli_query($connection,"select * from Users where username = '$username'");
if($query){
$rows = mysqli_num_rows($query);
if($rows == 1){
header("location: profile.php");
}
}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Login Form in PHP with Session</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Welcome to EZGC!</h1>
<div id="login">
<h2>Login Form</h2>
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<input name="submit" type="submit" value=" Login ">
<input name="signup" type="submit" value=" Signup " >
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>