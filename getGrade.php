<?php
include 'config.php';
?>

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

.table1 {
    border-radius: 5px;
    background-color: #f2f2f2;
    padding: 20px;
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



	<form action="getgr.php" method="POST" id="form2" class="form2">
		<span>Student ID : </span><input type="text" name="id" required>
		<span>Advaned Web : </span><input type="text" name="sb1" required>
		<span>Software Eng : </span><input type="text" name="sb2" required>
		<span>Data Science : </span><input type="text" name="sb3" required>
		<!-- <input type="submit" name="submitclick2" value="Submit!"> -->
		<button id="subgr">Submit it</button>
	</form>
	      <div class="bottom">
      <div class="table1" id="table1" onclick="check(event)"><?php 

      if (!$conn) {
          die('Could not connect: ' . mysqli_error($conn));
      }

      $sql="SELECT * FROM records";
      $result = mysqli_query($conn,$sql);

      echo "<table>
      <tr>
      <th>Student ID</th>
      <th>GPA</th>
      <th>Data Science</th>
      <th>AI</th>
      <th>Web</th>
      </tr>";
      while($row = mysqli_fetch_array($result)) {
          echo "<tr>";
          echo "<td>" . $row['studentID'] . "</td>";
          echo "<td>" . $row['GPA'] . "</td>";
          echo "<td>" . $row['data'] . "</td>";
          echo "<td>" . $row['ai'] . "</td>";
       	  echo "<td>" . $row['web'] . "</td>";
          echo "</tr>";
      }
      echo "</table>";
      ?>
      </div>
      </div>

		<div id="results">	
		</div>
</div>
</div>
<script src="script/jquery-1.9.1.min.js" type="text/javascript"></script>
<script src="script/script.js" type="text/javascript"></script>

</body>
</html>