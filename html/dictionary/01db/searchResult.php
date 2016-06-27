<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>
<body>
<?php
$input = '';
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$input = $_POST['word'];
}
?>
<h1> 검색된 <?php echo $input?> 의 </h1>

<h1> 첫 케릭터 <?php echo substr($input,0,1) ?>가 갖은 값은: </h1>
<?php
echo byFirstCharacter($input);												//단어의 첫 케릭터의 값을 찾아서 보여주는 함수.
Function byFirstCharacter ($input){
	$a = ord('a');
	$value = ($a - ord($input)) * -1 + 1;
	return $value;
}
?>

<br>
<h1>검색된 단어 <?php echo $input ?> 가 갖은 값은: </h1>

<?php
echo wordValue($input);														//단어의 값을 찾아서 보여주는 함수. 
Function wordValue ($input){
	$charWord = str_split($input);
	$sum = 0;
	for($i = 0; $i < count($charWord); $i++){
		$sum = $sum + byFirstCharacter($charWord[$i]);
	}
	return $sum;
}
?>

<br>

<h1>아래는 값이 100인 단어들만 출력.</h1>
<?php 
getWord(100);
Function getWord($value){													// 주어진 값을 가지고 있는 단어 찾기. 
	$file_name = 'dictionary.txt';
	$file_handler = fopen($file_name, "r") or 
	die("******File does NOT exist or you lack permission to open it.*****");
	$line = fgets($file_handler);
	$dictionaryWord = strtok($line, "\t1234567890" );
	
	while($line !== false ){
		if(wordValue($dictionaryWord) === $value){
			echo $dictionaryWord; 
			echo "<br>";
		}
		$line = fgets($file_handler);
		$dictionaryWord = strtok($line, "\t1234567890");
		
	}
	fclose($file_handler);
}
?>

<?php
//$fh = fopen("alphabetical_Order.txt", 'w') or die ("Failed To Create File!!!!!!!!!!!!!!!!!!!!!! ");
//$text = <<<_END
//_END;
//fwrite($fh,$text) or die ("COULD NOT WRITE TO FILE!!!!!!! :::::");
//fclose($fh);
$detail = '';
$wordPosition =  givePosition($input);
Function givePosition($inputWord){
	$charInputWord = str_split($inputWord);
	$orderNumber = 0;
	$base = 100;
	$exponent = 1;
	$assemblePosition = 0;
	
	for($i = 0; $i < count($charInputWord); $i++){
			$denominator = pow($base,$exponent);
			$assemblePosition = $assemblePosition + byFirstCharacter($charInputWord[$i]) / $denominator;
			$exponent++;
	}
	$detail = $assemblePosition . "\t" . $input . $
	return $r;
}

$order = array();
function findPosition ($wordPosition){
	if(count[$order] === 0){
		array_push($order, $wordPosition);
	}
}



?>
<a href = "alphabetical_Order.php"> 알파벳 순으로 보기. </a>
<a href = "../../index.html"> 메인으로 돌아가기 </a>
</body>