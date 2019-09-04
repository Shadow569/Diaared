<?php	
	$state = true;
	$id = $_POST['identifier'];
	$handle = new mysqli('localhost','diarrhea', 'diarrhola55', 'diary_posts');
	if(mysqli_connect_errno()){
		echo "Not able to connect";
		$state = false;
	}
	$query = $handle->query("DELETE FROM entry WHERE id = '".$id."'");
	if($query){
		echo json_encode("success");
	}
	else{
		echo json_encode("fail");
	}
	$handle->close();
?>