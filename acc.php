<?php
session_start();
include 'db.php';
if (!isset($_SESSION['userSession'])) {
	header("Location: log.php");
}
//include 'log.php';

		$query = $MySQLi_CON->query("SELECT * FROM user WHERE email='$_SESSION[userSession]'");
          $row=$query->fetch_array();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>Account</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<div class="col-md-10 ">
			<h1>Account Here....</h1>
			<h2>Name: <?php echo $row['name']; ?></h2> <span class="text-success">Gender: <?php if($row['gender']=='') {echo 'Uknown';} else { echo $row['gender']; }?></span>
	<h3 class="text-primary">Email: <?php echo $row['email']; ?></h3>
	<h3 class="text-warning">Phone: <?php if($row['phone']=='') {echo 'NO Number yet';} else { echo $row['phone']; }?></h3>
	<h4 class="text-danger">Dept: <?php if($row['department']=='') {echo 'NOT selected yet '; } else { echo $row['department']; }?></h4>
			<span><a class="btn btn-success" href="update.php">Update info</a></span><br><br>
			<span>You can<a class="btn btn-danger" href="logout.php">Logout</a>here</span>
		</div>
	</div>
</body>
</html>