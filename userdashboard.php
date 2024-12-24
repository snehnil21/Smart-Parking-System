<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
error_reporting(0);
if (strlen($_SESSION['vpmsaid']==0)) {
  header('location:logout.php');
  } else{ ?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>VPS</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
	<!--[if lt IE 9]>
	<script src="js/html5shiv.js"></script>
	<script src="js/respond.min.js"></script>
	<![endif]-->
	<style>
		#greeting {
			font-size : 60px;
			margin-top : 190px;
			display : flex;
			justify-content : center;
			align-items : center;
		}
	</style>
</head>
<body>
        <?php include 'usernavigation.php' ?>
	
        <?php
		$page="dashboard";
		include 'usersidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="#">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">Dashboard</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header" id="greeting"><?php include 'usergreetings.php'?></h1>
			</div>
		</div><!--/.row-->
		
		
		
		<?php 

		include 'includes/dbconn.php';
		 $ret=mysqli_query($con,"SELECT count(ID) id1 from vehicle_info where Status=''");
		 $row5=mysqli_fetch_array($ret);
		 
		 $ret=mysqli_query($con,"SELECT count(ID) id2 from vehicle_info where Status='Out'");
		  $row6=mysqli_fetch_array($ret);

		  $ret=mysqli_query($con,"SELECT count(ID) as id1 from vehicle_info where VehicleCategory='Two Wheeler'");
		$row=mysqli_fetch_array($ret);  
             
		$ret=mysqli_query($con,"SELECT count(ID) as id2 from vehicle_info where VehicleCategory='Four Wheeler'");
		$row2=mysqli_fetch_array($ret); 

		$ret=mysqli_query($con,"SELECT count(ID) as id4 from vehicle_info where VehicleCategory='Three Wheeler'");
		$row4=mysqli_fetch_array($ret);
		
		?>

        <?php include 'includes/footer.php'?>
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script src='https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.2.2/Chart.min.js'></script>
	<script>
		window.onload = function () {
	// var chart1 = document.getElementById("line-chart").getContext("2d");
	// window.myLine = new Chart(chart1).Line(lineChartData, {
	// responsive: true,
	// scaleLineColor: "rgba(0,0,0,.2)",
	// scaleGridLineColor: "rgba(0,0,0,.05)",
	// scaleFontColor: "#c5c7cc"
	// });

	var ctx = document.getElementById("myChart").getContext('2d');
	var myChart = new Chart(ctx, {
	type: 'pie',
	data: {
	labels: ["Vehicle In-Time","Vehicle Out-Time"],
	datasets: [{
	backgroundColor: ["#30a5ff","#33cccc"],
	data: [<?php echo $row5['id1']; ?>,<?php echo $row6['id2']; ?>]
	}]
	}
	});

	var ctx = document.getElementById("myChart2").getContext('2d');
	var myChart = new Chart(ctx, {
	type: 'pie',
	data: {
	labels: ["Two Wheeler","Four Wheeler", "Three Wheeler"],
	datasets: [{
	backgroundColor: ["#f55d42","#f5c542", "#6b6b6b"],
	data: [<?php echo $row['id1']; ?>,
		   <?php echo $row2['id2']; ?>,
		   <?php echo $row4['id4']; ?>
		
		]
	}]
	}
	});


	};

	

	


	</script>

		
</body>
</html>

<?php } ?>