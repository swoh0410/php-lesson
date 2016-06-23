<?php
	if($_SERVER['REQUEST_METHOD'] === 'GET'){
		$number = $_GET["number"];
	}
	echo get_contents($number);
	
	function get_contents($number){
		
		$fh = fopen("boardListData.txt",'r');
		$line = fgets($fh);
		
		$storedNum = 0;
		$storeName = "";
		$storeTitle = "";
		$storedContents = "";
		
		while($line !== false){
			
			$storedNum = strtok($line, "\t");
			$storedName = strtok("\t");
			$storedTitle = strtok("\t");
			$storedContents = strtok("\t");
			
			if($number === $storedNum){
				break;
			}
			
			$line = fgets($fh);
		}
		
		$rContents = $storedContents;
		
		return $rContents;
	}
	
?>
<br>
<a href = "index.php"> 게시판으로 돌아가기 </a> <br>
<a href = "../../index.html"> 메인으로 돌아가기 </a>