<?php
	include 'includes/session.php';

	if(isset($_POST['add'])){
		$Employee_Id = trim($_POST['EmpID']);
		$firstname = trim($_POST['Fname']);
		$lastname = trim($_POST['Lname']);
		$gender = trim($_POST['Sex']);
		$CNIC = trim($_POST['CNIC']);
		$Gmail = trim($_POST['Gmail']);
		$contact = trim($_POST['Phone']);
		$address = trim($_POST['Home']);
		$Designation_Id = trim($_POST['DesID']);
		$payscale_id = trim($_POST['PayId']);
		$shift_id = trim($_POST['ShiftID']);
		$workingDays = trim($_POST['workingDays']);
		$salary = trim($_POST['Salary']);
		// $Advance = $_POST['Advance'];
		// $workingDays = $_POST['workingDays'];
		if ("" === $Employee_Id || "" === $firstname ||  "" === $gender) {
			$_SESSION['error'] = 'Fill up the add form first';
		}else {
			$sql = "call `STP_InsertUserProfileInfo`('$Employee_Id',
			'$firstname',
			'$lastname',
			'$gender',
			'$CNIC',
			'$Gmail',
			'$contact',
			'$address',
			'$Designation_Id',
			'$payscale_id',
			'$shift_id',
			'$workingDays',
			'$salary')";
			//$_SESSION['success'] = $sql;
			
			if($conn->query($sql)){
				$_SESSION['success'] = "Employee Add Successfully";
			}
			else{
				$_SESSION['error'] = $conn->error;
			}
		}
		

	}
	else{
		$_SESSION['error'] = 'Fill up the add form first';
	}

	header('location: employee.php');
?>