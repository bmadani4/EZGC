<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
$error = '';
//$username = $_GET['username'];
//$coursename = $_POST['submit'];
if(isset($_POST['submit'])){
if(!empty($_POST['oldusername']) && !empty($_POST['newusername'])){
$oldusername = $_POST['oldusername'];
$newusername = $_POST['newusername'];
$connection = mysqli_connect("localhost:8889","root","root","ezgc");
//$query = mysqli_query($connection,"delete from Users where username = '$username'");
$query = mysqli_query($connection,"select * from Users where username = '$newusername'");
if($query){
$rows = mysqli_num_rows($query);
if($rows ==1){
$error = 'Username already exists.';
}
else if ($rows == 0){


$query = mysqli_query($connection,"update Users set username = '$newusername' where username = '$oldusername'");
header("location: index.php"); // Redirecting To Other Page


}
}
}
}
//header("location: index.php"); // Redirecting To Other Page
?>