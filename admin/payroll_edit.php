<?php
	include 'includes/session.php';

	if(isset($_POST['M_Salary'])){
	    $RecId = $_POST['id'];
		$M_Deducted = $_POST['M_Deducted'];
		$M_Salary = $_POST['M_Salary'];
		$M_Advance = $_POST['M_Advance'];
		$Remarks = $_POST['remarks'];
		// $rate = $_POST['rate'];

		// $sql = "UPDATE designation SET designation_name = '$title' WHERE RecId = '$id'";
		$sql = "Call `StrProc_ChangePayRollInfo`('$RecId','$M_Deducted','$M_Salary','$M_Advance','$Remarks')";
		// var_dump($sql);
        if($conn->query($sql)){
			$_SESSION['success'] = 'Payroll updated successfully';
		}
		else{
			$_SESSION['error'] = $conn->error;
		}
	}
	else{
		$_SESSION['error'] = 'Fill up edit form first';
	}

	header('location:payroll_genereate.php');

?>