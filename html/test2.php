<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<style>
.timer {
	display: block; 
	width: 800px; 
	margin:0 auto; 
	margin-top: 100px; 
	font-size:100px	;
	text-align: center;
}

.temp {
	font-size: 150px;
	color = "green";
}

</style>
<script type="text/javascript" src="/jquery/jquery.js"></script>
<script type="text/javascript" src="/jquery/jquery.countdown.js"></script>
<script type="text/javascript" src="/jquery/jquery-ui.js"></script>
<link rel="stylesheet" href="/jquery/themes/base/jquery-ui.css" />
<script>


$(document).ready(function(){
	
	//window.onbeforeunload = function() {
	//	return "게임을 마치지 않고 나가면 징계를 먹습니다.";
	//};
	
//	window.onunload = function() {
		// 만약 게임중이면 징계먹이기
	//	return;
	//};
	
	// disable F5 key
	//function disableF5(e) { 
		//if ((e.which || e.keyCode) == 116) {
			//e.preventDefault(); 
		//}
	//}
	//$(document).on("keydown", disableF5);
	
	function flick() {			
		
		$('#flash').addClass('temp',700,callBack());
		$('#flash').animate({color:black;},1000);
		
		//var els = document.getElementsByClassName('mytimer');
		//var flash = els[0];		
		//var newNode = flash.cloneNode(true);
		//newNode.id = flash.id + '1';
		//flash.parentNode.replaceChild(newNode, flash);
		//newNode.className = 'timer mytimer';
		
		//flash.style.color = 'red';
		//setTimeout(function() { flash.style.color = 'black'; }, 100);	
	}
	
	function callBack(){
		$().removeClass('temp');
	}

	$('#timer').countdown(Date.now() + 10000, function(event) { 
		var remainingSecondsString =  event.strftime('%-S');
		$(this).text(remainingSecondsString); 
		if (parseInt(remainingSecondsString) == 0) {
			$(this).text('Time Over');
		} else if (parseInt(remainingSecondsString) % 2 == 0) {
			$(this).css('color', 'red');
		} else {
			$(this).css('color', 'blue');
		}
	});
	
	$('#dummy').countdown(Date.now() + 10000, function(event) { 
		flick();
	});
});
</script>
</head>
<body>

<span id="timer" class="timer">Timer not started yet</span>
<span id="flash" class="timer mytimer">Flash</span>
<span id="dummy"></span>
</div>
</body>
</html>