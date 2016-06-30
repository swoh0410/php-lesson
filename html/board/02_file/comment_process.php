<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>

<body>
<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){
	$post_id = $_POST['post_id'];
	$board_id = $_POST['board_id'];
	echo "BOARD ID: ". $board_id;
	$comment = $_POST['comment'];
	$commenter = $_POST['commenter'];
	$cols ['post_id'] = $post_id;
	$cols ['comment'] = $comment;
	$cols ['commenter'] = $commenter;
}

	$connInfo = $_SERVER['DOCUMENT_ROOT'] . "/../" . "includes/" . "mylib.php";
	require_once($connInfo);
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'SWOH';
	$password = 'password';
	$dbname = 'SWOH';
	$mysql_conn = get_mysql_connection ($hostname, $username, $password, $dbname);
	$table = "SWOH.comment";
	require_once ('DB_Commands.php');
	insertDB($mysql_conn, $table, $cols);
	mysqli_close($mysql_conn);
	
?>
</body>
<a href = "read_contents.php?board_id=<?php echo $board_id?>&post_id=<?php echo $post_id?>">보던 글로 돌아가기</a> <br>
<a href = "index.php?board_id=<?php echo $board_id?>">게시판으로 돌아가기</a> <br>
<a href = "../../index.html">메인 홈으로 돌아가기</a>