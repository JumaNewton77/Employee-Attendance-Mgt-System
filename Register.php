
<?php require_once "controllerUserData.php"; ?>
<?php //require_once ($_SERVER['DOCUMENT_ROOT'] . 'controllerUserData.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Register.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="">../Register.js</script>
    <title>Register</title>
</head>
<body>
  <header class="head">
		<nav class="header">
       <div class="logo"><a href="departmentdb.php">EAMS</a></div>
			<!-- <h1>EAMS</h1> -->
			<ul id="navlii">
				<li><a class="homeblack" href="home.html">Home</a></li>
				<li><a class="homeblack" href="#setting">Services</a></li>
				<li><a class="homered" href="contact.html">Contact Us</a></li>
        <li><a class="homeblack" href="login.html">Notification</a></li>
				<li><a class="homeblack" href="logout.php">LOG OUT</a></li>
			</ul>
		</nav>
	</header>
     <!-- REGISTRATION FORM -->
     <div>
        <form method="post" action="Register.php">
     <h2>Add Employee</h2>
     <?php
                    if(count($errors) == 1){
                        ?>
                        <div class="alert alert-danger text-center">
                            <?php
                            foreach($errors as $showerror){
                                echo $showerror;
                            }
                            ?>
                        </div>
                        <?php
                    }elseif(count($errors) > 1){
                        ?>
                        <div class="alert alert-danger">
                            <?php
                            foreach($errors as $showerror){
                                ?>
                                <li><?php echo $showerror; ?></li>
                                <?php
                            }
                            ?>
                        </div>
                        <?php
                    }
                    ?>
     <div class="form-group fullname">
       <label for="fullname">Full Name</label>
       <input type="text" name="fullname" id="fullname" placeholder="Full name">
     </div>
     <div class="form-group personalnumber">
       <label for="personalnumber">Personal Number</label>
       <input type="text" name="personalnumber" id="personalnumber" placeholder="Personal Number">
     </div>
     <div class="form-group email">
       <label for="email">Email Address</label>
       <input type="text" name="email" id="email" placeholder="Email address">
       <p id="email-error" style="color: red; display: none;">Enter a valid email.</p>

     </div>
     <div class="form-group date">
       <label for="date">Date of Birth</label>
       <input type="date" name="dob" id="date" placeholder="Date of Birth">
     </div>
     <script>
       // Date Validate
       document.addEventListener("DOMContentLoaded", function() {
      var today = new Date().toISOString().split('T')[0];
  
      document.getElementById("date").setAttribute("max", today);
      //document.getElementById("date").setAttribute("min", today);
});
    </script>
     <div class="form-group gender">
       <label for="gender">Gender</label>
       <select name="gender" id="gender">
         <option value="" selected disabled>Gender</option>
         <option value="Male">Male</option>
         <option value="Female">Female</option>
       </select>
     </div>
     <div class="form-group password">
       <label for="password">Password</label>
       <input type="password" name="password" id="password" placeholder="Password">
       <i id="pass-toggle-btn" class="fa-solid fa-eye" onclick="togglePasswordVisibility()"></i>
       <div id="password-strength"></div>
     </div>
     <div class="form-group password">
      <label for="password">Confirm Password</label>
      <input type="password" name="cpassword" id="password" placeholder="Repeat Password">
      <i id="pass-toggle-btn" class="fa-solid fa-eye" onclick="togglePasswordVisibility()"></i>
      <div id="password-strength"></div>
    </div>
     <div class="form-group submit-btn">
       <input id="button" type="submit" value="Submit" name="submit">
     </div>
   </form>
   </div>


<script>
    document.getElementById('password').addEventListener('input', function() {
    const password = this.value;
    const strengthText = checkPasswordStrength(password);
    document.getElementById('password-strength').textContent = `${strengthText}`;
});
 
