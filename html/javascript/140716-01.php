<script>
var words = [];
function insertAndSort(){
	var input = document.getElementById('input_field').value;
	words.push(input);
	words.sort();
	var result = words.join('<br>');
	document.getElementById('result').innerHTML = result;
}
</script>

<html>
<body>
<span id="result">결과값은 여기에 나타남</span><br>
<input type = "text" id = "input_field">
<button id="submit" onclick = "insertAndSort();"> Click to submit</button><br><br>
</body>
</html>