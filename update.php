<?php

	$conn = new mysqli('localhost', 'root', 'BarackObama420', 'loghorizon');

	if (!$conn){
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$userid= $_POST["userid"];
	$cpass= $_POST["cpass"];
	$npass= $_POST["npass"];
	$vpass= $_POST["vpass"];
	
	$sql = "SELECT * FROM users WHERE userid='$userid' AND password='$cpass'";
	$result = $conn->query($sql);
	$usql = "UPDATE users SET password='$npass' WHERE userid='$userid'";
	
	if($result->num_rows > 0) {
		
		while($row = $result->fetch_assoc()){
			
			if ($npass == $vpass) {
				
			$conn->query($usql);
			header("Refresh:0; url=Account.html");
			$message = "Password Updated";
			echo "<script type='text/javascript'>alert('$message');</script>";
			
			}
			else {
				header("Refresh:0; url=Account.html");
				$message2 = "Passwords do not match";
				echo "<script type='text/javascript'>alert('$message2');</script>";
			}
		}
	} else {
		
		header("Refresh:0; url=Account.html");
		$message3 = "Incorrect User ID or Password";
		echo "<script type='text/javascript'>alert('$message3');</script>";
		
	}
	
	$conn->close();
?>