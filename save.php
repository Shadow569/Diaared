<?php	
	$state = true;
	$handle = new mysqli('localhost','diarrhea', 'diarrhola55', 'diary_posts');
	if(mysqli_connect_errno()){
		echo "Not able to connect";
		$state = false;
	}
	$date = date("Y-m-d");
	$title = $_POST['name'];
	$body = $_POST['content'];
	$query = $handle->query("INSERT INTO entry(entry_title, entry_body, creation_date) VALUES('".$title."','".$body."','".$date."')");
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
	
	