<?php
session_start();
include 'db.php';
if (isset($_SESSION['userSession'])) {
	header("Location: acc.php");
}


if (isset($_POST['btn-log'])) {
	$email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
	$password = $MySQLi_CON->real_escape_string(trim($_POST['password']));

	$query = $MySQLi_CON->query("SELECT * FROM user WHERE email='$email'");
	$row=$query->fetch_array();

	//for md5(); is as below
	// if ($password==md5($row['password'])) {
	// 	
	// }

	if(password_verify($password, $row['password']))
	{
		$_SESSION['userSession'] = $row['email'];
		header("Location: acc.php");
	} else{
			$message = "<p>Wrong pass or email </p>";
				$messo = "<div class='alert alert-success col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; wrong email or pass </div>";
	}
}

$MySQLi_CON->close();
?>
<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<title>log in</title>
</head>
<body>
	<h1>Addtion</h1>
	<?php 
		if (isset($message)) {
			echo $message;
		}
	?>
	<form method="post">
		<div class="container">
			<div class="form-group col-md-6 col-md-offset-3">
				<input type="email" class="form-control " name="email" value="" placeholder="Enter Email" required />
				<input type="password" class="form-control " name="password" value="" placeholder="Enter Password" required />
				<input type="submit" class="btn btn-primary btn-lg" name="btn-log" value="Sign In" />

				<p>Forgot Password?<a class="btn btn-warning btn-sm" href="reset.php">Reset</a>Pass</p>
				<p>Dont have an account?<a class="btn btn-success " href="trial.php">Sign Up</a></p>
			</div ><br>
					
		</div>
	</form>
	<?php 
		if (isset($messo)) {
			echo $messo;
		}
		?>
	</body>
</html>