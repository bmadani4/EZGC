<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('check.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Sign Up Form</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Create an account!</h1>
<div id="login">
<h2>Signup Form</h2>
<form action="" method="post">
<label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password">
<label>Re-type Password: </label>
<input id="re-password" name="re-password" placeholder="**********" type="password">
<label>School :</label>
<input id="school" name="school" placeholder="school" type="text">
<label>Level :</label>
<input id="level" name="level" placeholder="level" type="text">
<label>Age :</label>
<input id="age" name="age" placeholder="age" type="text">
<input name="submit" type="submit" value=" Sign Me Up! ">
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>