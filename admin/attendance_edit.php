<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
	    $EmpId = $_POST['EmpId'];
		$check_in = $_POST['check_in'];
		$check_out = $_POST['check_out'];
		// $Remarks = $_POST['remarks'];
		// $rate = $_POST['rate'];

		// $sql = "UPDATE designation SET designation_name = '$title' WHERE RecId = '$id'";
		$sql = "Call `StrProc_ChangeAttendanceInfo`('$EmpId','$check_in','$check_out')";
		// var_dump($sql);
        if($conn->query($sql)){
			$_SESSION['success']; 
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:attendance.php');

?>