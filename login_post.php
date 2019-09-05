<?php
if(isset($_POST['login'])){
	session_start();
	if(isset($_SESSION['session_id'])){
		header("location: index.php");
		exit();
	}
	$name = $_POST['username'];
	$password = md5($_POST['password']);
	
	$sqlHandler = new mysqli('localhost','diarrhea', 'diarrhola55', 'diary_posts');
	if(mysqli_connect_errno()){
		echo "Not able to connect";
		$state = false;
	}
	
	$query = $sqlHandler->query("SELECT id, username, password FROM users WHERE users.username = '".$name."'");
	if($query){
		$result = $query->fetch_assoc();
		if($result && ($result['password'] == $password)){
			$_SESSION['uid'] = $result['id'];
			$query = $sqlHandler->query("INSERT INTO session(uid) VALUES ('".$_SESSION['uid']."')");
			$_SESSION['session_id'] = $sqlHandler->insert_id;
			$query = $sqlHandler->query("SELECT id FROM diaries WHERE uid = '".$_SESSION['uid']."'");
			if($query){
				$result = $query->fetch_assoc();
				$_SESSION['diary_id'] = $result['id'];
			}
			else{
				$query = $sqlHandler->query("DELETE FROM session WHERE id = '".$_SESSION['session_id']."'");
				unset($_SESSION['session_id']);
				unset($_SESSION['uid']);
				header("location: login.php");
			}
				
			header("location: index.php");
		}
		else{
			header("location: login.php");
			exit();
		}
	}
	else{
		header("location: login.php");
		exit();
	}
	$sqlHandler->close();
}

if(isset($_POST['reg'])){
	header("location: register.php");
	exit();
}

?>