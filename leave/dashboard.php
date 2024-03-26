<?php 
	include('../Connect.php'); 
	//require_once ($_SERVER['DOCUMENT_ROOT'] . '/Employee/Connect.php');
	include('inc/head.php'); 
	session_start();

	if (isset($_SESSION['email'])) {
		
	}
	else{
		header('location:home.php');
	}

?>
<body>
	 
 <style>
	header {
            background-color:gold;
            color: white;
            padding: 20px;
            position: sticky;
            top: 0;  
            z-index: 1000;
         }
       header nav {
            width: 90%;
            margin: 0 auto;
        }
        .logo{
            display: flex;
            padding: 5px 40px;
            font-size: 35px;
        }
        .logo a{
            text-decoration: none;
            color: rgb(28, 215, 34);
            text-size-adjust: 30px;
            font-family: Arial, Helvetica, sans-serif;
            background: linear-gradient(rgb(248, 7, 7), purple);
           -webkit-text-fill-color: transparent;
           -webkit-background-clip: text;
        }
       header #navli {
            list-style: none;  
            display: flex;
            justify-content: flex-end; 
        }
		header #navli li {
            margin-left: 20px; 
        }
		header #navli a {
            color: white; 
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }
		header #navli a:hover{
            background-color: goldenrod;
            justify-content: space-between;
            padding: 10px 2px;
            border-radius: 5px;
        }
