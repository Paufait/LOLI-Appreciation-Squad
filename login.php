<?php
	
	$conn = new mysqli('localhost', 'root', 'BarackObama420', 'loghorizon');

	if (!$conn){
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$username= $_POST["username"];
	$password= $_POST["password"];
	
	$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
	
	$result = $conn->query($sql);
	
	if($result->num_rows > 0) {
		
		while($row = $result->fetch_assoc()){
			
			header("Refresh:0; url=Account.html");
		}
		
	} else {
		
		header("Refresh:0; url=index.html");
		$message = "Incorrect Username or Password";
		echo "<script type='text/javascript'>alert('$message');</script>";
		
	}
	
	$conn->close();
?>