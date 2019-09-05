<!DOCTYPE html>
	<html>
		<head>
			<title>Please Sign-In</title>
			<link href="https://fonts.googleapis.com/css?family=Frank+Ruhl+Libre" rel="stylesheet">
			<link rel="stylesheet" type="text/css" href="assets/main.css" />
		</head>
		<body>
			<div class='login_container'>
				<div class='form_title'>Please Sign-In</div>
				<form action="login_post.php" method="POST">
					<div class='input_row_container'>
						<div class='input_label'>Username</div>
						<input type="text" name="username" size="10" maxlength="50" />
					</div>
					<div class='input_row_container'>
						<div class='input_label'>Password</div>
						<input type="password" name="password" size="10" maxlength="50" />
					</div>
					<div class='form_footer'>
						<input type="submit" name="login" value="Sign-In" />
					</div>
				</form>
			</div>
		</body>
	</html>
						
				