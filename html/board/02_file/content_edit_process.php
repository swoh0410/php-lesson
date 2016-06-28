<html>
<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>


<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$identification_number = $_POST['identification_number'];
	$board_id = $_POST['board_id'];
	$title = $_POST['title'];
	$content = $_POST['content'];
}
echo "<br> identifi Num:" . $identification_number .
"<br> board_id:" . $board_id .		
"<br> tittle:" . $title .	
"<br> content:" . $content;

	$connInfo = $_SERVER['DOCUMENT_ROOT'] . "/../" . "includes/" . "mylib.php";
	require_once($connInfo);
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'SWOH';
	$password = 'password';
	$dbname = 'SWOH';
	$mysql_conn = get_mysql_connection($hostname,$username,$password,$dbname);

	require_once('DB_Commands.php');
	row_update($mysql_conn, $identification_number, $title, $content);
	
	mysqli_close($mysql_conn);

?>
<a href = "index.php?board_id=<?php echo $board_id?>"> 게시판으로 돌아가기 </a> <br>
<a href = "../../index.html"> 메인으로 돌아가기 </a>
</html>