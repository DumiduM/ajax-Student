<?php 
	include 'config.php';
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

?>