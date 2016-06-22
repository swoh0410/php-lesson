

<?php
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$substring = $_POST["word"];

}
?>

<h1> 주어진 substring: '<?php echo $substring?>' 가 포함된 단어들: </h1>



<?php
	$superStringArray = array();
	$superStringArray = search_superstring($substring);
	$indexMatched = array();
	$sizeSubstring = count($substring);
	$ready_to_print = highlight_Substring($superStringArray,$substring ,$sizeSubstring);	
	print_array($ready_to_print);

	function search_superstring ($substring){
		$fh = fopen("dictionary.txt",'r') or die ("사전을 열 수 없거나 사용 권한이 없음!!!");
		$line = fgets($fh);
		$matchedList = array();
		$count = 0;
		$combineArray = array();
		while($line !== false){
			
			if(strpos($line,$substring) === false){
				
			}else{
				$indexMatched [] = strpos($line,$substring);
				$matchedList [] = $line; 
			}
			$line = fgets($fh);
		}
		$combineArray[] = $indexMatched;
		$combineArray[] = $matchedList;
		fclose($fh);
		return $combineArray;
	}
	
	function highlight_Substring ($array, $substring, $sizeSubstring){
		$completedArray;
		for($m = 0; $m < count($array[0]); $m++){
			$word = $array[1][$m];
			$index = $array[0][$m];
			
			$highlightedSubstring = '<font color = "red">' . $substring   . "</font>";
			$completedArray [$m] = str_replace($substring,$highlightedSubstring,$word);
			
			
		}
		return $completedArray;
	}
	
	function print_array($array){
		for($i =0; $i < count($array); $i++){
			echo $array[$i] . "<br>";
		}
	}
"<font color='red'>Roses are red</font>";
?>