
<?php 
        if (isset($_GET['edit'])) {
                $id = $_GET['edit'];
                $update = true;
                $record = mysqli_query($db, "SELECT * FROM employee WHERE employee_id=$id");

                if (count($record) == 1 ) {
                        $n = mysqli_fetch_array($record);
                        $full_name = $n['fullname'];
                        $personal_number = $n['personalnumber'];
                        $email = $n['email'];
                        $gender = $n['gender'];
                        $date_of_birth = $n['dob'];
                }
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Employee Details</title>
    <link rel="stylesheet" href=".css">
    <style>
      body{
            background-image: gold;
            background-size: cover;
        }

        body, h1, ul, li, a {
            margin: 0;
            padding: 0;
            text-decoration: none;
        }
        body {
            font-family: Arial, sans-serif;
        }
        h2 {
            font-size: 25px;
            color: green; 
            text-align: center;
        }
        header {
            background-color:gold;
            color: white;
            padding: 20px;
            position: sticky;
            top: 0;  
            z-index: 1000;
         }
        nav {
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
        #navli {
            list-style: none;  
            display: flex;
            justify-content: flex-end; 
        }
        #navli li {
            margin-left: 20px; 
        }
        #navli a {
            color: white; 
            text-decoration: none;
            transition: color 0.3s ease-in-out;
        }
        .homeblack:hover, .homered:hover {
            color: #ddd; 
        }
        .homered {
            color: #ff4500; 
        }
        #navli a:hover{
            background-color: goldenrod;
            border-radius: 5px;
            justify-content: space-between;
            padding: 10px 2px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            text-align: left;
            padding: 8px;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #f5f5f5;
        }
        .btn-info, .btn-danger {
            margin-right: 5px;
        }
        .material-icons {
            vertical-align: bottom;
        }
 
        .button-container {
            position: fixed; /* or 'absolute' depending on use case */
            top: 6px;
            right: 5px;
            padding: 10px;
        }
       header .button-container{
        display: inline-block;
        padding: 10px 20px;
        font-size: 16px;
        cursor: pointer;
        text-align: center;
        text-decoration: none;
        outline: none;
        color: white;
        background-color: blue;
        border: none;
        border-radius: 5px;
        box-shadow: 0 2px green;
    }
    header .button-container:hover { background-color: violet }
    header .button-container a {
        color: white; 
        text-decoration: none;  
        display: block;  
    }
    </style>
</head>

<body>
   <div>
    <main>
    <header>
		<nav>
            <div class="logo"><a href="../home.html">EAMS</a></div>
			<!-- <h1>EAMS</h1> -->
			<ul id="navli">
				<li><a class="homeblack" href="../home.html">Home</a></li>
				<li><a class="homeblack" href="#setting">Services</a></li>
				<li><a class="homered" href="../contact.html">Contact Us</a></li>
                <li><a class="homeblack" href="../login.html">Notification</a></li>
				<!-- <li><a class="homeblack" href="../logout.php">LOG OUT</a></li> -->
			</ul>
            <div class="button-container">  
                <a href="../logout-user.php" class="btn btn-light">Logout</a>  
            </div>
		</nav>
	</header>
        <div class="registration">
            <form action="registration_submit.php" method="post">
            <h1>Manage Employees</h1>

            </form>
            <br><br><br>
            <table class="table table-bordered table-hover table-striped">
            <!-- class="table table-striped" -->
    <tbody>
 
                  <h2>USER DETAILS</h2>

        <?php
            //include 'Connect.php';
            require_once ($_SERVER['DOCUMENT_ROOT'] . '/Employee/Connect.php');
            $query = "SELECT * FROM employee ORDER BY personalnumber ASC";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                // Start table
                echo "<table border='1'>";
                echo "<tr><th>Full Name</th>
                          <th>Personal Number</th>
                          <th>Email</th>
                          <th>Phone Number</th>
                          <th>Department</th>
                          <th>Gender</th>
                          <th>Ethnic</th>
                          <th>Actions</th>
                          </tr>";
            
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['fullname'] . "</td>";
                    echo "<td>" . $row['personalnumber'] . "</td>";
                    echo "<td>" . $row['email'] . "</td>";
                    echo "<td>" . $row['phone'] . "</td>";
                    echo "<td>" . $row['department'] . "</td>";
                    echo "<td>" . $row['gender'] . "</td>";
                    echo "<td>" . $row['etninic'] . "</td>";
                            echo "<td>
                <a class='btn btn-info btn-sm' href='edit_view_user.php?edit=" . $row['employee_id'] . "'>Edit</a>
                &nbsp;
                <a class='btn btn-danger btn-sm' href='delete_employee.php?delid=" . $row['employee_id'] . "' title='Delete' data-toggle='tooltip' onclick='return confirm(\"Do you really want to Delete ?\");'>
                    <i class='material-icons'>delete</i>
                </a>
              </td>";
                    echo "</tr>";
                }
            
                // End table
                echo "</table>";
            } else {
                echo "No users found";
            }
            
        ?>
    </tbody>
</table>

          </div>
    </main>
   </div>
   <script src="./javascript.js"></script>
   <script>
      function showDiv(divId, element) {
         document.getElementById(divId).style.display = element.value == "user" ? 'block' : 'none';
      }
   </script>

</body>
</html>
