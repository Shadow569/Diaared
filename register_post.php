<?php
	if(isset($_SESSION['session_id'])){
		header("location: index.php");
		exit();
	}
	if(isset($_POST['log'])){
		header("location: login.php");
		exit();
	}
	if(isset($_POST['register'])){
		$sqlHandler = new mysqli('localhost','diarrhea', 'diarrhola55', 'diary_posts');
		if(mysqli_connect_errno()){
			echo "Not able to connect";
			$state = false;
			header("location: login.php");
		}
		
		$user = $_POST['username'];
		$pass = md5($_POST['password']);
		$diary_title = $_POST['diary_title'];
		$diary_color = $_POST['color'];
		
		$query = $sqlHandler->query("INSERT INTO users(username, password) VALUES('".$user."','".$pass."')");
		if($query){
			$user_id = $sqlHandler->insert_id;
			$query2 = $sqlHandler->query("INSERT INTO diaries(uid, name, color) VALUES('".$user_id."','".$diary_title."','".$diary_color."')");
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
	}
?>