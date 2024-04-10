<?php 
	include('inc/head.php'); 
	require_once ($_SERVER['DOCUMENT_ROOT'] . '../Employee/Connect.php');
	session_start();
	if (isset($_SESSION['email'])) {
		
	}
	else{
		header('location: ../Home.html');
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
        header .logo{
            display: flex;
            padding: 5px 40px;
            font-size: 35px;
        }
        header .logo a{
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
header .search_bar {
  position: fixed;  
  top: 9px;
  right: 120px;
  padding: 10px;
  height: 57px;
  max-width: 330px;
}
header .search_bar input {
  height: 100%;
  width: 100%;
  border-radius: 25px;
  font-size: 18px;
  outline: none;
  background-color: white;
  border: 1px solid green;
  padding: 0 20px;
}
.modal-xlg {
    max-width: 90%;
    max-width: 1200px; 
}
	</style>
<header>
        <nav>
            <div class="logo"><a href="http://localhost/Employee/Home.html">EAMS</a></div>
            <ul id="navli">
                <li><a class="homeblack" href="http://localhost/Employee/Home.html">Home</a></li>
                <li><a class="homeblack" href="http://localhost/Employee/services.html">Services</a></li>
                <li><a class="homered" href="http://localhost/Employee/contact.html">Conduct Us</a></li>
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

	<!--This is section-->
	<section id="sections" class="py-4 mb-4 bg-faded">
		<div class="container">
			<div class="row">
				<div class="col-md"></div>
				<div class="col-md-2">
					<a href="#" class="btn btn-warning btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addPostModal"><i class="fa fa-spinner"></i> Pending Leaves</a>
				</div>
				<div class="col-md-2">
					<a href="#" class="btn btn-success btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addCateModal"><i class="fa fa-check"></i> Approved</a>
				</div>
				<div class="col-md-2">
					<a href="#" class="btn btn-primary btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addUsertModal"><i class="fa fa-th"></i> Total Leaves</a>
				</div>
				<div class="col-md-2">
					<a href="#" class="btn btn-danger btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#addEmpModal"><i class="fa fa-users"></i> View Department</a>
				</div>
				<div class="col-md-2">
					<a href="#" class="btn btn-info btn-block" style="border-radius:0%;" data-toggle="modal" data-target="#viewEmpModal"><i class="fa fa-eye"></i> View Employees</a>
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
								<th>P.Number</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Department</th>
								<th>From</th>
								<th>To</th>
								<th>Reason</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM leaves ORDER BY fullname DESC";
									$que = mysqli_query($conn,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
										
									?>

									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['fullname']; ?></td>
									 <td><?php echo $result['personalnumber']; ?></td>
									 <td><?php echo $result['phonenumber']; ?></td>
									 <td><?php echo $result['email']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
							 		<td><?php echo $result['checkoutdate']; ?></td>
									 <td><?php echo $result['checkindate']; ?></td>
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
	
    <!-- Header Post -->
	<div class="modal fade" id="addPostModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-warning text-white">
					<div class="modal-title">
						<h5>Pending</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>#</th>
								<th>Name</th>
								<th>P.Number</th>
								<th>Department</th>
								<th>Reason</th>
								<th>Status</th>
								<th>Action</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM leaves WHERE status = 0";
									$que = mysqli_query($conn,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['fullname']; ?></td>
									 <td><?php echo $result['personalnumber']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
							 		<td><?php echo $result['reason']; ?></td>
							 		<td>
							 			<?php 
							 			if ($result['status'] == 0) {
							 				echo "Pending";
							 				?>
							 				</td>
							 		<td>
							 			<form action="accept.php?leave_id=<?php echo $result['leave_id']; ?>" method="POST">
							 				<input type="hidden" name="appid" value="<?php echo $result['leave_id']; ?>">
							 				<input type="submit" class="btn btn-sm btn-success" name="approve" value="Approve">
							 			</form>
							 		</td>
							 				<?php
							 			}
							 			else{
							 				echo "Approved";
							 			}
							 	$cnt++;	}
							 		 ?>
							 		
							 	</tr>

							 </tbody>
						</table>
					
				</div>
				
			</form>
			</div>
		</div>
	</div>
	 
	<div class="modal fade" id="addCateModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-success text-white">
					<div class="modal-title">
						<h5>Approved Leaves</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th></th>
								<th>Name</th>
								<th>Department</th>
								<th>Date</th>
								<th>Reason</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM leaves WHERE status = 1";
									$que = mysqli_query($conn,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
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
	<div class="modal fade" id="addUsertModal">
		<div class="modal-dialog modal-xlg">
			<div class="modal-content">
				<div class="modal-header bg-primary text-white">
					<div class="modal-title">
						<h5>Total Leaves</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
							    <th>#</th>
								<th>Name</th>
								<th>P.Number</th>
								<th>Phone</th>
								<th>Email</th>
								<th>Department</th>
								<th>From</th>
								<th>To</th>
								<th>Reason</th>
								<th>Status</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM leaves ORDER BY leave_id DESC";
									$que = mysqli_query($conn,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>

									
							 	<tr>
									<!-- <td><?php// echo $cnt;?></td> -->
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['fullname']; ?></td>
									<td><?php echo $result['personalnumber']; ?></td>
									<td><?php echo $result['phonenumber']; ?></td>
									<td><?php echo $result['email']; ?></td>
							 		<td><?php echo $result['department']; ?></td>
							 		<td><?php echo $result['checkoutdate']; ?></td>
									<td><?php echo $result['checkindate']; ?></td>
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


	<!-- View Department Modal -->
	<div class="modal fade" id="addEmpModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-danger text-white">
					<div class="modal-title">
						<h5>View Department</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>#</th>
								<th>Dpt Name</th>
								<th>H.O.D</th>
								<th>Dpt Email</th>
								<th>Dpt Location</th>
								<th>Action</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM department";
									$que = mysqli_query($conn,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>									
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['dptname']; ?></td>
							 		<td><?php echo $result['dpthod']; ?></td>
							 		<td><?php echo $result['dptemail']; ?></td>
									<td><?php echo $result['dptlocaton']; ?></td>
									<td><a href="deletedpt.php?dpt_id=<?php echo $result["dpt_id"]; ?>"><button type="button" class="btn btn-danger" style="border-radius:0%;">Delete</button></a></td>
							 	</tr>
							 </tbody>
							 <?php $cnt++; }?>
						</table>
			</div>
		</div>
	</div>


	<!-- View Employee Modal -->
	<div class="modal fade" id="viewEmpModal">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header bg-info text-white">
					<div class="modal-title">
						<h5>Employees List</h5>
					</div>
					<button class="close" data-dismiss="modal"><span>&times;</span></button>
				</div>
				<div class="modal-body">
				<table class="table table-bordered table-hover table-striped">
							<thead>
								<th>#</th>
								<th>Name</th>
								<th>Email</th>
								<th>Department</th>
								<th>Action</th>
							</thead>
							 <tbody>
							 	<?php 
									$sql = "SELECT * FROM employee";
									$que = mysqli_query($conn,$sql);
									$cnt = 1;
									while ($result = mysqli_fetch_assoc($que)) {
									?>		
							 	<tr>
									<td><?php echo $cnt;?></td>
							 		<td><?php echo $result['fullname']; ?></td>
							 		<td><?php echo $result['email']; ?></td>
									 <td><?php echo $result['department']; ?></td>
									 <td><a href="deletemp.php?employee_id=<?php echo $result["employee_id"]; ?>"><button type="button" class="btn btn-danger" style="border-radius:0%;">Delete</button></a> </td>
							 	</tr>
							 </tbody>
							 <?php $cnt++; }?>
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
 
 ?>
