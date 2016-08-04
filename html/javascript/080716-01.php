<!DOCTYPE html>
<meta http-equiv = "Content_Type" content = "text/html; charset=utf-8">
<html>
	<head>
		<script>
			var global = 'global'; //선언
			function myFunction(){
				var local = 'local'; //선언
				local = 'new local'; //사용1
				global = 'new global'; //사용1
				mistake = 'value';
				
				function myFunction2(){
					var local2 = 'local2'; //선언
					var local3 = local; //선언과 사용2
					global = 'new value'; //사용
				}
			}
		</script>
	</head>
</html>
<?php
//위의 java script 코드와 비교하면서 정리하자.
	$global = 'global';
	$i = 1;
	my_function();
	function my_function(){
		$i = 3;
		echo "local variable: " . $i . "<br>";
		global $i;
		echo "global variable: " . $i . "<br>";
		$local = 'local';
		$local = 'new local';
		$global = 'new global';
	}
	echo "global: " . $i;
?>