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
    width: 20%;
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
  background-color: lightblue;
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
<h1>  ADD STUDENTS</h1>


	<form action="" method="POST" class="form">
		<span>Full Name : </span><input type="text" name="stuName" required>
		<span>Address : </span><input type="text" name="stuAddress" required>
		<span>Contact : </span><input type="text" name="stuContact" required>
		<input type="submit" name="submitclick" value="Submit!" onclick="showStudents()">
	</form>
		<input type="button" name="submitclick" value="Submit!" onclick="showGrades()">
</div>
</div>

<?php
include 'config.php';

if(isset($_POST['submitclick'])){

	$stuName=$_POST['stuName'];
  	$stuAddress=$_POST['stuAddress'];
  	$stuContact=$_POST['stuContact'];
  


	if(!$conn){
		die('Could not connect: '. mysql_error());
		echo "<script type='text/javascript'>alert('Could not connect');</script>";
	}
	//$sql = "SELECT MAX(studentID) FROM student";
	$sql = "INSERT INTO student (stuName, stuAddress, stuContact)
	VALUES ('$stuName', '$stuAddress', '$stuContact')";

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
<br><h2>
<div class="split right" id="gpa" class="gpa">
	GPA Should come here!
</div></h2>

<br><br><br><br><br><br>
<div class="bottom">
<div class="table1" id="table1" onclick="check(event)"><?php 

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql="SELECT * FROM student";
$result = mysqli_query($conn,$sql);

echo "<table>
<tr>
<th>Student ID</th>
<th>Name</th>
<th>Address</th>
<th>Contact</th>
</tr>";
while($row = mysqli_fetch_array($result)) {
    echo "<tr>";
    echo "<td>" . $row['studentID'] . "</td>";
    echo "<td>" . $row['stuName'] . "</td>";
    echo "<td>" . $row['stuAddress'] . "</td>";
    echo "<td>" . $row['stuContact'] . "</td>";
    echo "</tr>";
}
echo "</table>";
?>
</div>
</div>
<style>
table {
    width: 100%;
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid black;
    padding: 5px;
}

th {text-align: left;}
</style>

<script>
	function showGrades(str){
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
		  xmlhttp.open("GET","getStu.php?q="+str,true);
		  xmlhttp.send();
	}
</script>
</body>
</html>