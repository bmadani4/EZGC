<?php
ini_set('display_errors', 'On');
error_reporting(E_ALL);
include('session.php'); // Includes Login Script
include('checkadd.php');
$coursename = $_GET['coursename'];
$username = $_SESSION['login_user'];
$connection = mysqli_connect("localhost:8889","root","root","ezgc");
$query = mysqli_query($connection,"select assign_type from gradedist where username = '$username' AND coursename = '$coursename'");
$rows = mysqli_num_rows($query);
$types = array();
$i = 0;

while($row = mysqli_fetch_row($query))
{

    foreach($row as $cell)
    	
		$types[] = $cell;
		$i += 1;
}

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

	newTextBoxDiv.after().html( "<tr><td  style = 'padding:0 15px 0 15px;'><input id='assign_name' type='text' name='assign_name"+countBox.toString()+"' placeholder='Assignment Name'  /> <td style='padding:0 15px 0 15px;'><select name = 'select"+countBox.toString()+"' > <?php foreach($types as $result){ print "'<option value=$result>$result</option>'";} ?></select></td>  </td> <td><input type='text' name='assign_grade"+countBox.toString()+"' placeholder='Grade' /></td></tr> ");

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
<title>Add Grades</title>
<link href="style.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="main">
<h1>Add Grades to <?php echo $coursename ?></h1>
<div id="login" class="input_fields_wrap">
<h2>Please Fill in the Table Below</h2>
<form action="" method="post" >
<table id = "TextBoxesGroup" cellspacing="10">
<tr>
<td style="padding:0 15px 0 15px;"><input id="assign_name" type="text" name="assign_name1" placeholder="Assignment Name" /></td>
<td style="padding:0 15px 0 15px;"><select name = "select1" > <?php foreach($types as $result){ print "<option value=$result>$result</option>";} ?></select></td>
<td style="padding:0 15px 0 15px;"><input type="text" name="assign_grade1" placeholder="Grade" size = "50" /></td>
</tr>
</table>
<input name='submit1' type="submit" value=" Add ">
<input name='addButton' id = 'addButton' type="button" value=" Add row " >
<br></br>
<b id='home'><a href='index.php'>Home</a></b>
<br></br>
<b id='home'><a href='courseprofile.php?coursename=<?php echo $coursename ?>'>Back to <?php echo $coursename ?> </a></b>
</form>
</div>
</div>
</body>





</html>