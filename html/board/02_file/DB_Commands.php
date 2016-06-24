
<?php

//DB에서 table을 읽어와서 Two-Dimentional Array 에 넣고 그 array를 Return. 
function table_read($conn){
	mysqli_query($conn,"SET NAMES 'utf8'");  //utf8로 인코딩해서 출력. 
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	} 	
	
	// DB에서 사용할 query.
	$select_query = 'SELECT * FROM board';
	// $result에 $connection과 query를 이용한 return값을 넣는다.
	$result = mysqli_query($conn, $select_query);
	while(NULL !==($row = mysqli_fetch_assoc($result))) { // $result에서 한줄 읽어와서 $row에 넣는다.
		$tableArray[] = $row; 
	}
	mysqli_free_result($result);
	mysqli_close($conn);
	print_r($tableArray);
	return $tableArray;

}


function table_print ($tableArray){
	//Table을 만들기 시작.
	//Table 헤더를 만드는 작업.
	$headers = array_keys($tableArray[0]);
	echo "<table>";
	echo "<tr>";
	foreach($headers as $heading){
		echo "<th>" . $heading . "</th>";
	}
	echo "</tr>";
		foreach($tableArray as $row){
			echo "<tr>";
			foreach($row as $value){
				echo "<td>" . $value . "</td>";
			}
			echo "</tr>";
	}
	echo "</table>";
	
	
}


/*

function row_read(){
	$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
	$username = 'SWOH';
	$password = 'password';
	$dbname = 'SWOH';
	$conn = mysqli_connect($hostname, $username, $password, $dbname);
	mysqli_query($conn,"SET NAMES 'utf8'");  //utf8로 인코딩해서 출력. 
	if (!$conn) {
		die('Mysql connection failed: '.mysqli_connect_error());
	} 	
	$result = mysqli_query($conn, $select_query);
}








function row_add(){
	
}

function row_delete (){
	$commandDelete = "DELETE FROM"
}
*/
?>