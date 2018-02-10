<?php

	$connection = mysqli_connect("localhost","root","");
	mysqli_select_db($connection,"6nationsdb");
	$result = mysqli_query($connection,"SELECT * FROM users");

	$email = $_POST["email"];
	$password = $_POST["password"];

	while($row = mysqli_fetch_array($result))
	{
		if($row["email"] == $email && $row["password"] == $password)
		{
			$_COOKIE["email"]=$email;
			$_COOKIE["password"]=$password;
			setcookie("email",$email);
			setcookie("password",$password);
		}
	}

	if($password != $_COOKIE["password"] || $email != $_COOKIE["email"])
	{
		setcookie("email",null);
		setcookie("password",null);
	}


	if(isset($_COOKIE["email"]))
	{
		header("Location: admin.php");
	}
	else
	{
		header("Location: login.php");
	}

?>