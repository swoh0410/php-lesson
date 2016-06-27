<?php
// DB connection 데이터 받아서 알맞은 connection return. 
	function get_mysql_connection($hostname, $username, $password, $dbname){
		$hostname = $hostname;
		$username = $username;
		$password = $password;
		$dbname = $dbname;
		$mysql_conn = mysqli_connect($hostname, $username, $password, $dbname); 
		mysqli_query($mysql_conn,"SET NAMES 'utf8'");  //utf8로 인코딩해서 출력.		
		return $mysql_conn;
	}
?>