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


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pending</title>
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

    <?php
$sql = "SELECT employee.fullname, leaves.checkoutdate, leaves.checkindate, leaves.reason
        FROM leaves
        
        INNER JOIN employee ON leaves.fullname = employee.employee_id

        WHERE leaves.status = 'pending'";

$result = $conn->query($sql);

 
if ($result->num_rows > 0) {

    echo "<table>";
    echo "<tr><th>Employee Name</th><th>Start Date</th><th>End Date</th><th>Reason</th></tr>";

    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['fullname'] . "</td>";
        echo "<td>" . $row['checkoutdate'] . "</td>";
        echo "<td>" . $row['checkindate'] . "</td>";
        echo "<td>" . $row['reason'] . "</td>";
        echo "</tr>";
    }

    
    echo "</table>";
} else {
    echo "No pending leaves found.";
}
 
$conn->close();
?>
</body>
</html>




