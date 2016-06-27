<!DOCTYPE html>
<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body style = "background-color : black;">

	

<?php
	if($_SERVER['REQUEST_METHOD'] === "GET"){
	$board_id = $_GET["board_id"];
	}
	if($board_id == 1){
		echo "<h1> '한국어 게시판!' </h1>";
	} else {
		echo "<h1> 'English Bulletin Board!' </h1>";
	}
	
	$connInfo = $_SERVER['DOCUMENT_ROOT'] . "/../" . "includes/" . "mylib.php";
	require_once($connInfo);
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'SWOH';
	$password = 'password';
	$dbname = 'SWOH';
	$mysql_conn = get_mysql_connection($hostname,$username,$password,$dbname);

	require_once('DB_Commands.php');
	$tableInfoArray = table_read($mysql_conn, "post",$board_id);
	board_table_display ($tableInfoArray, $board_id);

	mysqli_close($mysql_conn);


	function board_table_display ($tableInfoArray, $board_id){
	//Table을 만들기 시작.
	//Table 헤더를 만드는 작업.
	$headers = array_keys($tableInfoArray[0]);
	echo "<table>";
	echo "<tr>";
	foreach($headers as $heading){
		echo "<th>" . $heading . "</th>";
	}
	echo "</tr>";
		foreach($tableInfoArray as $row){
			echo "<tr>";
			foreach($row as $key => $value){
				if($key === 'identification_number' || $key === 'title'){
					printf("<td><a href = 'read_contents.php?id=%d&board_id=%d'>$value</a></td>",
					$row['identification_number'],$board_id);
				}else if($key === 'name'){
					echo "<td>" . $value . "</td>"; //작성자 이름을 클릭하면 작성자 프로필이나 작성자가 적은 모든 게시물 보여줌. 
				}else{
					echo "<td>" . $value . "</td>";
				}
				
			}
			echo "</tr>";
	}
	echo "</table>";
	}
	
?>


</table>
</body>
</html>

<br>

<a href = "write_post.php?board_id=<?php echo $board_id?>"> 글쓰기 </a> <br>
<a href = "../../index.html"> 메인으로 돌아가기 </a>
