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
	
</style>




<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body style = "background-color : black;">

	<h1> 'Main Home' </h1>
	<table>
		<tr> <th>No.</th><th>Writer</th><th>Title</th></tr>
	


	
	</table>


<?php
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'SWOH';
	$password = 'password';
	$dbname = 'SWOH';
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	} 	
	
	// DB에서 rank가 높은 상위 20개 단어를 출력해 보자
	$select_query = 'SELECT * FROM board';
	// select 쿼리는 mysqli_query 함수의 반환값으로 결과를 받는다.
	$result = mysqli_query($conn, $select_query);
	while($row = mysqli_fetch_assoc($result)) {
		echo "<a href = 'read_contents.php?id=" . $row['identification_number']."'>" . $row['identification_number'] ."</a>". 
			"\t" . $row['name'] . "\t" .
			"<a href = 'read_contents.php?id=" . $row['identification_number']."'>" . $row['title'] . "</a>".  "<br>";
	}
	mysqli_free_result($result);
	mysqli_close($conn);
?>
</body>
</html>

<br>

<a href = "write_post.php"> 글쓰기 </a> <br>
<a href = "/SWOH/html/index.html"> 메인으로 돌아가기 </a>