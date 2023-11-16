<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$RecId = $_POST['RecId'];
		$Title = $_POST['Title'];
		$Holiday_Date = $_POST['Holiday_Date'];
		// $rate = $_POST['rate'];

		// $sql = "UPDATE designation SET designation_name = '$title' WHERE RecId = '$id'";
		$sql = "Call `StrProc_ChangeHolidayInfo`('$RecId','$Title','$Holiday_Date')";
		if($conn->query($sql)){
			$_SESSION['success'] = "HoliDay edit successfuly !";
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:holiday.php');

?>