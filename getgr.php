
<?php
include 'config.php';
// echo "<script type='text/javascript'>alert('On TO it!');</script>";

	// echo "<script type='text/javascript'>alert('On it!');</script>";
	
	$id=$_POST['id'];
	$sb1=$_POST['sb1'];
  	$sb2=$_POST['sb2'];
  	$sb3=$_POST['sb3'];

  	$val1="0";
  	$val2="0";
  	$val3="0";
  
  	if ($_POST['sb1']=="A" || $_POST['sb2']=="A" || $_POST['sb3']=="A"){
  		$val1 = "4";
  	}
  	if ($_POST['sb1']=="B" || $_POST['sb2']=="B" || $_POST['sb3']=="B"){
  		$val2 = "3";
  	}
  	if ($_POST['sb1']=="C" || $_POST['sb2']=="C" || $_POST['sb3']=="C"){
  		$val3 = "2";
  	}

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

?>