<?php
include 'config.php';
?>

<!DOCTYPE html>
<html>
<head>
<style>
.gpa{
  margin-left:20px;
}
body {
    margin: 0;
}

ul {
    list-style-type: none;
    margin: 0;
    padding-top: 10em;
    padding: 0;
    width: 15%;
    background-color: #f1f1f1;
    position: fixed;
    height: 100%;
    overflow: auto;
}

li a {
    display: block;
    color: #000;
    padding: 8px 16px;
    text-decoration: none;
}

li a.active {
    background-color: #4CAF50;
    color: white;
}

li a:hover:not(.active) {
    background-color: #555;
    color: white;
}
</style>
</head>
<body>

<div id="link">
<ul>
  <li><a class="active" href="#home" id="home" onclick="showHome()">Student</a></li>
  <li><a href="#marks" id= "marks" onclick="showGrades()">Marks</a></li>
  <li><a href="#details">Details</a></li>
  <li><a href="#about">About</a></li>
</ul>
</div>

<div id="content" style="margin-left:15%;padding:1px 16px;height:1000px;">

<div class="split left">
        <div class="section" id="section">
      <h1>  ADD STUDENTS</h1>


        <form action="addstu.php" method="POST" id="form" class="form">
          <span>Full Name : </span><input type="text" name="stuName" required>
          <span>Address : </span><input type="text" name="stuAddress" required>
          <span>Contact : </span><input type="text" name="stuContact" required>
          <!-- <input type="button" id="1sub" name="submitclick" value="Submit!" onclick="showStudents()"> -->
          <button id = "sub">Submit</button>
        </form>
          <!-- <input type="button" name="submitclick" value="Submit!" onclick="showGrades()"> -->
      </div>
      </div>
      <span id= "result"></span>
      <br><h2>
      <div class="split right" id="gpa" class="gpa">
        GPA Should come here!
      </div></h2>

      <br>
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
