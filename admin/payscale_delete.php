<?php
	include 'includes/session.php';

	if(isset($_POST['delete'])){
		$id = $_POST['id'];
		
		// $sql = "DELETE FROM pay_scale WHERE RecId = '$id'";
		$sql = "call `StrProc_UpdatePayScaleInfo`('$id')"; 
		if($conn->query($sql)){
			$_SESSION['success'] = 'Payscale deleted successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Select item to delete first';
	}

	header('location: payscale.php');
	
?>