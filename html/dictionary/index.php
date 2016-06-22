
<div class = "content">
	<h1> 값을 찾고싶은 단어를 적으세요. </h1>
	<form action = "searchResult.php" method = "POST">
		검색: <input type = "text" name = "word"> <br><br>
		<input type = "submit" value = "값 찾기">
	</form>
	
	<br>
	
	<h1> Superstring을 찾고싶은 substring 영어 단어를 적으세요. </h1>
	<form action = "searchProcess.php" method = "POST">
		검색: <input type = "text" name = "word"> <br><br>
		<input type = "submit" value = "찾아보기">
	</form>
	
	<br>
	
	<h1> Anagram을 찾고싶은 단어를 적으세요. </h1>
	<form action = "anagram.php" method = "POST">
		검색: <input type = "text" name = "word"> <br><br>
		<input type = "submit" value = "찾아보기">
	</form>
	<table>
	<tr> <a href = "anagram_dictionary.php"> 사전에 모든 아나그램 찾기</a> </tr> <br>
	</table>
	<a href = "/index.html"> 메인으로 돌아가기 </a>
</div>

