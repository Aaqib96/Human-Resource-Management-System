<?php
	include 'includes/session.php';

	if(isset($_POST['edit'])){
		$RecId = $_POST['UpId'];
		$Employee_Id = $_POST['EmpID'];
		$firstname = $_POST['Fname'];
		$lastname = $_POST['Lname'];
		$CNIC = $_POST['CNIC'];
		$Gmail = $_POST['gmail'];
		$Designation_Id = $_POST['DesID'];
		$payscale_id = $_POST['PayId'];
		$shift_id = $_POST['ShiftID'];
		$gender = $_POST['Sex'];
		$address = $_POST['Home'];
		$contact = $_POST['Phone'];
		$salary = $_POST['Salary'];
		$workingDays = $_POST['workingDays'];
		
		// $sql = "UPDATE user_profile SET firstname = '$firstname', lastname = '$lastname', address = '$address', birthdate = '$birthdate', contact_info = '$contact', gender = '$gender', position_id = '$position', schedule_id = '$schedule' WHERE id = '$empid'";
		$sql = "call `StrProc_ChangeUserProfileInfo`('$RecId','$Designation_Id',
		'$Employee_Id',
		'$firstname',
		'$lastname',
		'$CNIC',
		'$Gmail',
		'$address',
		'$contact',
		'$gender',
		'$shift_id',
		'$payscale_id',
		'$salary',
		'$workingDays')";
		//$_SESSION['success'] = $sql;
		if($conn->query($sql)){
			$_SESSION['success'] = "Data Update Successfully";
		}
		else{
			$_SESSION['error'] = $conn->error;
		}

	}
	else{
		$_SESSION['error'] = 'Select employee to edit first';
	}

	header('location: employee.php');
?>