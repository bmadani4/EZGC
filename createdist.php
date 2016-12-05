<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('session.php'); // Includes Login Script
include('checkcreate.php');
$coursename = $_GET['coursename'];
$username = $_SESSION['login_user'];
?>
<!DOCTYPE html>
<html>
<head>
<script type="text/javascript" src="jquery-3.1.1.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
    var counter = 2;
	var countBox =1;
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
<h1>Create Distribution for <?php echo $coursename ?></h1>
<div id="login" class="input_fields_wrap">
<h2>Please Fill in the Table Below</h2>
<form action="" method="post">
<table id = "TextBoxesGroup">
<tr>
<td style="padding:0 15px 0 15px;"><input id="assign_type" type="text" name="assign_type1" placeholder="Assignment Type" size = "50"/></td>
<td style="padding:0 15px 0 15px;"><input type="text" name="assign_weight1" placeholder="Weight" size = "50" /></td>
</tr>
</table>
<input name='submit1' type="submit" value=" Create ">
<input name='addButton' id = 'addButton' type="button" value=" Add row " >
<br></br>
<span><?php echo $error; ?></span>
<b id='home'><a href='index.php'>Home</a></b>
</form>
<br></br>
<br></br>
<br></br>

<form method="post" enctype="multipart/form-data">
    Select file to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload" name="upload">
</form>

</div>
</div>
</body>





</html>