<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$shift_name = $_POST['shift_name'];
		$time_in = $_POST['time_in'];
		$time_in = date('H:i:s', strtotime($time_in));
		$time_out = $_POST['time_out'];
		$time_out = date('H:i:s', strtotime($time_out));
		$grace_time = $_POST['grace_time'];

		// $sql = "INSERT INTO schedules (time_in, time_out) VALUES ('$time_in', '$time_out')";
		$sql = "CALL `StrProc_InsertShiftInfo`('$shift_name','$time_in','$time_out','$grace_time')";
		if($conn->query($sql)){
			$_SESSION['success'] = 'Schedule added successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}	
	else{
		$_SESSION['error'] = 'Fill up add form first';
	}

	header('location: schedule.php');

?>