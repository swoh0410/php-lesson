계산 결과:

<?php

	if($_SERVER['REQUEST_METHOD'] == 'POST'){
		$input = $_POST['input'];
	
	$inputArr = str_split($input);
	
	$priority = array();
	print_r($inputArr);
	$stack = array();
	$postfix = array();
	
		for($i = 0; $i < count($inputArr); $i++){
			if($inputArr[$i] === '+' || $inputArr[$i] === '-' 
				|| $inputArr[$i] === '*' || $inputArr[$i] === '/'){ //지금 point하고 있는 곳이 operator라면. 
					$postfix[] = $number;							//지금까지 number를 $postfix array에 박는다.
					if(count($Stack) === 0){						//스택 아레이가 비어있다면.
						$stack[] = $inputArr[$i];					//지금 point하고있는 operator를 $stack array에 밖는다. ($stack[]이 비어있을경우)
					}else if($inputArr[$i] === '+' || $inputArr[$i] === '-'){				//$stack[]에 무엇이 있으면 그 전에 들어온 애랑 비교. 
						$postfix[count($postfix)-2] + $stack[] 
					}
			}else{
				$number = $number.$inputArr[$i]; 					//operator가 오기전. 숫자를 만드는 단계.
			}
			
		}
	}
	
	function 

?>