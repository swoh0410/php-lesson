<!DOCTYPE html>
<style type="text/css">
	h1 {text-align : center; color : white; background-color : black;}
	table{width:25%; border : 2px solid #ededed; border-collapse : collapse; text-align : center;
		style="float:center";}
	th {border : 1px solid white; color : white; background-color: black;}
	td {border : 1px solid white; color : white; background-color: black;}
	a:link {color : white; text-decoration:none;}
	a:visited {color : white; text-decoration:none;}
	a:hover {color : yellow; text-decoration:none;}
	body {style : black;}
	
</style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<?php
if($_SERVER['REQUEST_METHOD'] === "POST"){
	$name = $_POST["name"];
	$title = $_POST["title"];
	$contents = $_POST["contents"];
}
insertDB($name, $title, $contents);



function insertDB($name, $title, $contents){
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'SWOH';
	$password = 'password';
	$dbname = 'SWOH';
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	} 	
	// 단어목록 파일을 DB 에 넣어보자

	$insert_query = 'INSERT INTO board (name, title, contents) VALUES ("'.$name.'","'.$title.'","'.$contents.'")' ;

	if(mysqli_query ($conn, $insert_query) === false){
		echo mysqli_error($conn);
	}
	echo 'DB INSERT: '. $name.' '.$title. ' '.'<br>';
	echo 'DB INSERT 성공<br>';
	mysqli_close($conn);
}
	
?>
</body>
<a href = "/board/02_file/index.php"> 게시판으로 돌아가기! </a><br>
<a href = "/index.html"> 메인 홈로 돌아가기! </a> 
</html>
