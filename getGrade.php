<!DOCTYPE html>
<html>
<head>
	<title>xx</title>


	<style>
	.gpa{
		text-align: center;
	}
	.form{
		align-content: center;
		margin:10px 10px;
	}
	input[type=text], select {
    width: 10%;
    padding: 12px 20px;
    margin: 8px 0;
    display: inline-block;
    border: 1px solid #ccc;
    border-radius: 4px;
    box-sizing: border-box;
}

input[type=submit] {
    width: 10%;
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    border-radius: 4px;
    cursor: pointer;
}

input[type=submit]:hover {
    background-color: #45a049;
}

		.split {
  height: 20%;
  width: 50%;
  position: fixed;
  z-index: 1;
  top: 0;
  overflow-x: hidden;
  padding-top: 20px;
}
.table1 {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
}

/* Control the left side */
.left {
  left: 0;.
  overflow-x: hidden;
  background-color: lightgreen;
}

/* Control the right side */
.right {
  right: 0;
  overflow-x: hidden;
  background-color: orange;

}
body{
	background-color: yellow;
}

.bottom{
	padding-top: 5%;
	background-color: yellow;
}

	</style>
</head>


<body>
<div class="split left">
	<div class="section" id="section">
<h1>  ADD MARKS</h1>


	<form action="" method="POST" class="form">
		<span>Student ID : </span><input type="text" name="id" required>
		<span>Advaned Web : </span><input type="text" name="sb1" required>
		<span>Software Eng : </span><input type="text" name="sb2" required>
		<span>Data Science : </span><input type="text" name="sb3" required>
		<input type="submit" name="submitclick2" value="Submit!">
	</form>
		<input type="button" name="move" value="Go Back" onClick="document.location.href='index.php'" >
		<!-- onClick="document.location.href='index.php'"  -->
</div>
</div>

<?php
include 'config.php';
echo "<script type='text/javascript'>alert('On TO it!');</script>";
if(isset($_POST['submitclick2'])){
	echo "<script type='text/javascript'>alert('On it!');</script>";
	
	$id=$_POST['id'];
	$sb1=$_POST['sb1'];
  	$sb2=$_POST['sb2'];
  	$sb3=$_POST['sb3'];
  
  	if ($_POST['sb1']=="A" || $_POST['sb2']=="A" || $_POST['sb3']=="A")
  		$val1 = "4";
  	if ($_POST['sb1']=="B" || $_POST['sb2']=="B" || $_POST['sb3']=="B")
  		$val2 = "3.3";
  	if ($_POST['sb1']=="C" || $_POST['sb2']=="C" || $_POST['sb3']=="C")
  		$val3 = "2.7";

  	$gpa = ($val1*"3"+$val2*"3"+$val3*"2")/"8";

	if(!$conn){
		die('Could not connect: '. mysql_error());
		echo "<script type='text/javascript'>alert('Could not connect');</script>";
	}
	//$sql = "SELECT MAX(studentID) FROM student";
	$sql = "INSERT INTO records (studentID,GPA,web,data,ai)
	VALUES ('$id', '$gpa', '$sb1', '$sb2', '$sb3')";

	if ($conn->query($sql) === TRUE) {
	    $last_id = $conn->insert_id;
	   // echo "New record created successfully. Last inserted ID is: " . $last_id;
	}
	else{
		    echo "Error: " . $sql . "<br>" . $conn->error;
	   // echo "<script type='text/javascript'>alert('SQL FAIL');</script>";
	}
}
?>

<script>
	function showStudents(str){
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("section").innerHTML=this.responseText;
		    }
		  }
		  xmlhttp.open("GET","getGrade.php?q="+str,true);
		  xmlhttp.send();

	}


	function check(event){

		 // alert(event.target.innerText); //current cell
   		// alert(event.target.parentNode.innerText); //Current row.
   		   if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("gpa").innerHTML=this.responseText;
		    }
		  }
		  xmlhttp.open("GET","getGpa.php?q="+event.target.innerText,true);
		  xmlhttp.send();
			};
	function showStudents(str) { 

			// alert("showStudents");
		  if (window.XMLHttpRequest) {
		    // code for IE7+, Firefox, Chrome, Opera, Safari
		    xmlhttp=new XMLHttpRequest();
		  } else { // code for IE6, IE5
		    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		  xmlhttp.onreadystatechange=function() {
		    if (this.readyState==4 && this.status==200) {
		      document.getElementById("table1").innerHTML=this.responseText;
		    }
		  }
		  xmlhttp.open("GET","getTable.php?q="+str,true);
		  xmlhttp.send();
	}
	
</script>
</body>
</html>