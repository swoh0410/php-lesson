<html>
<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>


<?php
if($_SERVER['REQUEST_METHOD'] === 'GET'){
	$identification_number = $_GET['number'];
	$board_id = $_GET['board_id'];
	$name = $_GET['name'];
	$title = $_GET['title'];
	$content = $_GET['content'];
}
?>
<h1>글 수정하기.</h1>

<form action = "content_edit_process.php" method = "POST">
	<table>
		<tr> <td>글 번호:</td> <td><?php echo $identification_number ?></td> </tr>
		<tr> <td>작성자:</td> <td><?php echo $name?></td> </tr>
		<tr> <td>글 제목:</td> <td><input type = "text" name = "title" value ="<?php echo $title?>"></td> </tr>
		<tr> <td>내용:</td> <td><textarea type = "text" name = "content"><?php echo $content;?> </textarea></td> </tr>
		<tr> <td> <input type = "hidden" name = "identification_number" value = "<?php echo $identification_number?>">  </td> </tr>
		<tr> <td> <input type = "hidden" name = "board_id" value = "<?php echo $board_id?>">  </td> </tr>
	</table>
	<br>
	<input type = "submit" value = "저장하기">
</form>

<br>
<a href = "index.php?board_id=<?php echo $board_id;?>"> 게시판으로 돌아가기</a>
</html>