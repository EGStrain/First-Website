<?php

	require_once("header.php");

	print("<h1>Statistics</h1>");
	print("<hr>");

	$connection = mysqli_connect("localhost","root","");
	mysqli_select_db($connection,"6nationsdb");

	//No. of Matches
	$result1 = mysqli_query($connection,"SELECT * FROM results");
	$noOfMatches=0;
	while ($row = mysqli_fetch_array($result1)) 
	{
		$noOfMatches+=1;
	}

	//Home Wins
	$result2 = mysqli_query($connection,"SELECT * FROM results WHERE HomeTeamScore > AwayTeamScore");
	$noOfHomeWins=0;
	while ($row = mysqli_fetch_array($result2)) 
	{
		$noOfHomeWins+=1;
	}

	//Away Wins
	$result3 = mysqli_query($connection,"SELECT * FROM results WHERE AwayTeamScore > HomeTeamScore");
	$noOfAwayWins=0;
	while ($row = mysqli_fetch_array($result3)) 
	{
		$noOfAwayWins+=1;
	}

	//Draws
	$result4 = mysqli_query($connection,"SELECT * FROM results WHERE AwayTeamScore = HomeTeamScore");
	$noOfDraws=0;
	while ($row = mysqli_fetch_array($result4)) 
	{
		$noOfDraws+=1;
	}

	//Tries Scored
	$result5 = mysqli_query($connection,"SELECT * FROM results");
	$triesScored=0;
	while ($row = mysqli_fetch_array($result5)) 
	{
		$triesScored+=$row["HomeTeamTries"];
		$triesScored+=$row["AwayTeamTries"];
	}

	//Average tries per match
	$averageTries = $triesScored/$noOfMatches;


	print("<table border = 1>");
	print("<tr><td>No. of Matches</td><td>$noOfMatches</td></tr>");
	print("<tr><td>Home Wins</th><td>$noOfHomeWins</td></tr>");
	print("<tr><td>Away Wins</th><td>$noOfAwayWins</td></tr>");
	print("<tr><td>Draws</th><td>$noOfDraws</td></tr>");
	print("<tr><td>Tries Scored</td><td>$triesScored</th></tr>");
	print("<tr><td>Average Tries Per Match</td><td>$averageTries</td></tr>");
	print("</table>");

	require_once("footer.php");

	print("</body>");
	print("</html>");
?>