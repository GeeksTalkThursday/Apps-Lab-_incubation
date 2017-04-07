<?php 
include'db.php';

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

	// $msg = "Email sent";

// if(isset($_POST['btn-add']))
// {
// 	$first = ($_POST['first']);
// 	$second = ($_POST['second']);
// 		$added= $first + $second;

// 		$msg1="Sum = $added";

if(isset($_POST['btn-submit'])){
$name=$MySQLi_CON->real_escape_string(trim($_POST['name']));
$Email=$MySQLi_CON->real_escape_string(trim($_POST['Email']));
$password=$MySQLi_CON->real_escape_string(trim($_POST['password']));
$password_again=$MySQLi_CON->real_escape_string(trim($_POST['password_again']));

$query="INSERT INTO user(Name,Email,password)VALUES('$name','$Email','$password')";
$query1=$MySQLi_CON->query($query);}
?>
<!DOCTYPE html>
<html>
<head>
	<title>php</title>
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
</head>
<body>
	<h1>Addtion</h1>
	<form method="post">
		<input type="text" name="name" value="" placeholder="Enter name" required />
		<input type="Email" name="Email" value="" placeholder="Enter Email" required />
		<input type="password" name="password" value="" placeholder="Enter password" required />
		<input type="password" name="password_again" value="" placeholder="confirm password" required />
		<input type="submit" name="btn-submit" value="submit" />
	</form>
		
	 <?php 
          // echo $msg1;
        ?> 
		
<div class='alert alert-success col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
					<span class='glyphicon glyphicon-info-sign'></span> &nbsp; <?php //echo $msg;?>
				</div>
</body>
</html>