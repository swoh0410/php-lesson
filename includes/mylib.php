<?php

	function get_mysql_connection($hostname, $username, $password, $dbname){
		$hostname = $hostname;
		$username = $username;
		$password = $password;
		$dbname = $dbname;
		$mysql_conn = mysqli_connect($hostname, $username, $password, $dbname);
		return $mysql_conn;
	}
?>