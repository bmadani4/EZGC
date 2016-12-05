<?php
ini_set('display_errors', 'off');
error_reporting(E_ALL);
include("TesseractOCR.php");
include('doc_convert.php'); // Includes Login Script
require("textfilereader.class.php");
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
$var1 = "assign_type";
$var2 = "assign_weight";
$var3 = 1;
//$var2 = (string) $var3 + 1;
$var1 .= (string) $var3;
$var2.= (string) $var3;
while(!empty($_POST[$var1]) && !empty($_POST[$var2])){
$assign_type = mysqli_real_escape_string($connection,$_POST[$var1]);


$query = mysqli_query($connection,"select * from gradedist where username = '$username' AND coursename = '$coursename' AND assign_type = '$_POST[$var1]'");
$rows = mysqli_num_rows($query);
if($rows > 0){
echo 'wrong';
$error = "Duplicate distributions not allowed!";
break;

}
else{
$coursename = str_replace(' ', '', $coursename);
$query = mysqli_query($connection,"insert into gradedist values ('$username','$coursename','$_POST[$var1]','$_POST[$var2]')");
if(!$query){
echo 'oops...something went wrong';

}
}
$var1 = "assign_type";
$var3 += 1;
$var1 .= (string) $var3;
$var2 = "assign_weight";
$var2.= (string) $var3;
}



mysqli_close($connection);


//echo 'submit' + (string) $var1;



}
else if(isset($_POST['upload'])){

if (!empty($_FILES['fileToUpload']['name'])) {
    $target_dir = "uploads/";
	$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
	$uploadOk = 1;
	$FileType = pathinfo($target_file,PATHINFO_EXTENSION);
	echo 'FileType is: '.$FileType;
	echo '<br></br>';
	echo $target_file;
	echo '<br></br>';
	if (!file_exists($target_file)) {
    //echo "Sorry, file already exists.";
    //$uploadOk = 0;

	 if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
        if($FileType == 'docx'){
			$docObj = new DocxConversion("$target_file");
			echo '<br></br>';
			echo '<br></br>';
			echo '<br></br>';
			echo '<br></br>';
			echo '<br></br>';
			echo $docText= $docObj->convertToText();
		}
		else if($FileType == 'txt'){
	
	$sf = new TextFileReader("$target_file");
        $sf->seekLine(1);   // Go to line 1
	while (($val = $sf->readLine())!=NULL)
            echo $val."<br/>";
         
        echo "Total number of lines: ".$sf->countLines();
	
	
	
	
		}
		else if($FileType == "jpeg" || $FileType == "png" || $FileType == "jpg" || $FileType == "pdf"){
		echo 'picture found'."<br/>";
		$string = (new TesseractOCR('$target_file'))->run();
		echo $string."<br/>";
		
	
		}
		else{
		
		echo "picture not found";
		
		
		}
    } 
    	else {
        echo "Sorry, there was an error uploading your file.";
    	}
    }
    else if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;

	if($FileType == 'docx'){
	$docObj = new DocxConversion("$target_file");
	echo '<br></br>';
	echo '<br></br>';
	echo '<br></br>';
	echo '<br></br>';
	echo $docText= $docObj->convertToText();
	}
	else if($FileType == 'txt'){
	
	$sf = new TextFileReader("$target_file");
        $sf->seekLine(1);   // Go to line 1
	while (($val = $sf->readLine())!=NULL)
            echo $val."<br/>";
         
        echo "Total number of lines: ".$sf->countLines();
	
	}
	else if($FileType == "jpeg" || $FileType == "png" || $FileType == "jpg" || $FileType == "pdf"){
		echo 'picture found'."<br/>";
		exec("imagetotext.php");
		$string = (new TesseractOCR('syl1.png'))->run();
		echo $string."<br/>";
		
	
	}
	else{
	
	echo "nothing found";
	
	
	}
}	
	
	
	
	
	
	
}














}
?>