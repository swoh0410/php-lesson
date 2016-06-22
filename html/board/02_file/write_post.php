
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">

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

<html>
<head>
	<link rel="stylesheet" type="text/css" href="/css/mystyle.css">
</head>
<body style = "background-color : black">
<div class="content">
	<h1>Write Post</h1>
	
	<form action="Update_DB.php" method="POST">
		<table>
			<tr> 
				<td> NAME: </td> <td> <input type="text" name="name"> </td> 
			</tr>
			<tr>
				<td> Title: </td> <td> <input type = "text" name="title"> </td>
			</tr>
			<tr>
				<td> Contents: </td> <td> <input type = "text" name = "contents"> </td>
			</tr>
		</table>
		<br>
		<input type="submit" value="제출">
	</form>
</div>	
<a href = "index.php"> 게시판으로 돌아가기 </a> <br>
<a href = "/index.html"> 메인으로 돌아가기 </a>
</body>
</html>