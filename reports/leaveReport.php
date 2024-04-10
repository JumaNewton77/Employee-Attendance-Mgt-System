<?php
	//include('inc/head.php'); 
	require_once ($_SERVER['DOCUMENT_ROOT'] . '../Employee/Connect.php');
	session_start();
	if (isset($_SESSION['email'])) {
		
	}
	else{
		header('location: ../Home.html');
	}


$sql = "SELECT employee.fullname, leaves.checkoutdate, leaves.checkindate, leaves.reason, leaves.status
        FROM leaves
        INNER JOIN employee ON leaves.personalnumber = employee.employee_id
        ORDER BY leaves.status";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Leave Management General Report</title>
    <link rel="stylesheet" href="">
    <style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f4f4f4;  
}
header {
    background-color: gold;
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
  top: 10px;
  right: 160px;
  padding: 5px;
  height: 37px;
  width: 170px;
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


table {
    width: 90%;
    margin: 20px auto;
    border-collapse: collapse;
}

table, th, td {
    border: 1px solid #ccc;
}

th, td {
    padding: 10px;
    text-align: left;
}

th {
    background-color: #4CAF50;
    color: white;
}

tr:nth-child(even) {
    background-color: #f2f2f2;
}

a {
    color: #333;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

h1, h2 {
    color: #333;
    text-align: center;
}

h1 {
    margin-top: 20px;
}

    </style>
</head>
<body>
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

    <h1>Leave Management General Report</h1>

    <h2>Pending Leaves</h2>
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
									$sql = "SELECT * FROM leaves WHERE status = 0 ORDER BY fullname DESC";
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
     

    <h2>Approved Leaves</h2>
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
									$sql = "SELECT * FROM leaves WHERE status = 1 ORDER BY fullname DESC";
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
    <h2>Declined Leaves</h2>
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
									$sql = "SELECT * FROM leaves WHERE status = 0 ORDER BY fullname DESC";
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
							 			if ($result['status'] == "") {
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
    <script src="script.js"></script>
</body>
</html>

<?php
$conn->close();