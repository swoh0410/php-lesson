
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>

<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>


<head>
	<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
</head>
<body style = "background-color : black">
<?php
	if($_SERVER['REQUEST_METHOD'] === "GET"){
	$board_id = $_GET["board_id"];
	}	
?>
<div class="content">
	<h1>Write Post</h1>
	
	<form action="Update_DB.php" method="POST">
		<table>
			<tr> 
				<td> NAME: </td> 
				<td> <input type="text" name="name"> </td> 
			</tr>
			<tr>
				<td> Title: </td> 
				<td> <input type = "text" name="title"> </td>
			</tr>
			<tr>
				<td> Content: </td> 
				<td><textarea type = "text" name = "content" rows = "30" cols = "100"> </textarea> </td>
			</tr>
			<tr>
				<td> <input type = "hidden" name = "board_id" value = "<?php echo $board_id?>"> </td>
			</tr>
		</table>
		<br>
		<input type="submit" value="제출">
	</form>
</div>	
<a href = "index.php?board_id=<?php echo $board_id?>"> 게시판으로 돌아가기 </a> <br>
<a href = "../../index.html"> 메인으로 돌아가기 </a>
</body>
</html>	