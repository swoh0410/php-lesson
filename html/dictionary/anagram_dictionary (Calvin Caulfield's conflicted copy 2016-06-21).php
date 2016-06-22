<?php
/*
넘겨 받는 정보가 없기 때문에 사실은 필요없음.
if($_SERVER['REQUEST_METHOD'] === 'POST'){
	$variableName= $_POST['보내줄때 이름'];
}
*/
?>

<?php
dictionary_anagram();
function dictionary_anagram(){
	$anagram = Array();
	$fh = fopen("dictionary.txt", 'r') or die("파일을 읽어 올 수 없거나 사용 권한이 없다요~ ㅜㅜ");
	$line = fgets($fh);
	
	while($line !== false){
		$explodedLine = explode("\t", $line);
		$key = produce_key($explodedLine[0]);
		
		if(!isset($anagram[$key])){
			$anagram[$key] = $explodedLine[0]."\t";
		}else{
			$anagram[$key] = $anagram[$key] . $explodedLine[0]."\t";
		}
		//echo "KEY값: <br>".$key . "<br> 단어";
		//echo $explodedLine[0]. "<br>";
		$line = fgets($fh);
	}
	echo " <h1> 아래는 모든 아나그램을 갖고있는 아레이: </h1>"."<br>";
	$anagram = return_neat_array($anagram);
	print_array($anagram);
	
	echo "<br>";
}

function produce_key ($word){
	$sortedLine = count_chars($word);
	$key = '';
//	print_r ($sortedLine);
	for($i = 65; $i < 123; $i++){
		$key = "$key"."$sortedLine[$i]";
		//echo "<br>";
		//echo $key;
		//echo "<br>";
	}
	return $key;

}

function return_neat_array($array){
	foreach($array as $key => $value){
		$storeValue = explode("\t", $array[$key]); //explode했을때 마지막에 \t이 있기 때문에 최소한 2개의 크기를 갖은 값을 내준다.
		//echo "<br>";
		//echo "STORE VALUE Array:   <br>";
		//print_r($storeValue);
		//echo "<br>";
		$unique_array = array_unique($storeValue);
		//echo "<br>";
		//echo "Unique Array:   <br>";
		//print_r($unique_array);
		//echo "<br>";
		$unique_array = array_filter($unique_array);
		if(count($unique_array) > 1){
			$rArray[$key] = implode("\t",$unique_array);
		}
		
	}
	return $rArray;
}

function print_array($array){
	foreach($array as $value){
		echo $value . "<br>";
	}
}
?>