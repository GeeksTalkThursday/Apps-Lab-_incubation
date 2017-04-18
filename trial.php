<?php
session_start();
require 'db.php';

if (isset($_SESSION['userSession'])) {
	header("Location: acc.php");
}
	// $a = 5;
	// $b = 8;
	// $sum = $a + $b;
	// echo "<div >
	// 		<h1>Calc </h1>
	// 		</p> $a added by $b equal to $sum </p>
	// 	</div>

	// ";

	//next line example
	// $name = "Emmanuel Magak \n Yule Msee";

	// $msg = "Email Sent!";

	/// addd 
// if(isset($_POST['btn-add']))
// {
// 	$first = ($_POST['first']);
// 	$second = ($_POST['second']);
// 		$added= $first + $second;

// 		$msg1="Sum = $added";


// }
if(isset($_POST['btn-sign'])){
	$name = $MySQLi_CON->real_escape_string(trim($_POST['name']));
	$email = $MySQLi_CON->real_escape_string(trim($_POST['email']));
	$password = $MySQLi_CON->real_escape_string(trim($_POST['password']));
	$password_again = $MySQLi_CON->real_escape_string(trim($_POST['password_again']));

	$new_pass = password_hash($password, PASSWORD_DEFAULT);
	//$n_pass = md5($password);

	if ($password != $password_again) {
		$message = "<p>Passwords do not match!</p>";
		$messo = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Passwords Do Not Match! </div>";
	}else {
		$check_email = $MySQLi_CON->query("SELECT email FROM user WHERE email='$email'");
		$count=$check_email->num_rows;
		if ($count==0) {
			$query = "INSERT INTO user(name,email,password) VALUES('$name','$email','$new_pass')";
			if($MySQLi_CON->query($query)){
				$message = "<p>Registration Successful. Log in</p>";
				$messo = "<div class='alert alert-success col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Registration Successful. Log in </div>";
				$_SESSION['userSession'] = $email;
				header("Location: acc.php");
			}else {
				$message = "<p>Error while registering</p>";
				$messo = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error while registering! </div>";
			}
		} else{
			$message = "<p>Email $email already exists !</p>";
			$messo = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Email $email already exists ! </div>";
		}

	
}
}

$MySQLi_CON->close();
?>
<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<title>php</title>
</head>
<body>
	<h1>Addtion</h1>
	<?php 
		if (isset($message)) {
			echo $message;
		}
	?>
	<form method="post">
		<div class="form-group col-md-8 col-md-offset-2">
			<input type="text" name="name" class="form-control" value="" placeholder="Enter Name" required />
			<input type="email" name="email" class="form-control" value="" placeholder="Enter Email" required />
			<input type="password" name="password" class="form-control" value="" placeholder="Enter Password" required />
			<input type="password" name="password_again" class="form-control" value="" placeholder="Confirm Password" required />
			<input type="submit" name="btn-sign" class="btn btn-warning" value="Sign Up" />
			<p>Already have an account?<a class="btn btn-success" href="log.php">Sign In</a></p>
		</div>
	</form>
			<?php 
		if (isset($messo)) {
			echo $messo;
		}
		?>
			
					
		
</body>
</html>