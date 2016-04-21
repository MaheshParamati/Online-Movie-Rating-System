<?php


	if (isset($_POST["submit"])) {
		$name = $_POST['name'];
		$pass = $_POST['password'];
		$email = $_POST['email'];
		$phone = $_POST['phone'];
		
 if($name && $pass && $email && $phone){
	// require("connect.php");
	$pass=md5(md5("safe".$pass."password"));
	 $con=mysqli_connect("localhost", "root", "root","project_database");
	 $query=mysqli_query($con,"SELECT * FROM userstable WHERE user_name='$name'");
			$numrows=mysqli_num_rows($query);
			if($numrows>0){
				echo "User Name with those credentials already exist.";
			}
			else{
			$sql="INSERT INTO userstable (user_name,password,email_id,phonenumber) VALUES ('$name','$pass','$email','$phone')";
			//echo"iam here1";
			$query=mysqli_query($con,$sql);
			//echo"iam here2";
			if ($query) {
				
				header('Location: /login.php');
			} else {
				echo "Error: " . $sql . "<br>" . $conn->error;
			}
			}
			mysqli_close($con);
			
			}
			else
			echo "One or more fields are missing. $form";
	}
	else
		echo $form;
 
	
	
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Bootstrap contact form with PHP example by BootstrapBay.com.">
    <meta name="author" content="BootstrapBay.com">
	<script src="jquery-1.9.1.min.js"></script>
	<script src="validate.js"></script>
	<meta charset="utf-8">
	<link rel="stylesheet" href="validate.css">
    <title>SIGN UP</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css">
  </head>
  <body>
  	<div class="container">
  		<div class="row">
  			<div class="col-md-6 col-md-offset-3">
  				<h1 class="page-header text-center">Sign UP for Movie Rating System</h1>
				<form class="form-horizontal" role="form" method="post" action="sample.php">
					<div class="form-group">
						<label for="name" class="col-sm-2 control-label">Name</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="name" name="name" placeholder="First & Last Name" value="<?php echo htmlspecialchars($_POST['name']); ?>">
							<?php echo "<p class='text-danger'>$errName</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="pass" class="col-sm-2 control-label">Password</label>
						<div class="col-sm-10">
							<input type="password" class="form-control" id="password" name="password" placeholder="Password">
							<?php echo "<p class='text-danger'>$errPassword</p>";?>
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label">Email</label>
						<div class="col-sm-10">
							<input type="email" class="form-control" id="email" name="email" placeholder="example@domain.com" value="<?php echo htmlspecialchars($_POST['email']); ?>">
							<?php echo "<p class='text-danger'>$errEmail</p>";?>
						</div>
					</div>
				
					<div class="form-group">
						<label for="phone" class="col-sm-2 control-label">Phone Number</label>
						<div class="col-sm-10">
							<input type="text" class="form-control" id="phone" name="phone" placeholder="Phone Number">
							<?php echo "<p class='text-danger'>$errPhone</p>";?>
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<input id="submit" name="submit" type="submit" value="SIGN UP" class="btn btn-primary">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-10 col-sm-offset-2">
							<?php echo $result; ?>	
						</div>
					</div>
				</form> 
			</div>
		</div>
	</div>   
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>