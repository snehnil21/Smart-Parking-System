<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if(isset($_POST['login']))
  {
    $adminuser=$_POST['username'];
    $password=md5($_POST['password']);
    $query=mysqli_query($con,"SELECT ID from admin where  UserName='$adminuser' && Password='$password' ");
    $ret=mysqli_fetch_array($query);
    if($ret>0){
      $_SESSION['vpmsaid']=$ret['ID'];
     header('location:dashboard.php');
    }
    else{
    $msg="Login Failed !!";
    }
  }
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Vehicle Parking System</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
</head>
<body style="background-image:url('https://media.istockphoto.com/photos/dealer-new-cars-stock-picture-id480652712?b=1&k=20&m=480652712&s=170667a&w=0&h=dcmAjMGPXz8YFjCfhjJi8icIe-LGmOX6LuCaTXpyFJA=');background-repeat:no-repeat;background-size:cover;">
	<div class="row" >
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-5 col-md-offset-4">
				
		<div class="login-panel panel panel-default">
		<center><h2 style="color:black;padding-top:15px;"><b >Smart Parking Booking System</b></h2></center>
		
				<center><div class="panel-heading">Please Log In To Continue</div></center>
				<div class="panel-body">
					<form method="POST">
					<?php if($msg)
						echo "<div class='alert bg-danger' role='alert'>
						<em class='fa fa-lg fa-warning'>&nbsp;</em> 
						$msg
						<a href='#' class='pull-right'>
						<em class='fa fa-lg fa-close'>
						</em></a></div>" ?> 
                        

						<fieldset>
							<div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
							</div>
							<div class="checkbox">
								
								<a href="forgot-password.php" style="text-decoration:none;">Forgot Password?</a>
							</div>
							
							<button class="btn btn-success" type="submit" name="login">Admin Login</button>
							
						</fieldset>
					
							
						</form>
						<a href="userlogin.php" ><button class="btn btn-primary" style="margin-top:5px;">User Login</button></a>
				
				</div>
						
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
