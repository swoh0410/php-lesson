<html>
<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>
<?php
if($_SERVER['REQUEST_METHOD'] === 'GET'){
	$id = $_GET["id"];

}
echo get_contents($id);
	
function get_contents($id){
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'SWOH';
	$password = 'password';
	$dbname = 'SWOH';
	$conn = mysqli_connect($hostname,$username,$password,$dbname);
	mysqli_query($conn,"SET NAMES 'utf8'");  //utf8로 인코딩해서 출력. 
	if(!$conn) {
		die('MySQL Connection failed:' . mysqli_connect_error);
	}
	
	$select_query = 'SELECT * FROM board WHERE identification_number ='. "$id";
	$result = mysqli_query($conn, $select_query);
	while($row = mysqli_fetch_assoc($result)){
		echo 'Number: '. $row['identification_number']. '<br>';
		echo 'Writer: '. $row['name'].'<br>';
		echo 'Title: '. $row['title'].'<br>';
		echo 'Contents: '. $row['contents'].'<br>';
	}
	mysqli_free_result($result);
	mysqli_close($conn);
}

?>

<a href = "index.php"> 게시판으로 돌아가기</a> <br>
<a href = "../../index.html"> 메인으로 돌아가기 </a>
</html>