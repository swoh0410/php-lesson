<html>
<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>

<body>
<!-- 아래는 글 읽어와 화면에 보여주는. -->
<table>
<?php
if($_SERVER['REQUEST_METHOD'] === 'GET'){
	$post_id = $_GET["post_id"];
	$board_id = $_GET["board_id"];
}

	$connInfo = $_SERVER['DOCUMENT_ROOT'] . "/../" . "includes/" . "mylib.php";
	require_once($connInfo);
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'SWOH';
	$password = 'password';
	$dbname = 'SWOH';
	$mysql_conn = get_mysql_connection($hostname,$username,$password,$dbname);
	
	$select_query = sprintf('SELECT * FROM SWOH.post WHERE post_id = %d', $post_id);
	$result = mysqli_query($mysql_conn, $select_query);
	
	$post_id = '';
	$name = '';
	$title = '';
	$content = '';
	while($row = mysqli_fetch_assoc($result)){
		echo "<tr> <td> <b> Post Number: </b> </td> <td>".$row['post_id']."</td> </tr>";
		$post_id = $row['post_id'];
		echo "<tr> <td> <b> Writer: <b> </td> <td>".$row['name']."</td> </tr>";
		$name = $row['name'];
		echo "<tr> <td> <b> Posting Date: <b> </td> <td>".$row['posting_date']."</td> </tr>";
		echo "<tr> <td> <b> Last Update: <b> </td> <td>".$row['last_update']."</td> </tr>";
		echo "<tr> <td> <b> Title: <b> </td> <td>".$row['title']."</td> </tr>";
		$title = $row['title'];
		echo "<tr> <td> <b> Content: <b> </td> <td>".$row['content']."</td> </tr>";
		$content = $row['content'];
	}
	mysqli_free_result($result);
	

?>
</table>
<br>

<!-- 여기서부터 아래는 댓글 관련 -->
<form action = "comment_process.php" method = "POST">
<h3>댓글을 입력하세요:</h3> 
	작성자:</td> <td><input type = "text" name = "commenter"> <br>
	내  용 :	</td> <td> <textarea type = "text" name = "comment" rows = "5" cols = "100"></textarea>
			<input type = "hidden" name = "post_id" value = "<?php echo $post_id?>">
			<input type = "hidden" name = "board_id" value = "<?php echo $board_id?>">
			<input type = "submit" value = "댓글 달기.">
	<!--<table>
		<tr> <td>작성자:</td> <td><input type = "text" name = "commenter"></td> </tr>
		<tr> <td> 내용:	</td> <td> <textarea type = "text" name = "comment" rows = "5" cols = "100"></textarea> </td> </tr>
				<input type = "hidden" name = "post_id" value = "<?php echo $post_id?>">
				<input type = "submit" value = "댓글 달기.">
	</table>-->
</form>
<table>
<?php
	require_once('DB_Commands.php');
	$table = "SWOH.comment";
	$fk_comment = $post_id;
	$fk_name = 'post_id';
	$tableArray = table_read2($mysql_conn, $table, $fk_name, $fk_comment);
	echo "<br><b>작성된 댓글:</b><br>";
	if($tableArray === NULL){
		echo "아직 작성된 댓글이 없습니다.";
	}else{
		table_print($tableArray,$board_id);
	}
	mysqli_close($mysql_conn);
?>
</table>

<!-- 여기까지. -->

</body>
<br>
<a href = "contents_edit.php?post_id=
<?php echo $post_id;?>
&board_id=<?php echo $board_id;?>
&name=<?php echo $name;?>
&title=<?php echo $title;?>
&content=<?php echo $content;?>"> 글 수정하기 </a> <br>
<a href = "index.php?board_id=<?php echo $board_id;?>"> 게시판으로 돌아가기</a> <br>
<a href = "../../index.html"> 메인으로 돌아가기 </a>
</html>