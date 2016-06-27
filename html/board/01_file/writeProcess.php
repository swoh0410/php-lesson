
<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>

<?php
	if($_SERVER['REQUEST_METHOD']  === 'POST'){
		$name = $_POST['name'];
		$title = $_POST['title'];
		$contents = $_POST['contents'];
	}
	$fh = fopen("boardListData.txt", 'r') or
		die("파일을 불러올 수 없거나 사용 권한이 없습니다. ㅜㅜ!!!!11111111");
	$line = fgets($fh);
	//저장된 게시물이 몇개인지 카운트.
	$contentsCounter = 1;	
	
	while($line !== false){	
		$contentsCounter++;
		$line = fgets($fh);
	}
	fclose($fh);
	//.txt 파일에 쓰여질 내용.
	$assemble = "\n" . $contentsCounter . "\t" . $name . "\t" . $title . "\t" . $contents;	
	
	$fh = fopen("boardListData.txt", 'a') or
		die("파일을 불러올 수 없거나 사용 권한이 없습니다. ㅜㅜ!!!!2222222222");
	fwrite($fh, "$assemble") or die("파일에 적을수 없거나 쓰기 권한이 없습니다. ㅜㅜㅜㅜ");
	fclose ($fh);
	echo "내용이 성공적으로 저장되었습니다! ^^" . "<br>";
	


?>
<a href = "index.php"> 게시판으로 돌아가기 </a> <br>
<a href = "../../index.html"> 메인으로 돌아가기 </a>