<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('session.php');
$username = $_SESSION['login_user'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Account</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="login" method = "post">
<b id="logout"><a href="logout.php">Log Out</a></b>
<br></br>
<b id="changepwd"><a href="changepwd.php?username=<? echo $username; ?>">Change password</a></b>
<br></br>
<b id="changename"><a href="changeuser.php?username=<? echo $username; ?>">Change username</a></b>
<br></br>
<b id="deleteact"><a href="deletecheck.php?username=<?php echo $username; ?>">Delete account</a></b>
<br></br>
<b id='home'><a href="index.php">Home</a></b>
</div>
</body>
</html>