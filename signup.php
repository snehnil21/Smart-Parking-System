<?php
session_start();
error_reporting(0);
include('includes/dbconn.php');

if(isset($_POST['signup']))
  {
    $name = $_POST['name'];
    $username = $_POST['username'];
    $email=$_POST['email'];
    $password=md5($_POST['password']);

    $query = "SELECT * from signup where name='$name' && username='$username' && email='$email'";
    $result = mysqli_query($con,$query);
    $result11 = mysqli_num_rows($result);
    if($result11==1) {
        echo("User Already Exit ! Login with another details");
    }
    else {
        $query1 = "INSERT into signup(name,username,email,password) values ('$name','$username','$email','$password') ";
        mysqli_query($con,$query1);
		// windows.alert($name);
        header('location:userlogin.php');
    }

    // $query=mysqli_query($con,"SELECT ID from admin where  UserName='$email' && Password='$password' ");
    // $ret=mysqli_fetch_array($query);
    // if($ret>0){
    //   $_SESSION['vpmsaid']=$ret['ID'];
    //  header('location:dashboard.php');
    // }
    // else{
    // $msg="Login Failed !!";
    // }
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
<body style="background-image:url('https://media.istockphoto.com/photos/empty-parking-lots-aerial-view-picture-id636444558?k=20&m=636444558&s=612x612&w=0&h=vGEMKjC8qy3ulA86ZdYNOeQ6vfBLMAEIaMCLulMlKQo=');background-repeat:no-repeat;background-size:cover;">
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-5 col-md-offset-4" >
		
			<div class="login-panel panel panel-default">
            <center><h2 style="color:black;padding-top:15px;"><b >Smart Parking Booking System</b></h2></center>
				
            <center><div class="panel-heading">Please Sign Up !</div></center>
				<div class="panel-body">
					<form method="POST"> 
						<fieldset>
                        <div class="form-group">
								<input class="form-control" placeholder="Name" name="name" type="text" required>
							</div>
                            <div class="form-group">
								<input class="form-control" placeholder="Username" name="username" type="text" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Email" name="email" type="text" required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Password" name="password" type="password" value="" required>
							</div>
							
							<button class="btn btn-primary" type="submit" name="signup">Sign Up</button></fieldset>
							<br>
							<div class="checkbox">
								
								<a href="userlogin.php" style="text-decoration:none;">Already have an Account? Sign IN</a>
							</div>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
	

<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
