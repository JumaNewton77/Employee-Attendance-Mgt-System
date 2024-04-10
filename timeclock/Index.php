<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Clock In</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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
                <li><a class="homeblack" href="../services.html">Services</a></li>
                <li><a class="homered" href="../contact.html">Conduct Us</a></li>
                <li><a class="homeblack" href="#">Notification</a></li>
            </ul>
            <div class="button-container" style="float: right;">  
                <a href="../logout-user.php" class="btn btn-light">Logout</a>  
            </div>
            <div class="search_bar">
                <input type="text" placeholder="Search" />
            </div>
        </nav>
    </header>
    <div class="container mt-5">
        <h1 class="text-center">Employee Clock Time</h1>
        <hr>
        <?php
        session_start();
        require_once "../Connect.php";

        if (isset($_SESSION['employee_id'])) {
            $userId = $_SESSION['employee_id'];

            if (isset($_SESSION['start_time'])) {
                $startTime = $_SESSION['start_time'];
                $currentTime = time();
                $totalSeconds = $currentTime - $startTime;
                $hours = floor($totalSeconds / 3600);
                $minutes = floor(($totalSeconds / 60) % 60);

                echo "<p class='lead'>You have been active for $hours hours and $minutes minutes.</p>";
                echo "<button class='btn btn-danger' id='stopBtn'>Clock Out</button>";
            } else {
                echo "<p class='lead'>Click to Clock In.</p>";
                echo "<button class='btn btn-success' id='startBtn'>Clock In</button>";
            }
        } else {
            echo "<p class='lead'>log in to start recording your time.</p>";
            echo "<a href='login.php' class='btn btn-primary'>Login</a>";
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#startBtn').click(function() {
                $.ajax({
                    url: 'start_recording.php',
                    type: 'POST',
                    success: function(response) {
                        location.reload();
                    }
                });
            });

            $('#stopBtn').click(function() {
                $.ajax({
                    url: 'stop_recording.php',
                    type: 'POST',
                    success: function(response) {
                        location.reload();
                    }
                });
            });
        });
    </script>
</body>
</html>