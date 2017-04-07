<?php
include"sum.php"
?>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Addition sample</title>
	</head>
	<body>                                        
                              <h1>Our Basic Calculator</h>
                               <form method="POST">
                                       <input type="text" name="first"/> 
                                       <input type="text" name="second"/>
                                        <input type="submit" name="send"/>
                               </form>

                                                      <div class="col-md-12" >
							<div class="col-md-7">
								<form method="post">
									<div class="form-group col-md-10 col-md-offset-1">
										<Label class"label">Name</Label>
										<input type="text" name="name" class="form-control" placeholder="Enter your Name" required/>
									</div>
									<div class="form-group col-md-10 col-md-offset-1">
										<Label class"label">Location</Label>
										<input type="text" name="location" class="form-control" placeholder="Enter your Location" required/>
									</div>
									<div class="form-group col-md-10 col-md-offset-1">
										<Label class"label">Message</Label>
										<textarea class="form-control" name="message"  required/> 
 
											
										</textarea>
									</div>
"<?php echo $msg;?>"
										<div class="col-md-8 col-md-offset-2"> 
											<div class="form-group col-md-6 ">
												<input type="reset" name"reset" class="btn btn-success" value="RESET" />
											</div>
											<div class="form-group col-md-6 ">
												<input type="submit" name"btn-submit" class="btn btn-primary" value="SEND" />
											</div>
										</div>
								</form>
							</div>



</body>
</html>