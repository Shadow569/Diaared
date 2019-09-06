<?php	
	$state = true;
	$id = $_POST['identifier'];
	$handle = new mysqli('localhost','diarrhea', 'diarrhola55', 'diary_posts');
	if(mysqli_connect_errno()){
		echo "Not able to connect";
		$state = false;
	}
	$query = $handle->query("SELECT entry_title, entry_body, creation_date FROM entry WHERE id = '".$id."'");
	if($query){
		$result = $query->fetch_assoc();
		$result['entry_body'] = nl2br($result['entry_body']);
		$result['creation_date'] = date("d-m-Y", strtotime($result['creation_date']));
		echo json_encode($result);
	}
	$handle->close();
?>