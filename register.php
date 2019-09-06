<!DOCTYPE html>
	<html>
		<head>
			<title>Please Register</title>
			<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="assets/main.css" />
		</head>
		<body>
			<div class='login_container'>
				<div class='form_title'>Please Register</div>
				<form action="register_post.php" method="POST">
					<div class='form'>
						<div class='input_row_container'>
							<div class='input_label'>Diary Title</div>
							<input type="text" name="diary_title" size="10" maxlength="50" />
						</div>
						<div class='input_row_container'>
							<div class='input_label'>Diary Color</div>
							<select name='color' class='dropdown-color'>
								<option value='red'>Red</option>
								<option value='green'>Green</option>
								<option value='blue'>Blue</option>
								<option value='brown'>Brown</option>
								<option value='purple'>Purple</option>
								<option value='yellow'>Yellow</option>
								<option value='orange'>Orange</option>
								<option value='cyan'>Cyan</option>
								<option value='pink'>Pink</option>
								<option value='black'>Black</option>
							</select>
						</div>
						<div class='input_row_container'>
							<div class='input_label'>Username</div>
							<input type="text" name="username" size="10" maxlength="50" />
						</div>
						<div class='input_row_container'>
							<div class='input_label'>Password</div>
							<input type="password" name="password" size="10" maxlength="50" />
						</div>
					</div>
					<div class='form_footer'>
						<input id='submit-register' type="submit" name="register" value="Register	➡" />
						<input id='login' class='btn-register' type="submit" name="log" value="⬅	Back to Login" />
					</div>
				</form>
			</div>
		</body>
	</html>