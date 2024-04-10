<?php
session_start();

// Check if the user is an admin
// if (!isset($_SESSION['is_admin']) || $_SESSION['is_admin'] !== true) {
//     header("Location: login.php");
//     exit();
// }

require_once "../Connect.php";

// Retrieve active employee sessions (clocked in)
$sql = "SELECT e.fullname, e.personalnumber, e.department, es.start_time, es.start_time
        FROM employee_sessions es
        JOIN employee e ON es.employee_id = e.employee_id
        WHERE es.end_time IS NULL
        ORDER BY es.start_time DESC";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Active Employee Sessions</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table th, .table td {
            vertical-align: middle;
        }
        .table thead th {
            background-color: #4da64d;
            color: #fff;
        }
        .table tbody tr:hover {
            background-color: #f8f9fa;
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
</head>
<body>
<header>
        <nav>
            <div class="logo"><a href="../home.php">EAMS</a></div>
            <ul id="navli">
                <li><a class="homeblack" href="../home.php">Home</a></li>
                <li><a class="homeblack" href="services.html">Services</a></li>
                <li><a class="homered" href="contact.html">Conduct Us</a></li>
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
    <div class="container mt-4">
        <h1 class="mb-4 text-center">Active Employee</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>P.Number</th>
                    <th>Department</th>
                    <th>Clock In</th>
                    <th>Attendance Date</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) { ?>
                        <tr>
                            <td><?php echo $row['fullname']; ?></td>
                            <td><?php echo $row['personalnumber']; ?></td>
                            <td><?php echo $row['department']; ?></td>
                            <td><?php echo $row['start_time']; ?></td>
                            <td><?php echo $row['start_time']; ?></td>
                        </tr>
                    <?php }
                } else { ?>
                    <tr>
                        <td colspan="5" class="text-center">No active employee sessions found.</td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>