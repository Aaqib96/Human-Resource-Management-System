<?php
	session_start();
	include 'includes/conn.php';

	if(!isset($_SESSION['admin']) || trim($_SESSION['admin']) == ''){
		// header('location: index.php');
		echo $_SESSION['admin'];
	}

	$sql = "SELECT * FROM user WHERE RecId = '".$_SESSION['admin']."'";
	$query = $conn->query($sql);
	$user = $query->fetch_assoc();
	
?>
