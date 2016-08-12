<?php

//BASE TYPE INT
$int0 = 0;
$int1 = 1;
echo "<b>BASE INT: </b><br>";


var_dump(floatval($int0)); // 0.0 
echo "<br>";
var_dump(floatval($int1)); // 1.0 
echo "<br>";
var_dump(strval($int0)); // '0'
echo "<br>";
var_dump(strval($int1)); // '1'
echo "<br>";
var_dump(boolval($int0)); // false;
echo "<br>";
var_dump(boolval($int1)); // true;
 
 
//BASE TYPE FLOAT
$float0_0 = 0.0; 
$float1_9 = 1.9;
echo "<br>";
echo "<b>BASE FLOAT: </b><br>";

var_dump(intval($float0_0)); // 0
echo "<br>";
var_dump(intval($float1_9)); // 1 
echo "<br>";
var_dump(strval($float0_0)); // '0.0'
echo "<br>";
var_dump(strval($float1_9)); // '1.9'
echo "<br>";
var_dump(boolval($float0_0)); // false;
echo "<br>";
var_dump(boolval($float1_9)); // true;

//BASE TYPE STRING
$str_empty = ''; 
$str0= '0';
$str0_0 = '0.0';
$str1_9 = '1.9';
echo "<br>";
echo "<b>BASE STRING: </b><br>";

var_dump(intval($str_empty)); // null;
echo "<br>";
var_dump(intval($str0)); //0
echo "<br>";
var_dump(intval($str0_0)); //0
echo "<br>";
var_dump(intval($str1_9)); //1
echo "<br>";

var_dump(floatval($str_empty)); // 0;
echo "<br>";
var_dump(floatval($str0)); //0
echo "<br>";
var_dump(floatval($str0_0)); //0
echo "<br>";
var_dump(floatval($str1_9)); //1.9
echo "<br>";

var_dump(boolval($str_empty)); // false;
echo "<br>";
var_dump(boolval($str0)); //false
echo "<br>";
var_dump(boolval($str0_0)); //true
echo "<br>";
var_dump(boolval($str1_9)); //true
echo "<br>";



//BASE TYPE BOOLEAN
$true = true;
$false = false;

echo "<b>BASE BOOLEAN: </b><br>";
var_dump(intval($true)); // 1;
echo "<br>";
var_dump(intval($false)); //0;
echo "<br>";
var_dump(floatval($true)); //1
echo "<br>";
var_dump(floatval($false)); //0
echo "<br>";
var_dump(strval($true)); //"1"
echo "<br>";
var_dump(strval($false)); //""


//Array


echo "<b>BASE ARRAY: </b><br>";

$empty = array();
$a = array('a');

//여기서부터 고쳐야함. 아직 테스트 안 함. 
echo "<b>BASE BOOLEAN: </b><br>";
var_dump(intval($true)); // 1;
echo "<br>";
var_dump(intval($false)); //0;
echo "<br>";
var_dump(floatval($true)); //1
echo "<br>";
var_dump(floatval($false)); //0
echo "<br>";
var_dump(strval($true)); //"1"
echo "<br>";
var_dump(strval($false)); //""
var_dump(floatval($false)); //0
echo "<br>";
var_dump(strval($true)); //"1"
echo "<br>";
var_dump(strval($false)); //""


for($i = 0;  $i < 5; $i++){
	switch($i){
		case 0: 
		echo "case0 <br>";
		break 2;
		case 1:
		echo "NOT BROKEN";
		break;
	}
	echo "SWITH broken".$i;
}
echo"DONE"

?>

