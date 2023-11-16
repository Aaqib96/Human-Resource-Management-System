<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		//$sql = "SELECT * FROM payscale WHERE id = '$id'";
		$sql = "call `StrProc_SelectHolidayInfo`(0)";
        $query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>