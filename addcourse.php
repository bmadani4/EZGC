<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('coursecheck.php');
?>
<!DOCTYPE html>
<html>
<head>
<title>EZGC</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Add a Course</h1>
<div id="login">
<h2>Please name the course</h2>
<form action="" method="post">
<label>Class Name :</label>
<input id="coursename" name="coursename" placeholder="coursename" type="text">
<input name="submit" type="submit" value=" Add ">
<br></br>
<b id="viewcourse"><a href="index.php">Home</a></b>
<span><?php echo $error; ?></span>
</form>
</div>
</div>
</body>
</html>