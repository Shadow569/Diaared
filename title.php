<?php

	$sqlHandler = new mysqli('localhost','diarrhea', 'diarrhola55', 'diary_posts');
	if(mysqli_connect_errno()){
		echo "Not able to connect";
		$state = false;
		echo json_encode("Generic Diary");
	}
	$query = $sqlHandler->query("SELECT name,color FROM diaries WHERE id = '".$_POST['diary_id']."'");
	if($query){
		$res = $query->fetch_assoc();
		$arr = array();
		$arr['title'] = $res['name'];
		$arr['color'] = $res['color'];
		echo json_encode($arr);
	}
	else{
		$arr = array();
		$arr['title'] = "Generic Diary";
		$arr['color'] = "blue";
		echo json_encode($arr);
	}
	$sqlHandler->close();
?>