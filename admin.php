<?php
	
	if(isset($_COOKIE["email"]))
	{
	require_once("header.php");

	print("<h1>Admin</h1>");
	print("<hr>");

	$currentYear = date("Y");

	$connection = mysqli_connect("localhost","root","");
	mysqli_select_db($connection,"6nationsdb");
	$result = mysqli_query($connection,"SELECT results.rnd,results.date,results.year,results.month,results.day,results.HomeTeamID,J1.name AS homeTeamName,results.HomeTeamScore,results.AwayTeamScore,J2.name AS awayTeamName,results.AwayTeamID,results.venue FROM results INNER JOIN teams AS J1 ON results.HomeTeamID = J1.id INNER JOIN teams AS J2 ON results.AwayTeamID = J2.id WHERE year = $currentYear ORDER BY date ASC");

	print("<table border = 1>");
	print("<tr><th>Round</th><th>Date</th><th></th><th>Home Team</th><th></th><th></th><th></th><th>Away Team</th><th></th><th>Venue</th><th></th></tr>");
	while($row = mysqli_fetch_array($result))
	{
		print("<tr><td><form method=post action=adminupdate.php> $row[rnd]</td><td>$row[date]</td><td><img src=images/$row[HomeTeamID].png width = 15 height = 15></td><td>$row[homeTeamName]</td><td><input type=text name=hometeamscore value=$row[HomeTeamScore]></td><td>-</td><td><input type=text name=awayteamscore value=$row[AwayTeamScore]></td><td>$row[awayTeamName]</td><td><img src=images/$row[AwayTeamID].png width = 15 height = 15></td><td>$row[venue]</td><td><input type=submit name=submit value=Update> <input type=hidden name=hometeamid value=$row[HomeTeamID]> <input type=hidden name=awayteamid value=$row[AwayTeamID]> <input type=hidden name=year value=$row[year]> <input type=hidden name=month value=$row[month]> <input type=hidden name=day value=$row[day]> </form></td></tr>");
	}
	print("</table>");

	require_once("footer.php");
	}
	else
	{
		header("Location: login.php");
	}

?>