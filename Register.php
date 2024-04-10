
<?php require_once "controllerUserData.php"; ?>
<?php //require_once ($_SERVER['DOCUMENT_ROOT'] . 'controllerUserData.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Register.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Register</title>
</head>
<body style="background-color: transparent;">
  <header class="head">
		<nav class="header">
       <div class="logo"><a href="../Employee/Home.html">EAMS</a></div>
			<!-- <h1>EAMS</h1> -->
			<ul id="navlii">
				<li><a class="homeblack" href="../Employee/Home.html">Home</a></li>
				<li><a class="homeblack" href="#setting">Services</a></li>
				<li><a class="homered" href="contact.html">Contact Us</a></li>
                <li><a class="homeblack" href="login.html">Notification</a></li>
				<li><a class="homeblack" href="logout.php">LOG OUT</a></li>
			</ul>
		</nav>
	</header>
     <!-- REGISTRATION FORM -->
     <div>
        <form method="post" action="Register.php" style="background-color: #e6e6e6;" >
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
     <script> 
     <div class="form-group date">
       <label for="date">Date of Birth</label>
       <input type="date" name="dob" id="date" placeholder="Date of Birth">
     </div>
     <script>
        //Date Validate
        document.addEventListener("DOMContentLoaded", function() {
        var today = new Date().toISOString().split('T')[0];
        document.getElementById("date").setAttribute("max", today);
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
       <i class="fa-solid fa-eye" onclick="togglePasswordVisibility('password')"></i> 
       <div id="password-strength"></div>
     </div>
     <div class="form-group password">
      <label for="password">Confirm Password</label>
      <input type="password" name="cpassword" id="confirmPassword" placeholder="Repeat Password">
     <i class="fa-solid fa-eye" onclick="togglePasswordVisibility('confirmPassword')"></i>
      <div id="password-strength"></div>
    </div>
     <div class="form-group submit-btn">
       <input id="button" type="submit" value="Submit" name="submit">
     </div>
   </form>
   </div>


<script>
document.addEventListener('DOMContentLoaded', function() {
  const form = document.querySelector('form');
  const fullnameInput = document.getElementById('fullname');
  const personalnumberInput = document.getElementById('personalnumber');
  // const emailInput = document.getElementById('email');
  const passwordInput = document.getElementById('password');
  const confirmPasswordInput = document.getElementById('confirmPassword');
  //const dateInput = document.getElementById('date');
  const genderInput = document.getElementById('gender');

  form.addEventListener('submit', function(event) {
    event.preventDefault();  
 
    clearErrors();
 
    let isValid = true;
    if (!validateFullName(fullnameInput.value)) {
      showError(fullnameInput, 'Enter Full Name.');
      isValid = false;
    }

    if (!validatePersonalNumber(personalnumberInput.value)) {
      showError(personalnumberInput, 'Must Be 6 Digits.');
      isValid = false;
    }

    // if (!validateEmail(emailInput.value)) {
    //   showError(emailInput, 'Enter valid email (example22@gmail.com).');
    //   isValid = false;
    // }

    if (!validatePassword(passwordInput.value)) {
      showError(passwordInput, 'Password must be at least 6 characters long and contain a combination of letters, numbers, and special characters.');
      isValid = false;
    }

    if (passwordInput.value !== confirmPasswordInput.value) {
      showError(confirmPasswordInput, 'Passwords do not match.');
      isValid = false;
    }

    if (!validateDate(dateInput.value)) {
      showError(dateInput, 'Please select date.');
      isValid = false;
    }

    if (genderInput.value === '') {
      showError(genderInput, 'Please select a gender.');
      isValid = false;
    }

    if (isValid) {
      form.submit();  
    }
  });
 
  function validateFullName(fullname) {
    return fullname.trim().length > 0;
  }

  function validatePersonalNumber(personalnumber) {
    const pattern = /^\d{6}$/;
    return pattern.test(personalnumber);
  }

  function validateEmail(email) {
    const pattern = /^[^\s@]+@(gmail|outlook|yahoo)\.com$/;
    return pattern.test(email);
  }

  function validatePassword(password) {
    const pattern = /^(?=.*[A-Za-z])(?=.*\d)(?=.*[@$!%*#?&])[A-Za-z\d@$!%*#?&]{6,}$/;
    return pattern.test(password);
  }

  function validateDate(date) {
    const today = new Date();
    const selectedDate = new Date(date);
    return selectedDate < today;
  }

  function togglePasswordVisibility(inputId) {
    var input = document.getElementById(inputId);
    if (input.type === "password") {
        input.type = "text";
    } else {
        input.type = "password";
    }
}

  function showError(input, message) {
    const formGroup = input.parentElement;
    const errorElement = formGroup.querySelector('small');
    if (!errorElement) {
      const small = document.createElement('small');
      small.classList.add('error-text');
      small.textContent = message;
      formGroup.appendChild(small);
    } else {
      errorElement.textContent = message;
    }
    input.classList.add('error');
  }

  function clearErrors() {
    const errorElements = document.querySelectorAll('.error-text');
    errorElements.forEach(function(errorElement) {
      errorElement.remove();
    });

    const inputs = document.querySelectorAll('input, select');
    inputs.forEach(function(input) {
      input.classList.remove('error');
    });
  }
});
</script>

</body>
</html>













<!-- <script>
        window.onload = function() {
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
            console.log('Page loaded');
        }
    </script> -->