<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('session.php');
include ('checkpwd.php');
$_POST['user'] = $_GET['username'];
?>
<!DOCTYPE html>
<html>
<head>
<title>EZGC</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Change Password</h1>
<div id="login">
<h2>Please enter your new password</h2>
<form action="" method="post">
<label>New Password :</label>
<input id="password" name="password" placeholder="new password" type="text">
<input name="submit" type="submit" value=" Update ">
<br></br>
<b id="viewcourse"><a href="index.php">Home</a></b>
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>