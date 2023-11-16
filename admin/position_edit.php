<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$title = $_POST['title'];
		// $rate = $_POST['rate'];

		// $sql = "UPDATE designation SET designation_name = '$title' WHERE RecId = '$id'";
		$sql = "call `StrProc_ChangeDesignationInfo`('$id','$title')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Position updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:position.php');

?>