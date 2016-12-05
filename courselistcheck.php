<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
if(isset($_POST['submit'])){
$coursename = $_POST['submit'];
header("location: courseprofile.php?coursename=".$coursename); // Redirecting To Other Page
}
?>