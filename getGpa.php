<?php
include "config.php";
$q = intval($_GET['q']);

if (!$conn) {
    die('Could not connect: ' . mysqli_error($conn));
}

$sql = "SELECT stuName, stuContact FROM student WHERE studentID = '".$q."'";
$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_array($result);
$name = $row['stuName'];
$contact = $row['stuContact'];
echo "Student Name : " . $name . "<br>"; 
echo "Contact : 0" . $contact;

$sql2 = "SELECT GPA FROM records WHERE studentID = '".$q."'";
$result2 = mysqli_query($conn,$sql2);

$row2 = mysqli_fetch_array($result2);
$gpa = $row2['GPA'];
echo "<br>". "Student GPA : " . $gpa;


if ($gpa==""){
	echo "no GPA added!";
}
?>
