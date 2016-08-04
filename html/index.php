﻿<html>

<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>

<h1> 
	<!-- 아래는 uploaded_images라는 가상 폴더를 httpd.conf파일에서 설정해서 image file을 불러온 것.  -->
	<img src = "/directory_image/specs.png" alt="HTML5 Icon" width="50" height="25"> 
	Oh's Workplace 
	<img src = "/directory_image/specs.png" alt="HTML5 Icon" width="50" height="25"> 
</h1>


<body>
<div class = "content" style = "height: 700px; width: 1200px; margin-top: 50px; margin-left: auto; margin-right: auto;">
	<div style = "float:left; height: 100%; width: 77%; margin-right: 20px;">

		<table align = "left" style ">

			<tr> <th> PHP </th> </tr>
			<tr> <td><a href = "./board/01_file/index.php"> 게시판 </a> </td></tr>
			<tr> <td><a href = "./calculator/index.php"> 계산기 </a> </td></tr> 
			<tr> <td><a href = "./dictionary/01db/index.php"> 사전값 </a> </td></tr>
		</table>

		<table align = "left">
			<tr> <th> Database </th> </tr>
			<tr> <td> <a href = "./board/02_file/index.php?board_id=1"> 한국어 게시판 </a> </td></tr>
			<tr> <td> <a href = "./board/02_file/index.php?board_id=2"> English Bulletin Board </a> </td></tr>
		</table>

		<table align = "left">
			<tr> <th> Security </th> </tr>
		</table align = "left">


		<table align = "left">
			<tr> <th> JScript </th> </tr>
		</table>
		
		<table align = "left">
			<tr> <th> hangman test</th> </tr>
			<tr> <td> <a href = "./hangman/html/index.php"> 게임 페이지 </a> </td></tr>
		</table>

	</div>

<!--로그인 처리-->
<?php
	require_once('login/session.php');
	start_session();
	if(check_login()){
?>
	<h4>현재 로그인 되어 있는 상태입니다</h4>
	<form action = "login/logout.php" method = "POST">
		<input type = "submit" value = "로그아웃">
	</form>
<?php
	} else{
?>	
	<h4> 로그인 하십시요. </h4>
	<div style = "float:right;" >
		<form action = "login/login.php" method = "POST">
			<table style = "margin-bottom:10px;">
			<tr>
				<td> login: </td>
				<td> <input type = "text" name = "id"> </td>
			</tr>	
			<tr> 
				<td>password: </td> 
				<td> <input type = "password" name = "password"></td> 
			</tr>
			</table>
			<input type = "submit" value = "Log In">
			<a href = "login/register_page.php">회원가입</a>
			
		</form>
	</div>

<?php
	}
?>
	
</div>


	
</body>

