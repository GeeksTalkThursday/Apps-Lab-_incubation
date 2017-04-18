<?php
session_start();
include 'db.php';
if (!isset($_SESSION['userSession'])) {
	header("Location: log.php");
}
		$query = $MySQLi_CON->query("SELECT * FROM user WHERE email='$_SESSION[userSession]'");
          $row=$query->fetch_array();

          if (isset($_POST['btn-update'])) {
          	$phone = $MySQLi_CON->real_escape_string(trim($_POST['phone']));
          	$gender = $MySQLi_CON->real_escape_string(trim($_POST['gender']));
          	$department = $MySQLi_CON->real_escape_string(trim($_POST['department']));

          	$updateQuery1 = "UPDATE user SET phone='$phone', gender='$gender', department='$department' WHERE email='$_SESSION[userSession]'";
			if(mysqli_query($MySQLi_CON,$updateQuery1)){
				$message = "<div class='alert alert-success col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Details updated successfully </div>";
							header("refresh:3;update.php");
			} else {
				$message = "<div class='alert alert-danger col-md-10 col-sm-10 col-md-offset-1 col-sm-offset-1'>
							<span class='glyphicon glyphicon-info-sign'></span> &nbsp; Error occured. Try again! </div>";
			}

          }

?>
<!DOCTYPE html>
<html>
<head>
	<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css" />
	<title>Update</title>
</head>
<body>
	<h1>Update your info</h1>

	<h2>Name: <?php echo $row['name']; ?></h2> <span>Gender: <?php if($row['gender']=='') {echo 'Uknown';} else { echo $row['gender']; }?></span>
	<h3 class="text-primary">Email: <?php echo $row['email']; ?></h3>
	<h3 class="text-primary">Phone: <?php if($row['phone']=='') {echo 'NO Number yet';} else { echo $row['phone']; }?></h3>
	<h4 class="text-primary">Dept: <?php if($row['department']=='') {echo 'NOT selected yet '; } else { echo $row['department']; }?></h4>
	<?php 
		if (isset($message)) {
			echo $message;
		}
	?>
	<form method="post">
		<div class="container">
			<div class="form-group col-md-6 col-md-offset-3">
				<input type="text" class="form-control " name="name" value="<?php echo $row['name']; ?>" readonly />
				<input type="email" class="form-control " name="email" value="<?php echo $row['email']; ?>" readonly />
				<input type="number" class="form-control " name="phone" value="<?php echo $row['phone']; ?>" placeholder="Enter Phone No" required />
				<ul style="list-style: none;">
					<li>Male <input type="radio"  name="gender" <?php if($row['gender']=='Male'){ echo 'checked';}   ?> value="Male"  required /></li>
					<li>Female <input type="radio"  name="gender" <?php if($row['gender']=='Female'){ echo 'checked';}   ?> value="Female"  required /></li>
				</ul>
				<select name="department" class="form-control"  required >
					<option value="<?php echo $row['department']; ?>">Choose...</option>
					<option value="Math">Math</option>
					<option value="Bio">Bio</option>
					<option value="Che">Chem</option>
					<option value="Phy">Phy</option>
				</select>
				<input type="submit" class="btn btn-primary" name="btn-update" value="Update" /><br>

				<span><a href="acc.php">Home</a></span>
			</div ><br>
					
		</div>
	</form>
	
	</body>
</html>