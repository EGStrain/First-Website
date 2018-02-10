<html>
<body>
	<a href="thisYear.php">Home</a> |
	<a href="teams.php">Teams</a> |
	<a href="browse.php">Browse</a> |
	<a href="archive.php">Archive</a> |
	<a href="stats.php">Statistics</a> |
	<?php
		if(isset($_COOKIE["email"]) && isset($_COOKIE["password"]))
		{
			print("<a href=admin.php>Admin</a> |");
			print("<a href=logout.php>Logout</a>");
		}
		else
		{
			print("<a href=login.php>Login</a>");
		}
	?>
	<hr>
</body>
</html>