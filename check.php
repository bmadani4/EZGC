<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
$error = '';
if(isset($_POST['submit'])){
if (empty($_POST['username']) || empty($_POST['password']) || empty($_POST['re-password']) || empty($_POST['school']) || empty($_POST['level']) || empty($_POST['age'])) {
$error = "Missing Fields";
}
else{
if($_POST['password'] != $_POST['re-password']){
$error = "Passwords do not match.";
}
else{
$username = $_POST['username'];
$password = $_POST['password'];
$school = $_POST['school'];
$level = $_POST['level'];
$age = $_POST['age'];
$connection = mysqli_connect("localhost:8889","root","root","ezgc");
$query = mysqli_query($connection,"select * from users where username = '$username'");
$rows = mysqli_num_rows($query);
if ($rows == 1) {

$error = "Username already exists.";


}
else{

$insert = mysqli_query($connection,"insert into users values('$username','$password','$school','$level','$age')");
if($insert){header("location: index.php");}
else if(!$insert){echo 'error! no!';}

}
mysqli_close($connection);


}

}








}
?>