<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$id = $_POST['id'];
		$edit_shift_name = $_POST['edit_shift_name'];
		$edit_time_in = $_POST['edit_time_in'];
		$edit_time_in = date('H:i:s', strtotime($edit_time_in));
		$edit_time_out = $_POST['edit_time_out'];
		$edit_time_out = date('H:i:s', strtotime($edit_time_out));
		$edit_grace_time = $_POST['edit_grace_time'];

		// $sql = "UPDATE schedules SET time_in = '$time_in', time_out = '$time_out' WHERE id = '$id'";
		$sql = "Call `StrProc_ChangeShiftInfo`('$id','$edit_shift_name','$edit_time_in','$edit_time_out','$edit_grace_time')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:schedule.php');

?>