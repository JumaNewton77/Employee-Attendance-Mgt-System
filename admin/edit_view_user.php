

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
  require_once "../Connect.php";
  
  // Escape variables for security
  $fullname = $conn->real_escape_string($_POST['fullname']);
  $personalnumber = $conn->real_escape_string($_POST['personalnumber']);
  $email = $conn->real_escape_string($_POST['email']);
  $address = $conn->real_escape_string($_POST['address']);
  $phone = $conn->real_escape_string($_POST['phone']);
  $street = $conn->real_escape_string($_POST['street']);
  $city = $conn->real_escape_string($_POST['city']);
  $department = $conn->real_escape_string($_POST['department']);
  $ethnicity = $conn->real_escape_string($_POST['etninic']); 
  $dob = $conn->real_escape_string($_POST['dob']);

  // First, check if the personal number exists
  $checkSql = "SELECT * FROM employee WHERE personalnumber = ?";
  $checkStmt = $conn->prepare($checkSql);
  $checkStmt->bind_param('s', $personalnumber);
  $checkStmt->execute();
  $result = $checkStmt->get_result();
  
  if ($result->num_rows === 0) {
      echo "<script>alert('User Is NOT RECOGNIZED.'); window.history.back();</script>";
  } else {
      // Personal number exists, proceed to update
      $sql = "UPDATE employee SET 
          fullname = ?, 
          email = ?, 
          address = ?, 
          phone = ?, 
          street = ?, 
          city = ?, 
          department = ?, 
          etninic = ?, 
          dob = ?
          WHERE personalnumber = ?";

      $stmt = $conn->prepare($sql);
      $stmt->bind_param('ssiiissssi', $fullname, $email, $address, $phone, $street, $city, $department, $ethnicity, $dob, $personalnumber);
      //$stmt->bind_param('ssssssssss', $fullname, $email, $address, $phone, $street, $city, $department, $ethnicity, $dob, $personalnumber);

      if ($stmt->execute()) {
          // Redirect or notify of success as needed
          header('Location: ../admin/employee_details.php');
          exit();
      } else {
          echo "Error updating record.";
      }
  }
  $stmt->close();
  $checkStmt->close();
} else {
  echo "Invalid request.";
}
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Update Employee</title>
    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, p { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Arial, sans-serif;
      font-size: 14px;
      color: #666;
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
            text-decoration: none;
        }
        .homeblack:hover, .homered:hover {
            color: #ddd; 
        }
        .homered {
            color: #ff4500; 
        }
        #navli a:hover{
            border-radius: 5px;
            background-color: goldenrod;
            justify-content: space-between;
            padding: 10px 2px;
            text-decoration: none;
        }


.main-block {
    background-color: #fff;
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    box-shadow: 0 2px 5px rgba(0,0,0.2,0.1);
}

form h1 {
    text-align: center;
    margin-bottom: 20px;
}

fieldset {
    border: 2px solid green;
    padding: 10px;
    margin-bottom: 20px;
}

legend h3 {
    color: #333;
}

.account-details, .personal-details {
    display: grid;
    flex-direction: column;
    /* grid-template-columns: repeat(2, 1fr); */
    gap: 20px;
    margin-bottom: 20px;
}

.account-details div, .personal-details div {
    display: grid;
    flex-direction: column;
    align-items:center;
}

label {
    /* font-weight: bold; */
    margin-bottom: 5px;
}

input[type="text"],
input[type="date"],
select {
    padding: 10px;
    border: 2px solid #ccc;
    border-radius: 5px;
    margin-bottom: 10px; /* Space between input fields */
}

input[type="text"]:focus,
input[type="date"]:focus,
select:focus {
    border-color: #007bff;
    outline: none;
}

.form-group {
    display: flex;
    flex-direction: column;
}
      button {
      width: 20%;
      padding: 10px ;
      margin-left: 40%;
      border-radius: 5px; 
      border: none;
      background: #8ebf42; 
      font-size: 14px;
      font-weight: 600;
      color: #fff;
      }
      button:hover {
      background: goldenrod;
      }
      @media (min-width: 568px) {
      .account-details >div, .personal-details >div {
      width: 50%;
      }
      label {
      width: 40%;
      }
      input {
      width: 40%;
      }
      }

      .button-container {
            position: fixed; /* or 'absolute' depending on use case */
            top: 6px;
            right: 5px;
            padding: 10px;
        }
    .btn {
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
    .btn:hover { background-color: violet }
    .btn a {
        color: white; 
        text-decoration: none;  
        display: block;  
    }

    </style>
  </head>
  <body>
  <header>
		<nav>
            <div class="logo"><a href="../home.html">EAMS</a></div>
			<!-- <h1>EAMS</h1> -->
			<ul id="navli">
				<li><a class="homeblack" href="../Home.html">Home</a></li>
				<li><a class="homeblack" href="#setting">Services</a></li>
				<li><a class="homered" href="../contact.html">Contact Us</a></li>
                <li><a class="homeblack" href="#login">Notification</a></li>
				<!-- <li><a class="homeblack" href="../logout.php">LOG OUT</a></li> -->
			</ul>
            <div class="button-container" style="float: right;">  
                <a href="../logout-user.php" class="btn btn-light">Logout</a>  
            </div>
		</nav>
	</header>
    <div class="main-block">
    <form action="edit_view_user.php" method="post">
      <h1>Update Account</h1>
      <fieldset>
        <legend>
          <h3>Personal Details</h3>
        </legend>
        <div  class="account-details">
          <div><label>Full Name</label><input type="text" required name="fullname" required></div>
          <div><label>Personal Number</label><input type="text" required name="personalnumber" required></div>
          <div><label>Email</label><input type="text" required name="email" required></div>
        </div>
      </fieldset>
      <fieldset>
        <legend>
          <h3>Other Details</h3>
        </legend>
        <div  class="personal-details">
          <div>
            <div><label>Address</label><input type="text" required name="address" required></div>
            <div><label>Phone</label><input type="text" required name="phone" required></div>
            <div><label>Street</label><input type="text" required name="street"></div>
            <div><label>City</label><input type="text" required name="city" required></div>

            <div class="form-group">
              <label for="department">Department</label>  
                <select name="department" id="department" required>
                <option  value="" disabled selected>Select Department</option>
                  <option value="ICT">ICT</option>
                  <option value="Finance">Finance</option>
                  <option value="Administration">Administration</option>
                  <option value="Human Resource">Human Resource</option>
                  <option value="Marketing">Marketing</option>
                  <option value="Research">Research</option>
                </select>
            </div>
            <div class="form-group">
             <label for="etninic">Ethinicity</label>             
                <select name="etninic" id="ethinic" required>
                <option  value="" disabled selected>Select Ethinicity</option>
                 <option value="luhya">Luhya</option>
                 <option value="kikuyu">Kikuyu</option>
                 <option value="kalenjin">Kalenjin</option>
                 <option value="meru">Meru</option>
                 <option value="kamba">Kamba</option>
                 <option value="turkana">Turkana</option>
                 <option value="masaai">Maasai</option>
                </select>
            </div>
            <div class="form-group date">
              <label for="date">Date of Birth</label>
              <input type="date" required name="dob" id="date" placeholder="Date of Birth">
            </div>
          </div>
        </div>
      </fieldset>
      <button type="submit" href="/">Submit</button>
    </form>
    </div> 

   
  </body>
</html>
