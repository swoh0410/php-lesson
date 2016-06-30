<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body style = "background-color : black;">

<?php
if($_SERVER['REQUEST_METHOD'] === "GET"){
	$pk_id = $_GET["post_id"];
	$fk_id = $_GET["board_id"];
}

REQUIRE_ONCE('DB_Commands.php');

$connInfo = $_SERVER['DOCUMENT_ROOT'] . "/../" . "includes/" . "mylib.php";
require_once($connInfo);
$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
$username = 'SWOH';
$password = 'password';
$dbname = 'SWOH';
$mysql_conn = get_mysql_connection($hostname,$username,$password,$dbname);
row_delete($mysql_conn, $pk_id);
mysqli_close($mysql_conn);

?>

</body>
</html>

<a href = "index.php?board_id=<?php echo $fk_id?>"> 게시판으로 돌아가기 </a> <br>
<a href = "../../index.html"> 메인으로 돌아가기 </a>
