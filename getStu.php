<!DOCTYPE html>
<html>
<head>
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
</head>
<body>

<?php
include "config.php";
// $q = intval($_GET['q']);

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
mysqli_close($conn);
?>
</body>
</html>