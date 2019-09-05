<?php	
	$state = true;
	$handle = new mysqli('localhost','diarrhea', 'diarrhola55', 'diary_posts');
	if(mysqli_connect_errno()){
		echo "Not able to connect";
		$state = false;
	}
	$query = $handle->query("SELECT entry.id, entry.entry_title, entry.creation_date FROM entry INNER JOIN diaries ON entry.diary_id = diaries.id WHERE uid = '".$_POST['user_id']."' ORDER BY creation_date DESC");
	if($query){
		$result = array();
		while($row = $query->fetch_assoc()){
			array_push($result, $row);
		}
		echo json_encode($result);
	}
	$handle->close();
?>