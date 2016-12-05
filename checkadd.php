<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
$error = '';
//include('session.php'); // Includes Login Script
//include('checkcreate.php');
//$error = '';
$coursename = $_GET['coursename'];
$username = $_SESSION['login_user'];
if(isset($_POST['submit1'])){
$connection = mysqli_connect("localhost:8889","root","root","ezgc");
//$query = mysqli_query($connection,"select * from gradedist where username = '$username' AND coursename = '$coursename' AND assign_type =");
//$rows = mysqli_num_rows($query);
$var1 = "assign_name";
$var2 = "assign_grade";
$var6 = "select";
$var3 = 1;
//$var2 = (string) $var3 + 1;
$var1 .= (string) $var3;
$var2 .= (string) $var3;
$var6 .= (string) $var3;
$coursename = str_replace(' ', '', $coursename);
while(!empty($_POST[$var1]) && !empty($_POST[$var2]) && isset($_POST[$var6])){
$query = mysqli_query($connection,"insert into assign_grades values ('$username','$coursename','$_POST[$var1]','$_POST[$var6]','$_POST[$var2]')");
if(!$query){
echo mysqli_error($connection);
//echo 'oops...something went wrong';
}
$var1 = "assign_name";
$var3 += 1;
$var1 .= (string) $var3;
$var2 = "assign_grade";
$var2.= (string) $var3;
$var6 = "select";
$var6 .= (string) $var3;
}
$query = mysqli_query($connection,"select assign_type from gradedist where username = '$username' AND coursename = '$coursename'");

$rows = mysqli_num_rows($query);
//echo "rows: ".$rows."<br/>";
$types = array();
$weights = array();
$grade_weights = array();
$i = 0;
while($row = mysqli_fetch_row($query))
{

    foreach($row as $cell){
    	
		$types[] = $cell;
		//echo "<br>".$types[$i]."<br>";
		$i += 1;
		}
}
$i = 0;
$query = mysqli_query($connection,"select assign_weight from gradedist where username = '$username' AND coursename = '$coursename'");
while($row = mysqli_fetch_row($query))
{

    foreach($row as $cell)
    	
		$weights[] = (int)$cell;
		//echo "<br>".$weights[$i]."<br>";
		$i += 1;
}
$i = 0;
while(!empty($types[$i])){
	$query = mysqli_query($connection,"select * from assign_grades where username = '$username' AND coursename = '$coursename' AND assign_type = '$types[$i]'");
	$rows = mysqli_num_rows($query);
	if($rows != 0){
	$grade_weights[$i] = ($weights[$i]/$rows)/100;
	//echo $grade_weights[$i]."<br>";
	}
	$i+=1;



}
$i = 0;
$numerator = 0;
$denominator = 0;
$current_grade = 0;
while(!empty($types[$i])){
	$query = mysqli_query($connection,"select grade from assign_grades where username = '$username' AND coursename = '$coursename' AND assign_type = '$types[$i]'");
	while($row = mysqli_fetch_row($query)){
    foreach($row as $cell){
    	
		$cell = trim($cell, "%");
		$cell = (int)$cell;
		$numerator += $cell * $grade_weights[$i];
		$denominator += $grade_weights[$i];
		}	
}
	
	$i += 1;
	
	
	
	
}
$current_grade = number_format($numerator/$denominator,2);
$query = mysqli_query($connection,"select * from grades where username = '$username' AND coursename = '$coursename'");
$rows = mysqli_num_rows($query);
if($rows > 0){
$query = mysqli_query($connection,"update grades set grade = '$current_grade'  where username = '$username' AND coursename = '$coursename'");
}
else{
//echo 'running here!';
$query = mysqli_query($connection,"insert into grades values('$username','$coursename','$current_grade')");


}















mysqli_close($connection);

echo "<br>";
echo 'clicked!';
//echo 'submit' + (string) $var1;



}
?>