function checkPasswordStrength(password) {
    let strength = 0;
    if (password.length >= 8) strength += 1;
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) strength += 1;
    if (password.match(/([0-9])/)) strength += 1;
    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) strength += 1;
    if (password.length >= 6) strength += 1;

    switch (strength) {
        case 0:
        case 1:
            return 'Very Weak';
        case 2:
            return 'Weak';
        case 3:
            return 'Good';
        case 4:
            return 'Strong';
        case 5:
            return 'Very Strong';
        default:
            return 'Unknown';
    }
}
// Validating Email
function validateEmail() {
      const emailInput = document.getElementById('email');
      const emailError = document.getElementById('email-error');
      const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
      if (regex.test(emailInput.value)) {
          emailError.style.display = 'none';
          return true;
      } else {
          emailError.style.display = 'block';
          return false;
      }
  }
  document.getElementById('email').addEventListener('input', validateEmail);

// DATE OF BIRTH HANDLER
window.onload = function() {
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1;
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd;
    }
    if (mm < 10) {
        mm = '0' + mm;
    }
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("date").setAttribute("max", today);
}


// Function to toggle password visibility
function togglePasswordVisibility() {
    const passwordInput = document.getElementById('password');
    const toggleBtn = document.getElementById('pass-toggle-btn');
    const isPasswordVisible = passwordInput.type === 'text';
    
    passwordInput.type = isPasswordVisible ? 'password' : 'text';
    toggleBtn.classList.toggle('fa-eye', isPasswordVisible);
    toggleBtn.classList.toggle('fa-eye-slash', !isPasswordVisible);
}


$(document).ready(function () {
        var today = new Date();
        $('.form-group date').datepicker({
            format: 'mm-dd-yyyy',
            autoclose:true,
            endDate: "today",
            maxDate: today
        }).on('changeDate', function (ev) {
                $(this).datepicker('hide');
            });


        $('.form-group date').keyup(function () {
            if (this.value.match(/[^0-9]/g)) {
                this.value = this.value.replace(/[^0-9^-]/g, '');
            }
        });
    });
   // Selecting form and input elements
const form = document.querySelector("form");
const passwordInput = document.getElementById("password");
const passToggleBtn = document.getElementById("pass-toggle-btn");
// Function to display error messages
const showError = (field, errorText) => {
   field.classList.add("error");
   const errorElement = document.createElement("small");
   errorElement.classList.add("error-text");
   errorElement.innerText = errorText;
   field.closest(".form-group").appendChild(errorElement);
}
// Function to handle form submission
const handleFormData = (e) => {
   e.preventDefault();
   // Retrieving input elements
   const fullnameInput = document.getElementById("fullname");
   const personalnumberInput = document.getElementById("personalnumber")
   const emailInput = document.getElementById("email");
   const dateInput = document.getElementById("date");
   const genderInput = document.getElementById("gender");

   // Getting trimmed values from input fields
   const fullname = fullnameInput.value.trim();
   const personalnumber = personalnumberInput.value.trim();
   const email = emailInput.value.trim();
   const password = passwordInput.value.trim();
   const date = dateInput.value;
   const gender = genderInput.value;

   // Regular expression pattern for email validation
   const emailPattern = /^[^ ]+@[^ ]+\.[a-z]{2,3}$/;
   document.querySelectorAll(".form-group .error").forEach(field => field.classList.remove("error"));
   document.querySelectorAll(".error-text").forEach(errorText => errorText.remove());
   if (fullname === "") {
       showError(fullnameInput, "Enter your full name");
   }
   if (personalnumber === "") {
       showError(personalnumberInput, "Enter your personal number")
   }
   if (!emailPattern.test(email)) {
       showError(emailInput, "Enter a valid email address");
   }
   if (password === "") {
       showError(passwordInput, "Enter your password");
   }
   if (date === "") {
       showError(dateInput, "Select your date of birth");
   }
   if (gender === "") {
       showError(genderInput, "Select your gender");
   }
   // Checking for any remaining errors before form submission
   const errorInputs = document.querySelectorAll(".form-group .error");
   if (errorInputs.length > 0) return;
   form.submit();
}n
passToggleBtn.addEvetListener('click', () => {
   passToggleBtn.className = passwordInput.type === "password" ? "fa-solid fa-eye-slash" : "fa-solid fa-eye";
   passwordInput.type = passwordInput.type === "password" ? "text" : "password";
});
form.addEventListener("submit", handleFormData);
</script>
</body>
</html>

