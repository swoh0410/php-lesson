<!DOCTYPE html>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<html>
<body>
<?php
	$regex = '/\s+(\s|[=">\/])/';
	$text = '<p    class  =    "my_class" id = "Q2\"" > .. < /p >';
	
	$ans = preg_replace($regex,'\1', $text);
	echo htmlspecialchars('치환 결과: '.preg_replace($regex,'\1', $text));
	echo '<br><br>';
	echo "<script> alert ('".$ans."');</script>";
	$regex = '/[-:]+/';
	$text = '01 0  - 6 605: 19 17';
	$result = implode('-', preg_split($regex, $text));
	echo '원래 값: '.$text.'<br>';
	echo 'split 하고 implode 한 결과: '.$result.'<br>';
	echo '최종 replace 결과: '.preg_replace('/\s+/', '', $result);
	<p    class  =    "my_class" i = "Q2" > .. < /p >'
?>
</body>
</html>

[^$]\w+\s*=\s*"\w+"[^;]

[a-z]+\s*=\s*"( [^"]*)" | [a-z]+\s*=\s*"[^"]*\""

[a-z]+\s*=(\s*"( [^"]*)" | \s*"[^"]*\")"[^;]

[a-z]+\s*=(\s*"\w+"| \s*"[^"]*\")[^;]s