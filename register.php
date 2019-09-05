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
							<div class='input_label'>Username</div>
							<input type="text" name="username" size="10" maxlength="50" />
						</div>
						<div class='input_row_container'>
							<div class='input_label'>Password</div>
							<input type="password" name="password" size="10" maxlength="50" />
						</div>
					</div>
					<div class='form_footer'>
						<input id='submit-register' type="submit" name="register" value="Register" />
					</div>
				</form>
			</div>
		</body>
	</html>