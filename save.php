<?php	
	$state = true;
	date_default_timezone_set('Europe/Athens');
	$handle = new mysqli('localhost','diarrhea', 'diarrhola55', 'diary_posts');
	if(mysqli_connect_errno()){
		echo "Not able to connect";
		$state = false;
	}
	$date = date("Y-m-d");
	$title = $_POST['name'];
	$diary = $_POST['diary_id'];
	$body = $_POST['content'];
	$time = date("H:i") . ":00";
	$query = $handle->query("INSERT INTO entry(entry_title, entry_body, diary_id, creation_date, creation_time) VALUES('".$title."','".$body."', '".$diary."', '".$date."','".$time."')");
	$json = "";
	if($query){
		$json = array('status' => 'success', 'title' => $title, 'date' => $date);
	}
	else{
		$json = array('status'=>'fail');
	}
	$handle->close();
	echo json_encode($json);
?>
	
	