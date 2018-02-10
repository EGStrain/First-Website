<?php

	require_once("header.php");

	$currentYear = date("Y");


	$connection = mysqli_connect("localhost","root","");
	mysqli_select_db($connection,"6nationsdb");
	$result = mysqli_query($connection,"SELECT results.rnd,results.date,results.HomeTeamID,J1.name AS homeTeamName,results.HomeTeamScore,results.AwayTeamScore,J2.name AS awayTeamName,results.AwayTeamID,results.venue FROM results INNER JOIN teams AS J1 ON results.HomeTeamID = J1.id INNER JOIN teams AS J2 ON results.AwayTeamID = J2.id WHERE year = $currentYear ORDER BY date ASC");

	print("<h1> $currentYear </h1>");
	print("<hr>");

	print("<table border = 1>");
	print("<tr><th>Round</th><th>Date</th><th></th><th>Home Team</th><th></th><th></th><th></th><th>Away Team</th><th></th><th>Venue</th></tr>");

	while($row = mysqli_fetch_array($result))
	{
		print("<tr><td>$row[rnd]</td><td>$row[date]</td><td><img src=images/$row[HomeTeamID].png width = 15 height = 15></td><td>$row[homeTeamName]</td><td>$row[HomeTeamScore]</td><td>-</td><td>$row[AwayTeamScore]</td><td>$row[awayTeamName]</td><td><img src=images/$row[AwayTeamID].png width = 15 height = 15></td><td>$row[venue]</td></tr>");
	}

	print("</table>");

	require_once("footer.php");
	?>