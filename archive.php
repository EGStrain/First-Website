<html>
<body>

<?php

	require_once("header.php");

	$currentYear=date("Y");

	$connection = mysqli_connect("localhost","root","");
	mysqli_select_db($connection,"6nationsdb");
	$result = mysqli_query($connection,"SELECT * FROM teams");

	print("<form method=post action=archive.php>");

	print("Year: ");
	print("<select name=year>");
	print("<option value=all>all</option>");
	for($i=2000;$i<=$currentYear;$i++)
	{
	print("<option value=$i>$i</option>");
	}
	print("</select>");

	print(" Team: ");
	print("<select name=team>");
	print("<option value=all>all</option>");
	while($row = mysqli_fetch_array($result))
	{
	print("<option value=$row[id]>$row[name]</option>");
	}
	print("</select>");

	print("<input type=submit name=submit value=Find>");
	print("</form>");

	if(isset($_POST["submit"]))
	{

		if($_POST["year"] == "all" && $_POST["team"] =="all")
		{
			$result = mysqli_query($connection,"SELECT results.rnd,results.date,results.HomeTeamID,J1.name AS homeTeamName,results.HomeTeamScore,results.AwayTeamScore,J2.name AS awayTeamName,results.AwayTeamID,results.venue FROM results INNER JOIN teams AS J1 ON results.HomeTeamID = J1.id INNER JOIN teams AS J2 ON results.AwayTeamID = J2.id ORDER BY date ASC");
		}
		else if($_POST["year"] == "all" && $_POST["team"] != "all")
		{
			$result = mysqli_query($connection,"SELECT results.rnd,results.date,results.HomeTeamID,J1.name AS homeTeamName,results.HomeTeamScore,results.AwayTeamScore,J2.name AS awayTeamName,results.AwayTeamID,results.venue FROM results INNER JOIN teams AS J1 ON results.HomeTeamID = J1.id INNER JOIN teams AS J2 ON results.AwayTeamID = J2.id WHERE J1.id = $_POST[team] ORDER BY date ASC");
		}
		else if($_POST["year"] != "all" && $_POST["team"] == "all")
		{
			$result = mysqli_query($connection,"SELECT results.rnd,results.date,results.HomeTeamID,J1.name AS homeTeamName,results.HomeTeamScore,results.AwayTeamScore,J2.name AS awayTeamName,results.AwayTeamID,results.venue FROM results INNER JOIN teams AS J1 ON results.HomeTeamID = J1.id INNER JOIN teams AS J2 ON results.AwayTeamID = J2.id WHERE year = $_POST[year] ORDER BY date ASC");
		}
		else
		{
			$result = mysqli_query($connection,"SELECT results.rnd,results.date,results.HomeTeamID,J1.name AS homeTeamName,results.HomeTeamScore,results.AwayTeamScore,J2.name AS awayTeamName,results.AwayTeamID,results.venue FROM results INNER JOIN teams AS J1 ON results.HomeTeamID = J1.id INNER JOIN teams AS J2 ON results.AwayTeamID = J2.id WHERE year = $_POST[year] AND J1.id = $_POST[team] ORDER BY date ASC");
		}


	print("<table border = 1>");
	print("<tr><th>Round</th><th>Date</th><th></th><th>Home Team</th><th></th><th></th><th></th><th>Away Team</th><th></th><th>Venue</th></tr>");
	while($row = mysqli_fetch_array($result))
	{
		print("<tr><td>$row[rnd]</td><td>$row[date]</td><td><img src=images/$row[HomeTeamID].png width = 15 height = 15></td><td>$row[homeTeamName]</td><td>$row[HomeTeamScore]</td><td>-</td><td>$row[AwayTeamScore]</td><td>$row[awayTeamName]</td><td><img src=images/$row[AwayTeamID].png width = 15 height = 15></td><td>$row[venue]</td></tr>");
	}
	print("</table>");

	require_once("footer.php");

	}
	else
	{
		require_once("footer.php");
	}

?>
</body>
</html>