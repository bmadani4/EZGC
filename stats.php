<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('session.php');
$coursename = $_GET['coursename'];
$assign_name = $_GET['assign_name'];
$assign_type = $_GET['assign_type'];
$username = $_SESSION['login_user'];
$connection = mysqli_connect("localhost:8889","root","root","ezgc");
$query6 = mysqli_query($connection,"create or replace view v3 as (select v4.username,assign_grades.assign_name,assign_grades.grade from v4,Assign_grades where Assign_grades.username = v4.username and assign_type = '$assign_type' and assign_name = '$assign_name');");
if($query6){
$num1 = 0;
$num2 = 10;
while($num2 != 110){
$query7 = mysqli_query($connection,"select count(*) from v3 where grade <= $num2 and grade > $num1");
if($query7){
$row = mysqli_fetch_row($query7);
print "<br></br>";
print $row[0]." users scored between ".$num1." and ".$num2;
}
else{

print '0'." users scored between ".$num1." and ".$num2;



}
$num1 = $num2;
$num2 += 10;

}
}








?>