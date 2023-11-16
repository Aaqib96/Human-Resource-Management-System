<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$title = $_POST['title'];
		
		$sql = "CALL `StrProc_InsertPayScaleInfo`('$title')";
        if($conn->query($sql)){
			$_SESSION['success'] = 'Payscale added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: payscale.php');

?>