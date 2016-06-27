<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

<body>
<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){
	$name = $_POST["name"];
	$title = $_POST["title"];
	$content = $_POST["content"];
	$board_id = $_POST["board_id"];
}
insertDB($name, $title, $content,$board_id);



function insertDB($name, $title, $content, $board_id){
	$connInfo = $_SERVER['DOCUMENT_ROOT'] . "/../" . "includes/" . "mylib.php";
	require_once($connInfo);
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'SWOH';
	$password = 'password';
	$dbname = 'SWOH';
	$mysql_conn = get_mysql_connection($hostname,$username,$password,$dbname);

	// 단어목록 파일을 DB 에 넣어보자
	
	echo "name: " . $name . "<br>"; 
	echo "title: " . $title . "<br>";
	echo "content: " . $content . "<br>";
	echo "board_id: " . $board_id . "<br>";
	
	$insert_query = 'INSERT INTO post (name, title, content, board_id) VALUES ("'.$name.'",
					"'.$title.'","'.$content.'","'.$board_id.'")' ;

	if(mysqli_query ($mysql_conn, $insert_query) === false){
		echo mysqli_error($mysql_conn);
	}else{
			echo 'DB INSERT: '. $name.' '.$title. ' '.'<br>';
			echo 'DB INSERT 성공<br>';
	}

	mysqli_close($mysql_conn);
}
	
?>
</body>
<a href = "index.php?board_id=<?php echo $board_id?>"> 게시판으로 돌아가기! </a><br>
<a href = "../../index.html"> 메인 홈로 돌아가기! </a> 
</html>
