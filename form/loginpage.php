<html>

<head>
	<title>Login</title>
	<link rel="stylesheet" type="text/css" href="loginpage.css">
	<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
	<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
	<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<meta charset="UTF-8">
  <meta name="viewport" content="width=1, initial-scale=0.45">

</head>

<body>
	<div class="wrapper fadeInDown">
		<div id="formContent">
			<br>
			<div class="fadeIn first">
				LOGIN
			</div>
			<br>
			<form method="post" action="">
				<input type="text" id="login" class="fadeIn second" name="username" placeholder="User Name" required>
				<input id="password" class="fadeIn third" name="password" placeholder="Password" type="password"  required>
				<input type="submit" class="fadeIn fourth" value="Log In" name="submit" id="submit">
			</form>
		</div>
	</div>

	<?php
	session_start();
	$host = "localhost";
	$user = "root";
	$password = "";
	$db = "mgb";
	$connection = mysqli_connect($host, $user, $password, $db);
	if (!$connection) {
		die("Connection failed: " . mysqli_connect_error());
	}
	if (isset($_POST['submit'])) {
		$username = mysqli_real_escape_string($connection, $_POST['username']);
		$password = mysqli_real_escape_string($connection, $_POST['password']);
		if ($username != "" && $password != "") {
			$query = "select count(*) as cntUser from users where username='" . $username . "' and password='" . $password . "'";
			$result = mysqli_query($connection, $query);
			$row = mysqli_fetch_array($result);
			$count = $row['cntUser'];
			if ($count > 0) {
				$_SESSION['uname'] = $username;
				header('Location: mgbit.php');
			} else {
				echo "<script>alert('Incorrect account or password'); </script>";
				exit();
			}
		}
	}
	?>
</body>


</html>

