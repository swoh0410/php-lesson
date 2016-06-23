<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>

	<h1> 'Main Home' </h1>
	<table>
		<tr> <th>No.</th><th>Writer</th><th>Title</th></tr>
	
	<?php list_check();?>

	
	</table>
</body>
</html>

	
<?php
	
	Function list_check (){
		$number = array();
		$name = array();
		$title = array();
		$contents = array();
		$fh = fopen("boardListData.txt", 'r') or 
		die("불러올 파일이 없거나 파일 사용 권한이 없습니다. ");									//파일 불러오기.
		$line = fgets($fh);
	
		while($line !== false){																		//한줄씩 불러와 알맞은 아레이에 정보를 넣는다. 
		$number[] = strtok($line, "\t");
		$name[] = strtok("\t");
		$title[] = strtok("\t");
		$contents[] = strtok("\t");
		$line = fgets($fh);
		}
	
	fclose($fh);
	
	$listSize = count($number);																		//정리된 리스트를 출력한다. html로 출력한다.
	
	for($i = 0; $i < $listSize; $i++){
		echo "<tr> 
				<th>" . $number[$i] . "</th> <th>" . $name[$i] . "</th> <th>" . 
				"<a href = 'read_post.php?number=" . $number[$i] . "'>" . $title[$i] . "</a>" . 
				"</th> 
			</tr>";
	}
}


?>

<a href = "write_post.php"> 글쓰기 </a> <br>
<a href = "../../index.html"> 메인으로 돌아가기 </a>