header .button-container {
  position: fixed; 
  top: 6px;
  right: 5px; 
  padding: 10px;
}
header .btn {
display: inline-block;
padding: 10px 20px;
font-size: 16px;
cursor: pointer;
text-align: center;
text-decoration: none;
outline: none;
color: white;
background-color: goldenrod;
border: none;
border-radius: 5px;
box-shadow: 0 2px green;
}
header .btn:hover { background-color: gold }
header .btn a {
color: white; 
text-decoration: none;  
display: block;  
}
.search_bar {
  position: fixed;  
  top: 9px;
  right: 120px;
  padding: 10px;
  height: 57px;
  max-width: 330px;
}
.search_bar input {
  height: 100%;
  width: 100%;
  border-radius: 25px;
  font-size: 18px;
  outline: none;
  background-color: white;
  border: 1px solid green;
  padding: 0 20px;
}
 </style>
	<header>
        <nav>
            <div class="logo"><a href="../home.php">EAMS</a></div>
            <ul id="navli">
                <li><a class="homeblack" href="../home.php">Home</a></li>
                <li><a class="homeblack" href="services.html">Services</a></li>
                <li><a class="homered" href="contact.html">Contact Us</a></li>
                <li><a class="homeblack" href="#">Notification</a></li>
            </ul>
            <div class="button-container" style="float: right;">  
                <a href="logout-user.php" class="btn btn-light">Logout</a>  
            </div>
            <div class="search_bar">
                <input type="text" placeholder="Search" />
            </div>
        </nav>
    </header>
	 
	<section id="sections" class="py-4 mb-4 bg-faded">
		<div class="container">
			<div class="row">
				<div class="col-md"></div>
				<div class="col-md-3">
				<!-- data-toggle="modal" data-target="#addPostModal" -->
					<a href="../leave/appyleave.php" class="btn btn-primary btn-block" style="border-radius:0%;"><i class="fa fa-plus"></i> Apply Leave</a>  
				</div>
				<div class="col-md-3">
					<a href="#" class="btn btn-warning btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addCateModal"><i class="fa fa-spinner"></i> Pendings</a>
				</div>
				<div class="col-md-3">
					<a href="#" class="btn btn-success btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addUsertModal"><i class="fa fa-check"></i> Approved Leaves</a>
				</div>
				<div class="col-md"></div>
			</div>
		</div>
	
	</section>
	 
	<section id="post">
		<div class="container">
			<div class="row">
			<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>#</th>
								<th>Name</th>
								<th>Personal Number</th>
								<th>Phone Number</th>
								<th>Department</th>
								<th>From</th>
								<th>To</th>
								<th>Reason</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									//$sql = "SELECT * FROM leaves WHERE email=''".$_SESSION['email']."'";
									$sql = "SELECT * FROM leaves WHERE email='" . $_SESSION['email'] . "'";
									$stmt = mysqli_query($conn,$sql);
									$cnt=1;
									while ($result = mysqli_fetch_assoc($stmt)) {
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['fullname']; ?></td>
							 		<td><?php echo $result['personalnumber']; ?></td>
									 <td><?php echo $result['phonenumber']; ?></td>
									 <td><?php echo $result['department']; ?></td>
									 <td><?php echo $result['checkoutdate']; ?></td>
									 <td><?php echo $result['checkindate']; ?></td>
							 		<!-- <td><?php //echo $result['checkoutdate']; ?></td> -->
							 		<td><?php echo $result['reason']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
							 				echo "<span class='badge badge-warning'>Pending</span>";
							 			}
							 			else{
							 				echo "<span class='badge badge-success'>Approved</span>";
							 			}
							 	$cnt++;	}
							 		 ?>
							 		</td>
							 	</tr>

							 </tbody>
						</table>
			</div>
		</div>
	</section>
	<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
	<!----Section3 footer ---->
	 <!----Section3 footer ---->
	<!----Section3 footer ---->
	<!----Section3 footer ---->
	
	 
	<div class="modal fade" id="addCateModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-warning text-white">
					<div class="modal-title">
						<h5>Pending Leaves</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>#</th>
								<th>Name</th>
								<th>Department</th>
								<th>Leave Date</th>
								<th>Reason</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM leaves WHERE status = 0 && email='".$_SESSION['email']."'";
									$stmt = mysqli_query($con,$sql);
									$cnt=1;
									while ($result = mysqli_fetch_assoc($stmt)) {
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['fullname']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
							 		<td><?php echo $result['checkoutdate']; ?></td>
							 		<td><?php echo $result['reason']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
											echo "<span class='badge badge-warning'>Pending</span>";
							 			}
							 			else{
											echo "<span class='badge badge-success'>Approved</span>";
							 			}
							 	$cnt++;	}
							 		 ?>
							 		</td>
							 	</tr>

							 </tbody>
						</table>
					
				</div>
				
			</div>
		</div>
	</div>
	<!-- User Modal -->
	<div class="modal fade" id="addUsertModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success text-white">
					<div class="modal-title">
						<h5>Total Approved Leaves</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>#</th>
								<th>Name</th>
								<th>Department</th>
								<th>Leave Date</th>
								<th>Reason</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM leaves WHERE status = 1 AND email='".$_SESSION['email']."'";
									$stmt = mysqli_query($con,$sql);
									$cnt=1;
									while ($result = mysqli_fetch_assoc($stmt)) {
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['fullname']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
							 		<td><?php echo $result['checkoutdate']; ?></td>
							 		<td><?php echo $result['reason']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
											echo "<span class='badge badge-warning'>Pending</span>";
							 			}
							 			else{
											echo "<span class='badge badge-success'>Approved</span>";
							 			}
							 	$cnt++;	}
							 		 ?>
							 		</td>
							 	</tr>

							 </tbody>
						</table>
				</div>
				
			</div>
		</div>
	</div>
  
  
  <script src="js/jquery.min.js"></script>
  <script src="js/tether.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="https://cdn.ckeditor.com/4.9.1/standard/ckeditor.js"></script>
  <script>
	CKEDITOR.replace('editor1');
  </script>
</body>
</html>
<?php 
	// if (isset($_POST['apply'])){
	// 	$name = $_POST['fullname'];
	// 	$email = $_POST['email'];
	// 	$department = $_POST['department'];
	// 	$leavedate = $_POST['checkoutdate'];
	// 	$editor1 = $_POST['editor1'];
	// 	$status = $_POST['status'];

	// 	$sql = "INSERT INTO leaves(fullname,email,department,checkoutdate,reason,status)VALUES('$name','$email','$department','$leavedate','$editor1','$status')";

	// 	$run = mysqli_query($con,$sql);

	// 	if($run == true){
			
	// 		echo "<script> 
	// 				alert('Leave Requested, Please wait for approval status');
	// 				window.open('dashboard.php','_self');
	// 			  </script>";
	// 	}else{
	// 		echo "<script> 
	// 		alert('Failed To Apply');
	// 		</script>";
	// 	}
	// }
	
 ?>