<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('session.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>Your Home Page</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="login">
<b id="welcome">Welcome : <i><?php echo $login_session; ?></i></b>
<b id="logout"><a href="logout.php">Log Out</a></b>
<br></br>
<b id="logout"><a href="account.php">My Account</a></b>
<b id="addcourse"><a href="addcourse.php">Add a course!</a></b>
<br></br>
<b id="viewcourse"><a href="courselist.php">View Your Current Courses!</a></b>
<br></br>
<b id='deletecourse'><a href="deletecourse.php">Delete a Course!</a></b>
</div>
</body>
</html>