<?php
	session_start();
	$host = 'localhost';
	$username = 'root';
	$password = 'password';
	$database = 'database';
	mysql_connect($host, $username, $password)
	   or die("<b>Database. Error!</b>");

	mysql_select_db($database);

	mysql_query('SET CHARACTER SET utf8');
	mysql_query("SET SESSION collation_connection ='utf8_general_ci'");
?>