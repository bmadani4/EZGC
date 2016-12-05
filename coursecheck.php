<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('session.php');
$error = "";
if(isset($_POST['submit'])){
$username = $_SESSION['login_user'];
$coursename = $_POST['coursename'];
$connection = mysqli_connect("localhost:8889","root","root","ezgc");
$query = mysqli_query($connection,"select * from courses where username = '$username' AND coursename = '$coursename'");
$rows = mysqli_num_rows($query);
if($rows != 1){
$insert = mysqli_query($connection,"insert into courses values('$username','$coursename')");
if($insert){

echo 'added!';


}
if(!$insert){

echo 'error';


}


}
else if($rows == 1){

$error = "course already exists!";

}
mysqli_close($connection);
echo'clicked!';


}
?>