<html>
<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>
<?php
if($_SERVER['REQUEST_METHOD'] === 'GET'){
	$id = $_GET["id"];
	$board_id = $_GET["board_id"];
}

	$connInfo = $_SERVER['DOCUMENT_ROOT'] . "/../" . "includes/" . "mylib.php";
	require_once($connInfo);
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'SWOH';
	$password = 'password';
	$dbname = 'SWOH';
	$mysql_conn = get_mysql_connection($hostname,$username,$password,$dbname);
	
	$select_query = sprintf('SELECT * FROM SWOH.post WHERE identification_number = %d', $id);
	$result = mysqli_query($mysql_conn, $select_query);
	
	$number = '';
	$name = '';
	$title = '';
	$content = '';
	
	while($row = mysqli_fetch_assoc($result)){
		echo 'Number: '. $row['identification_number']. '<br>';
		$number = $row['identification_number'];
		echo 'Writer: '. $row['name'].'<br>';
		$name = $row['name'];
		echo 'Title: '. $row['title'].'<br>';
		$title = $row['title'];
		echo 'Content: '. $row['content'].'<br>';
		$content = $row['content'];
	}
	mysqli_free_result($result);
	mysqli_close($mysql_conn);

?>
<br>
<a href = "contents_edit.php?number=
<?php echo $number;?>
&board_id=<?php echo $board_id;?>
&name=<?php echo $name;?>
&title=<?php echo $title;?>
&content=<?php echo $content;?>"> 글 수정하기 </a> <br>
<a href = "index.php?board_id=<?php echo $board_id;?>"> 게시판으로 돌아가기</a> <br>
<a href = "../../index.html"> 메인으로 돌아가기 </a>
</html>