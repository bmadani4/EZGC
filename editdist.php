<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('session.php'); // Includes Login Script
include('checkedit.php');
$error = '';
$coursename = $_GET['coursename'];
$username = $_SESSION['login_user'];
$connection = mysqli_connect("localhost:8889","root","root","ezgc");
$query = mysqli_query($connection,"select assign_type from gradedist where username = '$username' AND coursename = '$coursename'");
$rows = mysqli_num_rows($query);
$rows;
mysqli_close($connection);
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var counter = 2;
	var countBox = <?php echo $rows ?>;
	var boxName = 0;
    $("#addButton").click(function () {
	countBox += 1;
	if(counter>10){
            alert("Only 10 textboxes allow");
            return false;
	}

	var newTextBoxDiv = $(document.createElement('div'))
	     .attr("id", 'TextBoxDiv' + counter);

	newTextBoxDiv.after().html( " <td style='padding:0 15px 0 15px;'><input id='assign_type' type='text' name='assign_type"+countBox.toString()+"' placeholder='Assignment Type' size = '80' /> </td> <td style='padding:0 15px 0 15px;'><input type='text' name='assign_weight"+countBox.toString()+"' placeholder='Weight' size = '60' /></td> ");

	newTextBoxDiv.appendTo("#TextBoxesGroup");


	counter++;
     });

     $("#removeButton").click(function () {
	if(counter==1){
          alert("No more textbox to remove");
          return false;
       }

	counter--;

        $("#TextBoxDiv" + counter).remove();

     });

     $("#getButtonValue").click(function () {

	var msg = '';
	for(i=1; i<counter; i++){
   	  msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
	}
    	  alert(msg);
     });
  });


</script>
<title>Create Distribution</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Edit Distribution for <?php echo $coursename ?></h1>
<div id="login" class="input_fields_wrap">
<h2>Please Fill in the Table Below</h2>
<form action="" method="post">
<!-- <label>UserName :</label>
<input id="name" name="username" placeholder="username" type="text">
<label>Password :</label>
<input id="password" name="password" placeholder="**********" type="password"> -->
<table id = "TextBoxesGroup">
<tr>
<?php
	$coursename = $_GET['coursename'];
	$username = $_SESSION['login_user'];
	$connection = mysqli_connect("localhost:8889","root","root","ezgc");
	$query = mysqli_query($connection,"select assign_type from gradedist where username = '$username' AND coursename = '$coursename'");
	$types = array();
	$weights = array();
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
	$query2 = mysqli_query($connection,"select gradedist.assign_weight from gradedist where username = 'bmadani4' AND coursename = 'COP4710'");
	while($row = mysqli_fetch_row($query2)){
    foreach($row as $cell){
    	
		$weights[] = $cell;
		$i += 1;
		}
}
	$i = 0;
	$r = 1;
	while(!empty($types[$i]) && !empty($weights[$i])){
	$a_type = 'assign_type'.$r;
	$a_weight = 'assign_weight'.$r;
	print "<tr>";
	print "<td style='padding:0 15px 0 15px;'>";
	print "<input id='assign_type' type='text' name='$a_type' placeholder='Assignment Type' size = '50' value = '$types[$i]'/>";
	print "<td style='padding:0 15px 0 15px;'><input type='text' name='$a_weight'.$i placeholder='Weight' size = '50' value = '$weights[$i]' /></td>";
	print "</tr>";
	
	$i+=1;
	$r +=1;
	
	}
?>
</tr>
</table>
<input name='submit1' type="submit" value=" Update ">
<input name='addButton' id = 'addButton' type="button" value=" Add row " >
<br></br>
<span><?php echo $error; ?></span>
<b id='home'><a href='index.php'>Home</a></b>
<br></br>
<b id='home'><a href='courseprofile.php?coursename=<?php echo $coursename ?>'>Back to <?php echo $coursename ?> </a></b>
</form>
<br></br>
<br></br>



<form method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="upload">
</form>


</div>
</div>
</body>





</html>