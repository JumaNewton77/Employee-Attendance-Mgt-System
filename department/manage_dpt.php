

<?php 
        if (isset($_GET['edit'])) {
                $id = $_GET['edit'];
                $update = true;
                $record = mysqli_query($db, "SELECT * FROM depatment WHERE dpt_id=$id");

                if (count($record) == 1 ) {
                        $n = mysqli_fetch_array($record);
                        $department_name = $n['dptname'];
                        $head_of_department = $n['dpthod'];
                        $department_email = $n['dptemail'];
                        $department_address = $n['dptaddress'];
                        $date_creadted = $n['dptdate'];
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
 

    </style>
</head>

<body>
   <div>
    <main>
    <header>
		<nav>
            <div class="logo"><a href="Home.html">EAMS</a></div>
			<!-- <h1>EAMS</h1> -->
			<ul id="navli">
				<li><a class="homeblack" href="../Home.html">Home</a></li>
				<li><a class="homeblack" href="#setting">Services</a></li>
				<li><a class="homered" href="contact.html">Contact Us</a></li>
                <li><a class="homeblack" href="login.html">Notification</a></li>
				<li><a class="homeblack" href="logout.php">LOG OUT</a></li>
			</ul>
		</nav>
	</header>
        <div class="registration">
            <!-- <form action="registration_submit.php" method="post">
            <h1>Manage Department</h1>

            </form> -->
            <br><br>
            <table class="table table-striped">

    <tbody>
 
                  <h2>DEPARTMENT DETAILS</h2>

        <?php
            //include 'Connect.php';
            require_once ($_SERVER['DOCUMENT_ROOT'] . '/Employee/Connect.php');
            $query = "SELECT * FROM department ORDER BY dptdate ASC";
            $result = $conn->query($query);

            if ($result->num_rows > 0) {
                // Start table
                echo "<table border='1'>";
                echo "<tr><th>Department Name</th>
                          <th>Head of Department</th>
                          <th>Telephone Number</th>
                          <th>Department Email</th>
                          <th>Date Created</th>
						  <th>Location</th>
                          <th>Actions</th>
                          </tr>";
            
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['dptname'] . "</td>";
                    echo "<td>" . $row['dpthod'] . "</td>";
                    echo "<td>" . $row['dptextnum'] . "</td>";
                    echo "<td>" . $row['dptemail'] . "</td>";
                    echo "<td>" . $row['dptdate'] . "</td>";
					echo "<td>" . $row['dptlocaton'] . "</td>";
                            echo "<td>
                <a class='btn btn-info btn-sm' href='edit_dpt.php?edit=" . $row['dpt_id'] . "'>Edit</a>
                &nbsp;
                <a class='btn btn-danger btn-sm' href='delete_dpt?delid=" . $row['dpt_id'] . "' title='Delete' data-toggle='tooltip' onclick='return confirm(\"Do you really want to Delete ?\");'>
                    <i class='material-icons'>delete</i>
                </a>
              </td>";
                    // echo "<td>
                    //         <a class='btn btn-info btn-sm' href='edit_view_user.php?edit_id=" . $row['id'] . "'>Edit</a>
                    //         &nbsp;
                    //         <a class='btn btn-danger btn-sm' href='index.php?delid=" . $row['id'] . "' title='Delete' data-toggle='tooltip' onclick='return confirm(\"Do you really want to Delete ?\");'>
                    //             <i class='material-icons'>delete</i>
                    //         </a>
                    //       </td>";
                    echo "</tr>";
                }
            
                // End table
                echo "</table>";
            } else {
                echo "Deparment Don't Exist";
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
