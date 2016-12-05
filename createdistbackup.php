<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('session.php');

print "<!DOCTYPE html>";
print"<html>";
print"<head>";
print"<title>EZGC</title>";
print"<link href='style.css' rel='stylesheet' type='text/css'>";
print"</head>";
print"<body>";
print"<div id='main'>";
print"<h1>Add a Course</h1>";
print"<div id='login'>";
print"<h2>Please name the course</h2>";
print"<form action='' method='post'>";
print"<label>Class Name :</label>";
print"<input id='coursename' name='coursename' placeholder='coursename' type='text'>";
print"<input name='submit' type='submit' value=' Add '>";
print"<br></br>";
print"<b id='viewcourse'><a href='index.php'>Home</a></b>";
print"<span><?php echo $error; ?></span>";
print"</form>";
print"</div>";
print"</div>";
print"</body>";
print"</html>";
?>