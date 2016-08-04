
<?php
	function db_swoh_conn(){
		$connInfo = $_SERVER['DOCUMENT_ROOT'] . "/../" . "includes/" . "mylib.php";
		require_once($connInfo);
		$hostname = 'kocia.cytzyor3ndjk.ap-northeast-2.rds.amazonaws.com';
		$username = 'SWOH';
		$password = 'password';
		$dbname = 'SWOH';
		$mysql_conn = get_mysql_connection($hostname,$username,$password,$dbname);
		
		return $mysql_conn;
	}

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
	function row_update($conn, $post_id, $title, $content){
		$update_query = sprintf("UPDATE SWOH.post SET title = '%s', content = '%s' WHERE post_id = %d;", $title, $content, $post_id);
		$result = mysqli_query($conn, $update_query); //mysql 실행!
		
		if($result === false){
			echo "업데이트 도중 문제가 발생하였습니다. <br>"; 
			mysqli_error($conn);
		}else{
			echo "Content is updated. <br>";
		}
	}
	
	//content 삭제.
	function row_delete($conn, $post_id){
		$delete_query = sprintf("DELETE FROM SWOH.post WHERE post_id = %d;", $post_id);
		$result = mysqli_query($conn, $delete_query);
		
		if($result === false){
			echo "게시글 삭제 도중 문제가 발생하였습니다. <br>"; 
			mysqli_error($conn);
		}else{
			echo "글 삭제가 완료 되었습니다.. <br>";
		}
	}
	//글 적기. (포스팅이던, 댓글이던)
	function insertDB($conn, $table, $cols){
		$fields = "";
		$values = "";
		$number_of_fields = count($cols);
		$counter = 1;
		
		foreach($cols as $key => $value){
	
			if($counter < $number_of_fields){
				$fields = $fields . $key . ", ";
				$values = $values ."\"" .$value . "\"". ", ";
			}else{
				$fields = $fields . $key;
				$values = $values ."\"" .$value . "\"";
			}
		
			$counter++;
		}
		echo " <br> TABLE: " . $table . "<br>"
		."Fields: " . $fields . "<br>"
		."Values: " . $values . "<br>";
		$insert_query = sprintf('INSERT INTO %s (%s) VALUES (%s)', $table, $fields,$values);
		
		if(mysqli_query($conn, $insert_query) === false) {
			echo mysqli_error ($conn);
		}else{
			echo 'DB INSERT 성공<br>';
		}
		
	}
	
	function table_Read2($conn, $table, $fk_name, $fk_id){
		$select_query = sprintf('SELECT * FROM %s WHERE %s = %d', $table, $fk_name, $fk_id);
		$result = mysqli_query($conn, $select_query);
		while(NULL !==($row = mysqli_fetch_assoc($result))) { // $result에서 한줄 읽어와서 $row에 넣는다.
			$tableArray[] = $row; 
		}
		mysqli_free_result($result);
		
		if(isset($tableArray)){
			return $tableArray;		
		}else{
			return NULL;

		}

	}
	
	function table_print ($tableArray, $board_id){
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
				foreach($row as $key => $value){
					if($key === 'post_id'){
						$post_id = $key;
					}
					echo "<td>" . $value . "</td>";
				}
				printf('<td><a href = "content delete_process.php?post_id=%s&board_id=%s"></td>',$post_id,$board_id);
				echo "</tr>";
		}
		echo "</table>";
	}

	

	

?>