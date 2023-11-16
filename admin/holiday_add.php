<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$Title = $_POST['Title'];
		$Holiday_Date = $_POST['Holiday_Date'];
		// $sql = "INSERT INTO schedules (time_in, time_out) VALUES ('$time_in', '$time_out')";
        $sql = "call `StrProc_InsertHolidayInfo`('$Title','$Holiday_Date')";  
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

	header('location: holiday.php');

?>