

<?php
// if ($_SERVER["REQUEST_METHOD"] == "POST") {

//   require_once "../Connect.php";

//   $department_name = $conn->real_escape_string($_POST['dptname']);
//   $department_email = $conn->real_escape_string($_POST['dptemail']);
//   $head_of_department = $conn->real_escape_string($_POST['dpthod']);
//   $department_code = $conn->real_escape_string($_POST['dptcode']);
//   $department_telephone = $conn->real_escape_string($_POST['dpttelephone']);
//   $department_location = $conn->real_escape_string($_POST['dptlocaton']);
  
//   // First, check if the department code exists
//   $checkSql = "SELECT * FROM department WHERE dptemail = ?";
//   $checkStmt = $conn->prepare($checkSql);
//   $checkStmt->bind_param('s', $department_email);
//   $checkStmt->execute();
//   $result = $checkStmt->get_result();
  
//   if ($result->num_rows === 0) {
//       echo "<script>alert('Department not recognized.'); window.history.back();</script>";
//   } else {
//       $sql = "UPDATE department SET 
//               dptname = ?, 
//               dptemail = ?, 
//               dpthod = ?, 
//               dpttelephone = ?, 
//               dptlocaton = ?
//               WHERE dptemail = ?";

//       $stmt = $conn->prepare($sql);
//       $stmt->bind_param('sssisi', $department_name, $department_email, $head_of_department, $department_telephone, $department_location, $department_code);

//       if ($stmt->execute()) {
//          header('Location: ../department/manage_dpt.php');
//         //header('Location: ../admin/employee_details.php');
//           exit();
//       } else {
//           echo "Error updating department details.";
//       }
//   }
//    $stmt->close();
//    $checkStmt->close();
// } else {
//   echo " ";
// }



if ($_SERVER["REQUEST_METHOD"] == "POST") {

  require_once "../Connect.php";

  $department_name = $conn->real_escape_string($_POST['dptname']);
  $department_email = $conn->real_escape_string($_POST['dptemail']);
  $head_of_department = $conn->real_escape_string($_POST['dpthod']);
  $department_code = $conn->real_escape_string($_POST['dptcode']);
  $department_telephone = $conn->real_escape_string($_POST['dpttelephone']);
  $department_location = $conn->real_escape_string($_POST['dptlocation']); // Corrected 'dptlocaton' typo

  // First, check if the department code exists
  $checkSql = "SELECT * FROM department WHERE dptname = ?";
  $checkStmt = $conn->prepare($checkSql);
  if (!$checkStmt) {
      echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
      exit;
  }
  $checkStmt->bind_param('s', $department_name);
  $checkStmt->execute();
  $result = $checkStmt->get_result();

  if ($result->num_rows === 0) {
      echo "<script>alert('Department not recognized.'); window.history.back();</script>";
  } else {
      $updateSql = "UPDATE department SET dptname = ?, dptemail = ?, dpthod = ?, dpttelephone = ?, dptlocaton = ? WHERE dptname = ?";
      $updateStmt = $conn->prepare($updateSql);
      if (!$updateStmt) {
          echo "Prepare failed: (" . $conn->errno . ") " . $conn->error;
          exit;
      }
      $updateStmt->bind_param('sssiss', $department_name, $department_email, $head_of_department, $department_telephone, $department_location, $department_code);

      if ($updateStmt->execute()) {
          header('Location: ../department/manage_dpt.php');
          exit();
      } else {
          echo "Error updating department details: " . $updateStmt->error;
      }
      $updateStmt->close();
  }
  $checkStmt->close();
} else {
  echo "Invalid request method.";
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <title>Edit Department</title>
</head>
<style>
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

    .get-in-touch {
  max-width: 800px;
  margin: 50px auto;
  position: relative;

}
.get-in-touch .title {
  text-align: center;
  text-transform: uppercase;
  letter-spacing: 3px;
  font-size: 30px;
  line-height: 48px;
  padding-bottom: 48px;
  color: green;
}

.contact-form .form-field {
  position: relative;
  margin: 32px 0;
}
.contact-form .input-text {
  display: block;
  width: 100%;
  height: 36px;
  border-width: 0 0 2px 0;
  border-color: green;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
}
.contact-form .input-text:focus {
  outline: none;
}
.contact-form .input-text:focus + .label,
.contact-form .input-text.not-empty + .label {
  -webkit-transform: translateY(-24px);
          transform: translateY(-24px);
}
.contact-form .label {
  position: absolute;
  left: 20px;
  bottom: 11px;
  font-size: 18px;
  line-height: 26px;
  font-weight: 400;
  color: green;
  cursor: text;
}
.contact-form .submit-btn {
  display: inline-block;
  background-color: goldenrod;
  border-radius: 5px;
 /* background-image: linear-gradient(125deg,#a72879,#064497); */
  color: #fff;
  text-transform: uppercase;
  letter-spacing: 2px;
  font-size: 16px;
  padding: 8px 16px;
  border: none;
  width:200px;
  cursor: pointer;
}
.contact-form .submit-btn:hover{
    background-color: green
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

<section class="get-in-touch">
   <h1 class="title">Update Department Details</h1>
   <form class="contact-form row" action="edit_dpt.php" method="post">
      <div class="form-field col-lg-6">
         <input id="dptname" name="dptname" class="input-text js-input" type="text" required>
         <label class="label" for="dptname">Department Name</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="dptemail" name="dptemail" class="input-text js-input" type="dptemail" required>
         <label class="label" for="dptemail"> Department E-mail</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="dpthod" name="dpthod" class="input-text js-input" type="text" required>
         <label class="label" for="dpthod">Head of Name</label>
      </div>
       <div class="form-field col-lg-6 ">
         <input id="dptcode" name="dptcode" class="input-text js-input" type="text" required>
         <label class="label" for="code">Department Code</label>
      </div>
      <div class="form-field col-lg-6 ">
         <input id="dpttelephone" name="dpttelephone" class="input-text js-input" type="text" required>
         <label class="label" for="dpttelephone">Telephone Number</label>
      </div>
       <div class="form-field col-lg-6 ">
         <input id="dptlocation" name="dptlocation" class="input-text js-input" type="text" required>
         <label class="label" for="dptlocation">Department Location</label>
      </div>
      <!-- <div class="form-field col-lg-12">
         <input id="message" class="input-text js-input" type="text" required>
         <label class="label" for="message">Message</label>
      </div> -->
      <div class="form-field col-lg-12">
         <input class="submit-btn" type="submit" value="Submit">
      </div>
   </form>
</section>


  <script>
       // Date Validate
       document.addEventListener("DOMContentLoaded", function() {
      var today = new Date().toISOString().split('T')[0];
  
      document.getElementById("date").setAttribute("max", today);
      //document.getElementById("date").setAttribute("min", today);
});
</script>

</body>
</html>
