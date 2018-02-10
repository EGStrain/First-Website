<html>
<body>
	<?php 
		require_once("header.php");
		$connection = mysqli_connect("localhost","root","");
		mysqli_select_db($connection,"6nationsdb");
		$result = mysqli_query($connection,"SELECT * FROM teams");
	?>

	<h1>Teams</h1>
	<hr>

	<?php
		print("<table border="1">");
		while($row = mysqli_fetch_array($result))
		{
			print("<tr><td><img src=images/$row[id].png width=50 height=50></td><td>$row[name]</td></tr>");
		}
		print("</table>");

		require_once("footer.php");
	?>
</body>
</html>