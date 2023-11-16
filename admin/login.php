<?php
	session_start();
	include 'includes/conn.php';

	if(isset($_POST['login'])){
		$username = $_POST['username'];
		$password = $_POST['password'];

		 $sql = "SELECT * FROM user WHERE username = '$username'";
		//$sql = "call 'StrProc_getUserLoginInfo'('".$_POST["username"]."','".$_POST["password"]."')";
		$query = $conn->query($sql);

		if($query->num_rows < 1){
			$_SESSION['error'] = 'Cannot find account with the username';
		}
		else{
			$row = $query->fetch_assoc();
			if(($password == $row["password"])){
				$_SESSION['admin'] = $row['RecId'];
			}
			else{
				header('location: home.php');
				$_SESSION['error'] = 'Incorrect password';
			}
		}
		
	}
	else{
		$_SESSION['error'] = 'Input user credentials first';
	}

	header('location: index.php');

?>