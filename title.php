<?php

	$sqlHandler = new mysqli('localhost','diarrhea', 'diarrhola55', 'diary_posts');
	if(mysqli_connect_errno()){
		echo "Not able to connect";
		$state = false;
		echo json_encode("Generic Diary");
	}
	$query = $sqlHandler->query("SELECT name FROM diaries WHERE id = '".$_POST['diary_id']."'");
	if($query){
		$res = $query->fetch_assoc();
		echo json_encode($res['name']);
	}
	else{
		echo json_encode("Generic Diary");
	}
	$sqlHandler->close();
?>