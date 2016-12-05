<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
$error = '';
include('checkuser.php');
$username = $_GET['username'];
?>
<!DOCTYPE html>
<html>
<head>
<title>EZGC</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Change Username</h1>
<div id="login">
<h2>Please enter new username</h2>
<form action="" method="post">
<label>Old User Name :</label>
<input id="oldusername" name="oldusername" placeholder="old username" type="text">
<br></br>
<label>New User Name :</label>
<input id="newusername" name="newusername" placeholder="new username" type="text">
<input name="submit" id = "<?php echo $username ?>" type="submit" value=" Update ">
<br></br>
<b id="home"><a href="index.php">Home</a></b>
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>