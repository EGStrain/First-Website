<?php

	require_once("header.php");

	print("<html>");
	print("<body>");
	print("<h1>Login</h1>");
	print("<hr>");
	print("<form method=post action=login2.php>");
	print("Email:");
	print("<input name=email type=text>");
	print("<br>");
	print("<br>");
	print("Password: ");
	print("<input name=password type=text>");
	print("<br>");
	print("<input name=submit type=submit value=Login>");


	require_once("footer.php");
?>