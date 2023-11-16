<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$title = $_POST['title'];
		// $rate = $_POST['rate'];

		// $sql = "INSERT INTO designation (designation_name ) VALUES ('$title')";
		$sql = "Call `StrProc_InsertDesignationInfo`('$title')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Position added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: position.php');

?>