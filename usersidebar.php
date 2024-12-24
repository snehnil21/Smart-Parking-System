<div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar">
		<div class="profile-sidebar">
			<div class="profile-userpic">
				<img src="https://www.w3schools.com/howto/img_avatar.png" width="50" class="img-responsive" alt="Icon">
			</div>
			<div class="profile-usertitle">
				<div class="profile-usertitle-name">User</div>
				<div class="profile-usertitle-status"><span class="indicator label-success"></span>Online</div>
			</div>
			<div class="clear"></div>
		</div>
		<div class="divider"></div>

		<ul class="nav menu">
			<li class="<?php if($page=="dashboard") {echo "active";}?>"><a href="userdashboard.php"><em class="fa fa-dashboard">&nbsp;</em> Dashboard</a></li>
			
            <li class="<?php if($page=="manage-vehicles") {echo "active";}?>"><a href="manage-user-vehicles.php"><em class="fa fa-car">&nbsp;</em> Vehicle Entry</a></li>

			<li><a href="uservehicledetails.php"><em class="fa fa-history">&nbsp;</em> History</a></li>



			<li ><a href="feedbackform.php"><em class="fa fa-comments-o">&nbsp;</em> Feedback</a></li>

			
		</ul>
		
	</div><!--/.sidebar-->