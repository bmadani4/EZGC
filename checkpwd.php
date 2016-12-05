<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
$error = '';
//$username = $_SESSION['login_user'];
if(isset($_POST['submit'])){
$username = $_SESSION['login_user'];
echo $username;
if(!empty($_POST['password'])){
$password = $_POST['password'];
$connection = mysqli_connect("localhost:8889","root","root","ezgc");
$query = mysqli_query($connection,"update Users set password = '$password' where username = '$username'");
$query2 = mysqli_query($connection,"select password from Users where username = '$username'");
$rows = mysqli_num_rows($query2);
if($rows == 1){
$row = mysqli_fetch_row($query2);
if($row[0] == $password){

echo 'password changed!';

}
else{

echo 'could not change password:(';

}


}
}





}












?>