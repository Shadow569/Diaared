<?php
	if(isset($_SESSION['session_id'])){
		header("location: index.php");
		exit();
	}

	$sqlHandler = new mysqli('localhost','diarrhea', 'diarrhola55', 'diary_posts');
	if(mysqli_connect_errno()){
		echo "Not able to connect";
		$state = false;
		header("location: login.php");
	}
	
	$user = $_POST['username'];
	$pass = md5($_POST['password']);
	$diary_title = $_POST['diary_title'];
	
	$query = $sqlHandler->query("INSERT INTO users(username, password) VALUES('".$user."','".$pass."')");
	if($query){
		$user_id = $sqlHandler->insert_id;
		$query2 = $sqlHandler->query("INSERT INTO diaries(uid, name) VALUES('".$user_id."','".$diary_title."')");
		if($query2){
			header("location: login.php");
			exit();
		}
		else{
			header("location: register.php");
			exit();
		}
	}
	else{
		header("location: register.php");
		exit();
	}
	$sqlHandler->close();
?>