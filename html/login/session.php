<?php
$db_path = $_SERVER['DOCUMENT_ROOT'] . "/board/02_file/DB_Commands.php";
require_once($db_path);
function start_session(){
	$secure = false; // https
	$httponly = true; // client에서 session cookie 수정 불가.
	
	
	//session이 cookie만 사용하도록 강제.
	if(ini_set('session.use_only_cookies',1) == false){
		header("Location: error.php?error_code=2");
		exit();
	}	
	
	$params = session_get_cookie_params();
	session_set_cookie_params($params["lifetime"],
		$params["path"],
		$params["domain"],
		$secure,
		$httponly
	);
	session_start();
	session_regenerate_id(true); //session fixation 대비.
}


//start_session 호출된 후에 사용되어야 한다.
function check_login () {
	return isset($_SESSION['login_status'], $_SESSION['ip'], $_SESSION['user_agent']) &&
	$_SESSION['ip'] == $_SERVER['REMOTE_ADDR'] &&
	$_SESSION['user_agent'] == $_SERVER['HTTP_USER_AGENT'] &&
	$_SESSION['login_status'] = true;
}

 // start_session 호출된 후에 사용되어야 한다
function try_to_login($id, $password) {
	echo "try to login <br>";
	if (check_user_account($id, $password)) {
		$_SESSION['ip'] = $_SERVER['REMOTE_ADDR'];
		$_SESSION['user_agent'] = $_SERVER['HTTP_USER_AGENT'];
		$_SESSION['id'] = $id;
		$_SESSION['password_hash'] = $password;
		$_SESSION['login_status'] = true;
		return true;
	} else {
		return false;
	}
}

function check_user_account($id, $password) {
	$mysql_conn = db_swoh_conn();
	$select_query = sprintf('SELECT password_hash FROM user_account WHERE user_id = "%s"',$id);
	echo "찾을 id:".$id."<br>";
	$stmt = mysqli_prepare($mysql_conn, $select_query);
	mysqli_stmt_execute($stmt);
	$result = mysqli_stmt_get_result($stmt);
	if (mysqli_num_rows($result) === 0) { // 등록되지 않은 아이디
		die("No Found Result");
		header('Location: error.php?error_code=1');
	} else {
		$row = mysqli_fetch_assoc($result);
		$hash = $row["password_hash"];
		return password_verify($password, $hash);
	}
	mysqli_free_result($result);
	mysqli_close($mysql_conn);	
}

function try_to_logout(){
	if(check_login()){
		$_SESSION['login_status'] = false;
	} else{
	}
}

function destroy_session(){
	$_SESSION = array();
	$params = session_get_cookie_params();
	setcookie(session_name(), '', 0,
		$params['path'], $params['domain'], $params['secure'], isset($params['httponly'])); 
	session_destroy();
}


?>