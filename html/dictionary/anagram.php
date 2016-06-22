<?php
if($_SERVER["REQUEST_METHOD"] === "POST"){
	$word = $_POST['word'];
	echo 'A: ' . ord('A'). ' Z: '. ord('Z') .' a: ' . ord('a'). ' z: '. ord('z') ;
	echo "<br>" . $word ."<br>";

}
?>

<h1> 유저의 입력값 <?php echo $word?>로 찾은 Anagram: </h1>

<?php 
	search_anagram($word);
function search_anagram ($word){

	$fh = fopen("dictionary.txt", 'r') or die("사전을 열 수 없거나 사용 권한이 없습니다..ㅜㅜㅜ");
	$line = fgets ($fh);
	//echo $line. "<br>";
	
	
	while($line !== false){
	$explodedLine = explode("\t",$line);
	$sortedWord = count_chars($word);
	
		if(strlen($word) === strlen($explodedLine[0])){
			$sortedLine = count_chars($explodedLine[0]);
			$count = 0; 
			for($i = 65; $i <123; $i++){
				if($sortedWord[$i] !== $sortedLine[$i]){
					break;
				}else{
					$count++;
				}
				if($count === 57){
					echo "<br>";
					print_r($explodedLine);
					echo "<br>";
				}
			}
		}
		$line = fgets($fh);
	}
}


?>