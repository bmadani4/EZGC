<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
$error = '';
include('deletecheck.php');
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>EZGC</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Delete Account</h1>
<div id="login">
<h2>Please enter your username</h2>
<form action="" method="post">
<label>User Name :</label>
<input id="username" name="username" placeholder="username" type="text">
<input name="submit" type="submit" value=" Delete Me ">
<br></br>
<b id="home"><a href="index.php">Home</a></b>
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>