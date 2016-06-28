
<?php

	//DB에서 table을 읽어와서 Two-Dimentional Array 에 넣고 그 array를 Return. 
	function table_read($conn, $tableName, $board_id = 0){

		if (!$conn) {
			die('Mysql connection failed: '.mysqli_connect_error());
		} 	
		//board_id의 값이 없으면 DB에 저장된 모든 post들 출력.
		if($board_id === 0){
		$select_query = 'SELECT * FROM ' . $tableName ;
		}else{
		//board_id의 값을 받아와 계시판 구분해서 post를 출력해줌. 
		$select_query = 'SELECT * FROM ' . $tableName . ' WHERE board_id = ' . $board_id;
		}
		// $result에 $connection과 query를 이용한 return값을 넣는다.
		$result = mysqli_query($conn, $select_query);
		
		while(NULL !==($row = mysqli_fetch_assoc($result))) { // $result에서 한줄 읽어와서 $row에 넣는다.
			$tableArray[] = $row; 
		}
		
		mysqli_free_result($result);
		return $tableArray;
	}



	// content edit function
	function row_update($conn, $identification_number, $title, $content){
		$update_query = sprintf("UPDATE SWOH.post SET title = '%s', content = '%s' WHERE identification_number = %d;", $title, $content, $identification_number);
		$result = mysqli_query($conn, $update_query); //mysql 실행!
		
		if($result === false){
			echo "업데이트 도중 문제가 발생하였습니다. <br>"; 
			mysqli_error($conn);
		}else{
			echo "Content is updated. <br>";
		}
	}
	
	
	/* 어떤 테이블이든 프린트 할 수 있는 메소드.
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

	*/



?>