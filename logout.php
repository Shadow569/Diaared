<?php
	session_start();
	$sqlHanlder = new mysqli('localhost','diarrhea', 'diarrhola55', 'diary_posts');
	if(mysqli_connect_errno()){
		echo "Not able to connect";
		$state = false;
	}
	$query = $sqlHanlder->query("DELETE FROM session WHERE id ='".$_SESSION['session_id']."'");
	if($query){
		unset($_SESSION['session_id']);
		unset($_SESSION['uid']);
		unset($_SESSION['diary_id']);
		header("location: login.php");
	}
	else{
		header("location: index.php");
	}
	$sqlHanlder->close();
?>
	