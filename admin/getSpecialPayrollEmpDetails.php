<?php 
	include 'includes/session.php';

	if(isset($_POST['id'])){
		$id = $_POST['id'];
		$sql = "call `Sp_GetSpecialPayrollValues`('$id')";
        $query = $conn->query($sql);
		$row = $query->fetch_assoc();

		echo json_encode($row);
	}
?>