
<?php require_once "../leave/leaveDataController.php"; ?>
<!DOCTYPE html>
<html>
  <head>
    <title>Apply Laave</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    <style>
      html, body {
      min-height: 100%;
      }
      body, div, form, input, select, textarea, label { 
      padding: 0;
      margin: 0;
      outline: none;
      font-family: Roboto, Arial, sans-serif;
      font-size: 14px;
      color: #666;
      line-height: 22px;
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

      h1 {
      position: absolute;
      margin: 0;
      font-size: 50px;
      color: #fff;
      z-index: 2;
      line-height: 83px;
      }
      legend {
      padding: 10px;      
      font-family: Roboto, Arial, sans-serif;
      font-size: 18px;
      color: #fff;
      /* background-color: #006622; */
      background-color: #66b366;
      }
      textarea {
      width: calc(100% - 12px);
      padding: 5px;
      }
      .testbox {
      display: flex;
      justify-content: center;
      align-items: center;
      height: inherit;
      padding: 20px;
      }
      form {
      width: 100%;
      padding: 20px;
      border-radius: 6px;
      background: #fff;
      box-shadow: 0 0 8px #006622; 
      }
      .banner {
      position: relative;
      height: 100px;
      background-size: cover;
      display: flex;
      justify-content: center;
      align-items: center;
      text-align: center;
      }
      .banner::after {
      content: "";
      /* background-color: green;  */
      background-color: #66b366;
      position: absolute;
      border-radius: 5px;
      width: 100%;
      height: 100%;
      }
      input, select, textarea {
      margin-bottom: 10px;
      border: 1px solid green;
      border-radius: 5px;
      }
      input {
      width: calc(100% - 10px);
      padding: 5px;
      }
      input[type="date"] {
      padding: 4px 5px;
      }
      textarea {
      width: calc(200% - 12px);
      padding: 5px;
      }
      .item:hover p, .item:hover i, .question:hover p, .question label:hover, input:hover::placeholder {
      color:  #006622;
      }
      .item input:hover, .item select:hover, .item textarea:hover {
      border: 1px solid transparent;
      box-shadow: 0 0 3px 0  #006622;
      color: #006622;
      }
      .item {
      position: relative;
      margin: 10px 0;
      }
      .item span {
      color: red;
      }
      input[type="date"]::-webkit-inner-spin-button {
      display: none;
      }
      .item i, input[type="date"]::-webkit-calendar-picker-indicator {
      position: absolute;
      font-size: 20px;
      color: #00b33c;
      }
      .item i {
      right: 1%;
      top: 30px;
      z-index: 1;
      }
      .week {
      display:flex;
      justify-content:space-between;
      }
      .columns {
      display:flex;
      justify-content:space-between;
      flex-direction:row;
      flex-wrap:wrap;
      }
      .columns div {
      width:48%;
      }
      [type="date"]::-webkit-calendar-picker-indicator {
      right: 1%;
      z-index: 2;
      opacity: 0;
      cursor: pointer;
      }
      input[type=radio], input[type=checkbox]  {
      display: none;
      }
      label.radio {
      position: relative;
      display: inline-block;
      margin: 5px 20px 15px 0;
      cursor: pointer;
      }
      .question span {
      margin-left: 30px;
      }
      .question-answer label {
      display: block;
      }
      label.radio:before {
      content: "";
      position: absolute;
      left: 0;
      width: 17px;
      height: 17px;
      border-radius: 50%;
      border: 2px solid #ccc;
      }
      input[type=radio]:checked + label:before, label.radio:hover:before {
      border: 2px solid  #006622;
      }
      label.radio:after {
      content: "";
      position: absolute;
      top: 6px;
      left: 5px;
      width: 8px;
      height: 4px;
      border: 3px solid  #006622;
      border-top: none;
      border-right: none;
      transform: rotate(-45deg);
      opacity: 0;
      }
      input[type=radio]:checked + label:after {
      opacity: 1;
      }
      .flax {
      display:flex;
      justify-content:space-around;
      }

      
      .btn-block {
      margin-top: 10px;
      text-align: center;
      }
      #button {
      width: 150px;
      padding: 10px;
      border: none;
      border-radius: 5px; 
      background:  #006622;
      font-size: 16px;
      color: #fff;
      cursor: pointer;
      }
      #button:hover {
      background: gold;
      }
      @media (min-width: 568px) {
      .name-item, .city-item {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      }
      .name-item input, .name-item div {
      width: calc(50% - 20px);
      }
      .name-item div input {
      width:97%;}
      .name-item div label {
      display:block;
      padding-bottom:5px;
      }
      }
    </style>
  </head>
  <body>


  <header>
		<nav>
            <div class="logo"><a href="../Home.html">EAMS</a></div>
			<!-- <h1>EAMS</h1> -->
			<ul id="navli">
				<li><a class="homeblack" href="../Home.html">Home</a></li>
				<li><a class="homeblack" href="#setting">Services</a></li>
				<li><a class="homered" href="../contact.html">Conduct Us</a></li>
                <li><a class="homeblack" href="#login">Notification</a></li>
			</ul>
            <div class="button-container" style="float: right;">  
                <a href="../logout-user.php" class="btn btn-light">Logout</a>  
            </div>
		</nav>
	</header>
    <div class="testbox">
    <form action="" method="post">
      <div class="banner">
        <h1>Leave Application Form</h1>
      </div>
      <br/>
      <fieldset>
        <legend>Personal Details</legend>
        <div class="columns">
          <div class="item">
            <label for="fullname">Full Name<span></span></label>
            <input id="fullname" type="text" required name="fullname" />
          </div>
          <div class="item">
            <label for="personalnumber"> Personal Number<span></span></label>
            <input id="personalnumber" type="text" required name="personalnumber" />
          </div>
          <div class="item">
            <label for="email">Email<span></span></label>
            <input id="email" type="text"  required name="email" />
          </div>
          <div class="item">
            <label for="phonenumber">Phone Number<span></span></label>
            <input id="phonenumber" type="tel" required   name="phonenumber" required/>
          </div>
      </fieldset>
      <br/>
      <fieldset>
      <legend>Other Details</legend>
      <div class="columns">
      <div class="item">
      <label for="checkoutdate">Check-out Date <span></span></label>
      <input id="checkoutdate" type="date" required name="checkoutdate" />
      <i class="fas fa-calendar-alt"></i>
      </div>
      <div class="item">
      <label for="checkindate">Check- in Date <span></span></label>
      <input id="checkindate" type="date" required name="checkindate" />
      <i class="fas fa-calendar-alt"></i>
      </div>
      <div class="item">
      <p>Check-out Time </p>
      <select name="checkout" id="checkout" required>
      <option value="" disabled selected>Select time</option>
      <option value="morning" >Morning</option>
      <option value="afternoon">Afternoon</option>
      <option value="evening">Evening</option>
      </select>
      </div>
      <div class="item">
      <p>Check-in Time </p>
      <select name="checkin" id="checkin" required>
      <option  value="" disabled selected>Select time</option>
      <option value="morning" >Morning</option>
      <option value="afternoon">Afternoon</option>
      <option value="evening">Evening</option>
      </select>
      </div>    
      <div class="item">
      <p>Select Your Department</p>
      <select name="department" id="department" required>
      <option value="" disabled selected>Department</option>
      <option value="ict" >ICT</option>
      <option value="finance">Finance</option>
      <option value="human resource">Human Resource</option>
      <option value="admin">Administation</option>
      <option value="marketing">Marketing</option>
      </select>
      </div>   
      <div class="item">
            <label for="hod">Head of Department<span></span></label>
            <input id="hod" type="text" required name="dpthod" required/>
          </div> 
      <div class="item">
      <div class="item">
            <label for="refame">Person to Approve<span></span></label>
            <input id="refname" type="text" required  name="refname" required/>
          </div>
      <p>Select Leave Type</p>
      <select name="leavetype" id="leavetype" required>
      <option value="" disabled selected>Leave</option>
      <option value="sick leave" >Sick Leave</option>
      <option value="maternity leave">Maternity Leave</option>
      <option value="holiday leave">Holiday Leave</option>
      <option value="election">Election Leave</option>
      <option value="unpaid">Unpaid Leave</option>
      <option value="annual">Annual Leave</option>
      </select>
      </div>   
      <div class="item" style=width:48%>
      <label for="daynum">Expected Number of Days Out</label>
      <input id="daynum" type="number" required name="daysnum" />
      </div>
      <div class="item">
      <label for="reason">Reason For Applying</label>
      <textarea id="reason" name="reason" required rows="4"></textarea>
      </div>
      </fieldset>
      <div class="btn-block">
      <input id="button" type="submit" value="Submit" name="submit">
      </div>
    </form>
    </div>


    <script>

      // Date Validate
      document.addEventListener("DOMContentLoaded", function() {
      var today = new Date().toISOString().split('T')[0];
  
      document.getElementById("checkindate").setAttribute("min", today);
      document.getElementById("checkoutdate").setAttribute("min", today);
});

document.addEventListener('DOMContentLoaded', function () {
    document.getElementById('myForm').addEventListener('submit', function (e) {
        e.preventDefault();
        let isFormValid = true;
        this.querySelectorAll('input[type="text"]').forEach(function (input) {
            if (input.value.trim() === '') {
                isFormValid = false;
            }
        });
        if (isFormValid) {
            this.submit();
        } else {
            alert('Please fill in all the fields.');
        }
    });
});

// EMAIL VALIDATION
document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('myForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        const emailInput = document.getElementById('email');
        
        if (!emailPattern.test(emailInput.value)) {
            alert('Please enter a valid email address.');
        } else {
            console.log('Email is valid. Form would be submitted here.');
        }
    });
});
     </script>
  </body>
</html>