<head>
<link rel="stylesheet" type="text/css" href="/directory_css/style_black_white.css">
</head>

<body>
<?php 
if($_SERVER['REQUEST_METHOD'] == 'POST'){
	$input = $_POST['input'];
}
?>
<h1> 식 <?php echo $input?> 에 의한 결과 값: </h1>

 

<?php
$stack = array();
$stackSize = 0;
$postfix = array();

$char = str_split($input);
print_r ($char);
$numAssemble = 0;

for($i = 0; $i < count($char); $i++){
	if($char[$i] !== "+" || $char[$i] !== "-" || $char[$i] !== "*" || $char[$i] !== "/"){
		$numAssemble = $numAssemble + $char[$i];
	}else{
		$postfix [] = $numAssemble;
		operator_Priority($char[$i]);
	}
}

print_r ($postfix);
//echo array_push($postfix);


Function operator_Priority ($operator){
	$stackSize = count($stack);
	if($stackSize === 0){
		array_push($stack,$operator);					//same as $stack[] = $operator; 스택이 비었기 때문에 비교 없이 연산자를 스택에 넣는다. 
	}else{
		$lastStack = $stack[$stackSize-1];
		//if($operator == '+' || $operator == '-'){
			array_push($stack,$operator);
		//}else if ($operator === '*' || $operator === '/'){
			if($lastStack === '+'|| $lastStack === '-'){
				while($stackSize === 0){
					$poppedOperator = array_pop($stack);
					$lastPostfix = array_pop($postfix);
					$secondLastPostfix = array_pop($postfix);
					$pushValue = 0;
					if($poppedOperator === '+'){
						$pushValue = $lastPostfix + $secondLastPostfix;
					}else if($poppedOperator === '-'){
						$pushValue = $lastPostfix - $secondLastPostfix;
					}else if($poppedOperator === '*'){
						$pushValue = $lastPostfix * $secondLastPostfix;
					}else if($poppedOperator === '/'){
						$pushValue = $lastPostfix / $secondLastPostfix;
					}
					array_push($postfix,$pushValue);
				}
				array_push($stack,$operator); 								//비어있는 스택에 지금 들어온 연산자를 넣어준다.
			}else if($operator === '*'|| $operator === '/'){
				array_push($stack,$operator);
			}else{
			echo "+,-,*,/와 숫자만을 띄어쓰기 없이 입력해 주세요.";
		}
	}
}


?>
</body>