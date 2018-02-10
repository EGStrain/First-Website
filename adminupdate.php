<?php
	
	//Identifying record
	$hometeamid = $_POST["hometeamid"];
	$awayteamid = $_POST["awayteamid"];
	$year = $_POST["year"];
	$month = $_POST["month"];
	$day = $_POST["day"];


	//update data
	$hometeamscore = $_POST["hometeamscore"];
	$awayteamscore = $_POST["awayteamscore"];

	$connection = mysqli_connect("localhost","root","");
	mysqli_select_db($connection,"6nationsdb");
	$result = mysqli_query($connection,"UPDATE results SET HomeTeamScore = $hometeamscore, AwayTeamScore = $awayteamscore WHERE HomeTeamID = $hometeamid AND AwayTeamID = $awayteamid AND year = $year AND month = $month AND day = $day");

	// print($hometeamid . "<br>");
	// print($awayteamid . "<br>");
	// print($date . "<br>");
	// print($hometeamscore . "<br>");
	// print($awayteamscore . "<br>");

	header("Location: admin.php");

?>