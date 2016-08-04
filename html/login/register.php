<?php

require_once('session.php');
$connInfo = $_SERVER['DOCUMENT_ROOT'] . "/../" . "includes/" . "mylib.php";
require_once($connInfo);
if(isset($_POST['id'],  $_POST['password'])){
	$id = $_POST['id'];
	$password =  $_POST['password'];
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'SWOH';
	$dbname = 'SWOH';
	$mysql_conn = get_mysql_connection($hostname,$username,$password,$dbname);
	$stmt = mysqli_prepare($mysql_conn, "SELECT pasword_hash FROM user_account WHERE id = ?");
	mysqli_stmt_bind_param($stmt, "s", $id);
	$result = mysqli_stmt_execute($stmt);
	
	if(mysqli_num_rows($result) != 0){
		header('Location: error.php?error_code = 4');
	} else{
		$stmt = mysqli_prepare($mysql_conn, "INSERT INTO SWOH.user_account (user_id, password_hash) 
			VALUES (?,?)");
		$hash = password_hash($password, PASSWORD_DEFAULT);
	
		mysqli_stmt_bind_param($stmt, "ss", $id, $hash);
		mysqli_stmt_execute($stmt);
		header('Location: ../index.php');
	}
	mysqli_free_result($result);
	mysqli_close($mysql_conn);	
}else{
	echo '회원가입 폼 에러.';
}



?>