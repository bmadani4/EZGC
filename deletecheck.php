<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
$username = $_GET['username'];
//$coursename = $_POST['submit'];
$connection = mysqli_connect("localhost:8889","root","root","ezgc");
$query = mysqli_query($connection,"delete from Users where username = '$username'");
header("location: index.php"); // Redirecting To Other Page
?>