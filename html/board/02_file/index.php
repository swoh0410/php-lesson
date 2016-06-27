<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body style = "background-color : black;">

	<h1> 'Table' </h1>

<?php
	if($_SERVER['REQUEST_METHOD'] === "GET"){
	$board_id = $_GET["board_id"];
	}
	echo "board id: ".$board_id;
	
	$connInfo = $_SERVER['DOCUMENT_ROOT'] . "/../" . "includes/" . "mylib.php";
	require_once($connInfo);
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'SWOH';
	$password = 'password';
	$dbname = 'SWOH';
	$mysql_conn = get_mysql_connection($hostname,$username,$password,$dbname);

	require_once('DB_Commands.php');
	$tableInfoArray = table_read($mysql_conn, "post",$board_id);
	table_print($tableInfoArray);
	mysqli_close($mysql_conn);
?>


</table>
</body>
</html>

<br>

<a href = "write_post.php?board_id=<?php echo $board_id?>"> 글쓰기 </a> <br>
<a href = "../../index.html"> 메인으로 돌아가기 </a>
