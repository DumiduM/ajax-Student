<!DOCTYPE html>
<html>
<head>
	<title>Studext AJAX</title>


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


	<form action="addstu.php" method="POST" id="form" class="form">
		<span>Full Name : </span><input type="text" name="stuName" required>
		<span>Address : </span><input type="text" name="stuAddress" required>
		<span>Contact : </span><input type="text" name="stuContact" required>
		<input type="button" id="1sub" name="submitclick" value="Submit!" onclick="showStudents()">
		<button id = "sub">next</button>
	</form>
		<input type="button" name="submitclick" value="Submit!" onclick="showGrades()">
</div>
</div>
<span id= "result"></span>

<?php
include 'config.php';

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

<script src="script/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="script/script.js" type="text/javascript"></script>
</body>
</html>