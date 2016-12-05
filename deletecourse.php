<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('courselistcheck.php');
include('session.php');
$username = $_SESSION['login_user'];
$connection = mysqli_connect("localhost:8889","root","root","ezgc");
$query = mysqli_query($connection,"select coursename from courses where username = '$username'");
print "<!DOCTYPE html>";
print "<html>";
print "<head>";
print "<title>Your Current Courses</title>";
print "<link href='style.css' rel='stylesheet' type='text/css'>";
print "</head>";
print "<body>";
print "<div id='login'>";
print "<h1> Select which course to delete: </h1>";
print "<form action='' method='post'>";
while($row = mysqli_fetch_row($query))
{

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    //print "<input name = 'submit' type = 'submit' value = 'Button' >";
    foreach($row as $cell)
    	
		print "<input id ='s1' name='submit' type='submit' value=$cell  >";
		print "<br></br>";
}
print "<b id='home'><a href='index.php'>Home</a></b>";
print "</form>";
print "</div>";
print "</body>";
print "</html>";
mysqli_free_result($query);


?>