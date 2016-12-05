<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('session.php');
$coursename = $_GET['coursename'];
$username = $_SESSION['login_user'];
$connection = mysqli_connect("localhost:8889","root","root","ezgc");
$query = mysqli_query($connection,"select assign_name,assign_type,grade from assign_grades where username = '$username' and coursename = '$coursename'");
$query5 = mysqli_query($connection,"create or replace view v4 as (select Courses.username from Courses where coursename = '$coursename')");
//$query6 = mysqli_query($connection,"create or replace view v3 as (select v4.username,assign_grades.assign_name,assign_grades.grade from v4,Assign_grades where Assign_grades.username = v4.username and assign_type = "Tests" and assign_name = "Test1");");
if(!$query5){
print "oops...";
}
$rows = mysqli_num_rows($query);

//echo $_GET['coursename'];
print"<!DOCTYPE html>";
print"<html>";
print"<head>";
print"<style>";
print"table, th, td { border: 1px solid black; border-collapse: collapse; }";
print"</style>";
print"</head>";
print"<body>";
print"<table style='width:100%'>";
print"<tr>";
print"  <th>Assignment Name</th>";
print"    <th>Assignment Type</th> ";
print"   <th>Assingment Grade</th>";
print"   <th>Assingment Average</th>";
print"  </tr>";
print" <tr>";
if($rows > 0){
while($row = mysqli_fetch_row($query))
{

    // $row is array... foreach( .. ) puts every element
    // of $row to $cell variable
    //print "<input name = 'submit' type = 'submit' value = 'Button' >";
    print"<tr>";
    $i = 0;
    foreach($row as $cell){
    	$i+=1;
    	if ($i == 1){
    	$assign_name = $cell;
    	print"<td>$cell</td>";
    	
    	}
    	if ($i == 2){
    	$assign_type = $cell;
    	print"<td>$cell</td>";
    	}
    	if ($i == 3){
    	print"<td>$cell</td>";
    	}
    	if($i == 4){
    	print "tryingggg";
    	//$query6 = mysqli_query($connection,"create or replace view v3 as (select v4.username,assign_grades.assign_name,assign_grades.grade from v4,Assign_grades where Assign_grades.username = v4.username and assign_type = '$assign_type' and assign_name = '$assign_name');");
		//if($query6){
		//$query7 = mysqli_query($connection,"select count(*) from v3")
		//if($query7){
		//$row = mysqli_fetch_row($query7);
		//print"<td>$row[0]</td>";		
		//}
    	//}
    	//$i = 0;
    	
    	}
    	}
    	if(!empty($assign_name) && !empty($assign_type)){
    	$query6 = mysqli_query($connection,"create or replace view v3 as (select v4.username,assign_grades.assign_name,assign_grades.grade from v4,Assign_grades where Assign_grades.username = v4.username and assign_type = '$assign_type' and assign_name = '$assign_name');");
		if($query6){
		$query7 = mysqli_query($connection,"select round(sum(grade)/(select count(*) from v3),2) from v3");
		if($query7){
		$row = mysqli_fetch_row($query7);
		print"<td><b id='viewstats'><a href='stats.php?coursename=$coursename&assign_name=$assign_name&assign_type=$assign_type'>$row[0]</a></b></td>";		
		}
    	}
    	//$i = 0;
    	}
		//print "<input id ='s1' name='submit' type='submit' value=$cell  >";
		//print "<br></br>";
}
print "</tr>";
}
print"</table>";
print"</body>";
print"</html>";





?>