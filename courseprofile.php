<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
$error = '';
include('session.php');
$username = $_SESSION['login_user'];
$coursename = $_GET['coursename'];
if(isset($_POST['viewgrades'])){


header("location: viewgrades.php?coursename=".$coursename); // Redirecting To Other Page




}
if(isset($_POST['newdist'])){
$error = '';
header("location: createdist.php?coursename=".$coursename); // Redirecting To Other Page

}
if(isset($_POST['editdist'])){

header("location: editdist.php?coursename=".$coursename); // Redirecting To Other Page

}
if(isset($_POST['newgrade'])){
$connection = mysqli_connect("localhost:8889","root","root","ezgc");
$query = mysqli_query($connection,"select * from gradedist where username = '$username' AND coursename = '$coursename'");
$rows = mysqli_num_rows($query);
if($rows == 0){

$error = 'You must add a grade distribution for this couse in order to add grades...';

}
else{
header("location: addgrade.php?coursename=".$coursename); // Redirecting To Other Page
}
}

$connection = mysqli_connect("localhost:8889","root","root","ezgc");
$query = mysqli_query($connection,"select coursename from gradedist where username = '$username' and coursename = '$coursename'");
$rows = mysqli_num_rows($query);
print "<!DOCTYPE html>";
print "<html>";
print "<head>";
print "<title>$coursename</title>";
print "<link href='style.css' rel='stylesheet' type='text/css'>";
print "</head>";
print "<body>";
print "<div id='login'>";
print "<form action='' method='post'>";
print "<h1> $coursename </h1>";
/*while($row = mysqli_fetch_row($query))
{

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    foreach($row as $cell)
		print "<input name='submit' type='submit' value=$cell >";
		print "<br></br>";
}*/
print "<b id='home'><a href='index.php'>Home</a></b>";
print "<h3> Grade Distribution </h3>";
if($rows == 0){

print "<p> You havent created a distribution yet! </p>";
print "<input name='newdist' type='submit' value='create one now' >";
print "<br></br>";



}
else if($rows > 0){

print "<input name='editdist' type='submit' value='edit current dist' >";



}
print "<h4> Grade </h4>";
$query = mysqli_query($connection,"select grade from grades where username = '$username' AND coursename = '$coursename'");
$rows = mysqli_num_rows($query);
if ($rows == 0){
print "<p> No grades to show </p>";




}
else{
	$row = mysqli_fetch_row($query);
	print "<p> Current Grade : ".$row[0]."%"."<p>"; 



}
print "<input name='newgrade' type='submit' value='add grades' >";
print "<br></br>";
print "<input name='viewgrades' type='submit' value='view your grades' >";
print "<br></br>";
print "<span> $error </span>";
print "</form>";
print "</div>";
print "</body>";
print "</html>";
//mysqli_free_result($query);




?>
