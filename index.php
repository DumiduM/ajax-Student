<!DOCTYPE html>
<html>
<head>
	<title>xx</title>
</head>


<body>
<h1>ADD STUDENTS</h1>

<div class="stuID"><h2>Student ID will appeare here</h2></div>
<form action="" method="POST">
	<span>Full Name : </span><input type="text" name="stuName">
	<span>Address : </span><input type="text" name="stuAddress">
	<span>Contact : </span><input type="text" name="stuContact">
	<input type="submit" name="submitclick" value="Submit!" onclick="showStudents()">
</form>
<script type="text/javascript">showStudents(str)</script>
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
	    echo "New record created successfully. Last inserted ID is: " . $last_id;
	}
	else{
		    echo "Error: " . $sql . "<br>" . $conn->error;
	    echo "<script type='text/javascript'>alert('SQL FAIL');</script>";
	}
}
?>
<div class="table1" id="table1"><?php 

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
function showStudents(str) { 
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