<?php require_once "controllerUserData.php"; ?>
<?php 
$email = $_SESSION['email'];
$password = $_SESSION['password'];
if($email != false && $password != false){
    $sql = "SELECT * FROM employee WHERE email = '$email'";
    $run_Sql = mysqli_query($conn, $sql);
    if($run_Sql){
        $fetch_info = mysqli_fetch_assoc($run_Sql);
        $status = $fetch_info['status'];
        $code = $fetch_info['code'];
        if($status == "verified"){
            if($code != 0){
                header('Location: reset-code.php');
            }
        }else{
            header('Location: user-otp.php');
        }
    }
}else{
    header('Location: Index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title><?php echo $fetch_info['fullname'] ?> | Home</title>
    <link rel="stylesheet" href="ehome.css" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700&display=swap');

* {
    margin: 0;
    padding: 0;
    /* box-sizing: border-box; */
}

        body, h1, ul, li, a {
            margin: 0;
            padding: 0;
            text-decoration: none;
        }
        header {
            background-color: #ffe34d;
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
        /* .homeblack:hover, .homered:hover {
            color: #ddd; 
        }
        .homered {
            color: #ff4500; 
        } */
        #navli a:hover{
            background-color: goldenrod;
            justify-content: space-between;
            padding: 10px 2px;
            border-radius: 5px;
        }
 
    main h1{
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        text-align: center;
        transform: translate(-50%, -50%);
        font-size: 50px;
        font-weight: 600;
    }
    

.welcome-message h1 {
    position: relative;
    color: green;  
    font-family: 'Arial', sans-serif; 
    font-size: 24px;  
    top: 24px; */
    right: 7px;
}
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="logo"><a href="home.php">EAMS</a></div>
            <ul id="navli">
                <li><a class="homeblack" href="home.php">Home</a></li>
                <li><a class="homeblack" href="services.html">Services</a></li>
                <li><a class="homered" href="contact.html">Conduct Us</a></li>
                <li><a class="homeblack" href="login.html">Notification</a></li>
            </ul>
            <div class="button-container" style="float: right;">  
                <a href="logout-user.php" class="btn btn-light">Logout</a>  
            </div>
            <div class="search_bar">
                <input type="text" placeholder="Search" />
            </div>
        </nav>
    </header>
    

    <main>
        <section class="welcome-message">
            <h1>Welcome <?php echo $fetch_info['fullname'] ?></h1>  
        </section>

    <!-- sidebar -->
    <nav class="sidebar">
      <div class="menu_content">
        <ul class="menu_items">
          <div class="menu_title menu_dahsboard"></div>
          <!-- Attendance -->
          <li class="item">
            <a href="../Employee/timeclock/Index.php" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-home-alt"></i>
              </span>
              <span class="navlink">Time Clock</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            <a>
          </li>
          <li class="item">
            <div href="../Employee/leave/dashboard.php" class="nav_link submenu_item">
              <span class="navlink_icon">
                <i class="bx bx-grid-alt"></i>
              </span>
              <span class="navlink">Shift</span>
              <i class="bx bx-chevron-right arrow-left"></i>
            </div>
        </ul>
        <ul class="menu_items">
          <div class="menu_title menu_editor"></div>
          <li class="item">
            <a href="../Employee/leave/dashboard.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bxs-magic-wand"></i>
              </span>
              <span class="navlink">Leave Dashboard</span>
            </a>
          </li>
          <!-- End -->
          <li class="item">
            <a href="../Employee/leave/appyleave.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-loader-circle"></i>
              </span>
              <span class="navlink">Apply Leave</span>
            </a>
          </li>
          <li class="item">
            <a href="../Employee/leave/empleavedash.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-filter"></i>
              </span>
              <span class="navlink">Active Leave</span>
            </a>
          </li>
          <li class="item">
            <a href="#" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-cloud-upload"></i>
              </span>
              <span class="navlink">Declined Leave</span>
            </a>
          </li>
        </ul>
        <ul class="menu_items">
          <div class="menu_title menu_setting"></div>
          <!-- Leave -->
          <li class="item">
            <a href="#" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-flag"></i>
              </span>
              <span class="navlink">Attendance Report</span>
            </a>
          </li>
          <li class="item">
            <a href="../Employee/leave/dashboard.php" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-medal"></i>
              </span>
              <span class="navlink">Leave Report</span>
            </a>
          </li>
          <li class="item">
            <a href="#" class="nav_link">
              <span class="navlink_icon">
                <i class="bx bx-cog"></i>
              </span>
              <span class="navlink">General Report</span>
            </a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="baseclock">
        <p class="descr">Current Time:</p>
        <div style="color: white; width: 400px; padding: 17px 15px; height: 30%; display: flex; font-size: 22px;">
            <div class="date"></div>
        </div>
        <div class="time" >
            <span id="hrs">00</span>
            <span>:</span>
            <span id="mins">00</span>
            <span>:</span>
            <span id="secs">00</span>
        </div>
    </div>
    <form action="home.php">
        <div class="Clockin">
            <li><a href="#clockin">CLOCK IN</a></li>
        </div>
    </form>

    </main>


<script>
 

function updateTime() {
  const now = new Date();
  const hrs = now.getHours();
  const mins = now.getMinutes();
  const secs = now.getSeconds();

  document.getElementById("hrs").textContent = padZero(hrs);
  document.getElementById("mins").textContent = padZero(mins);
  document.getElementById("secs").textContent = padZero(secs);

  const dateElement = document.querySelector(".date");
  const options = { weekday: 'long', year: 'numeric', month: 'long', day: 'numeric' };
  dateElement.textContent = now.toLocaleDateString('en-US', options);
}

function padZero(value) {
  return value.toString().padStart(2, '0');
}

setInterval(updateTime, 1000);



// function formatDate(date) {
//   const DAYS = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
//   const MONTHS = ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"];
//   return `${DAYS[date.getDay()]}, ${MONTHS[date.getMonth()]} ${date.getDate()}, ${date.getFullYear()}`;
// }
// const dateElement = document.querySelector(".date");

// setInterval(() => {
//   const now = new Date();
//   dateElement.textContent = formatDate(now);
// }, 200);
// $('.sub-menu ul').hide();
// $(".sub-menu a").click(function () {
//   $(this).parent(".sub-menu").children("ul").slideToggle("100");
//   $(this).find(".right").toggleClass("fa-caret-up fa-caret-down");
// });
// let hrs = document.getElementById("hrs");
// let mins = document.getElementById("mins");
// let secs = document.getElementById("secs");

// setInterval(() => {
//   let currentTime = new Date();
//   hrs.innerHTML = (currentTime.getHours() < 10 ? "0" : "") + currentTime.getHours();
//   mins.innerHTML = (currentTime.getMinutes() < 10 ? "0" : "") + currentTime.getMinutes();
//   secs.innerHTML = (currentTime.getSeconds() < 10 ? "0" : "") + currentTime.getSeconds();
// }, 1000);

    </script>
</script>
</body>
</html>