<?php
    session_start();
    error_reporting(0);
    include('includes/dbconn.php');
    if (strlen($_SESSION['vpmsaid']==0)) {
        header('location:logout.php');
        } else {
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>VPS</title>
	<link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet">
    <link href="css/datatable.css" rel="stylesheet">
	<link href="css/datepicker3.css" rel="stylesheet">
	<link href="css/styles.css" rel="stylesheet">
	
	<!--Custom Font-->
	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

</head>
<body>
        <?php include 'usernavigation.php' ?>
	
		<?php
		$page="in-vehicle";
		include 'usersidebar.php'
		?>
		
	<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
		<div class="row">
			<ol class="breadcrumb">
				<li><a href="userdashboard.php">
					<em class="fa fa-home"></em>
				</a></li>
				<li class="active">History Of Parking</li>
			</ol>
		</div><!--/.row-->
		
		<div class="row">
			<div class="col-lg-12">
				<!-- <h1 class="page-header">Vehicle Management</h1> -->
			</div>
		</div><!--/.row-->
		
		<div class="row">
				<div class="col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">History Of Parking</div>
						<div class="panel-body">
                        <table id="example" class="table table-striped table-hover table-bordered" style="width:100%">
                        
        <thead>
            <tr>
                <th>#</th>
				<th>Date</th>
                <th>Vehicle No.</th>
                <th>Company</th>
                <th>Category</th>
                <th>Parking Number</th>
                <th>Vehicle's Owner</th>
				<th>Status Of Vehicle</th>
                

            </tr>
        </thead>
        <tbody>
        <?php
		
		$adminid=$_SESSION['vpmsaid'];
									$ret=mysqli_query($con,"SELECT * from signup where ID='$adminid'");
									$row11=mysqli_fetch_array($ret);
									$username = $row11['name'];
    
										

        $ret=mysqli_query($con,"SELECT * FROM vehicle_info WHERE OwnerName= '$username' ");
        $cnt=1;
        while ($row=mysqli_fetch_array($ret)) {

        ?>
   
            <tr>

			

            <td><?php echo $cnt;?></td>

			<td> <?php echo $row['InTime']; ?> </td>
                 
            <td><?php  echo $row['RegistrationNumber'];?></td>

            <td><?php  echo $row['VehicleCompanyname'];?></td>

            <td><?php  echo $row['VehicleCategory'];?></td>

            <td><?php  echo 'CA-'.$row['ParkingNumber'];?></td>

            <td><?php  echo $row['OwnerName'];?></td>

			<td> <?php 
			if($row['status']=='') {
				echo "In Vehicle";
			} else {
				echo "Out Vehicle";
			}
			?> </td>

            </tr>

                <?php $cnt=$cnt+1;}?>
 
        
        </tbody>

    </table>
						</div>
					</div>
				</div>
				
				
				
</div><!--/.row-->
		
		
		

        <?php include 'includes/footer.php'?>
	</div>	<!--/.main-->
	
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/chart.min.js"></script>
	<script src="js/chart-data.js"></script>
	<script src="js/easypiechart.js"></script>
	<script src="js/easypiechart-data.js"></script>
	<script src="js/jquery.dataTables.min.js"></script>
    <script src="js/dataTables.bootstrap4.min.js"></script>
	<script src="js/bootstrap-datepicker.js"></script>
	<script src="js/custom.js"></script>
	<script>
		window.onload = function () {
		var chart1 = document.getElementById("line-chart").getContext("2d");
		window.myLine = new Chart(chart1).Line(lineChartData, {
		responsive: true,
		scaleLineColor: "rgba(0,0,0,.2)",
		scaleGridLineColor: "rgba(0,0,0,.05)",
		scaleFontColor: "#c5c7cc"
		});
};
	</script>

    <script>
        $(document).ready(function() {
    $('#example').DataTable();
} );
    </script>
		
</body>
</html>

<?php }  ?>