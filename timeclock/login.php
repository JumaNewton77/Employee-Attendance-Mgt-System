<?php
session_start();
require_once "../Connect.php";

 
function hashPassword($password) {
    $options = [
        'cost' => 12, 
    ];
    return password_hash($password, PASSWORD_BCRYPT, $options);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $personalNumber = $_POST["personalnumber"];
    $password = $_POST["password"];
 
    $stmt = $conn->prepare("SELECT employee_id, password FROM employee WHERE personalnumber = ?");
    $stmt->bind_param("s", $personalNumber);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];
 
        if (password_verify($password, $hashedPassword)) {
            $userId = $row["employee_id"];
            $_SESSION['employee_id'] = $userId;
            session_regenerate_id(true);
            header("Location: index.php");
            exit();
        } else {
            $errorMessage = "Invalid personal number or password.";
        }
    } else {
        $errorMessage = "Invalid personal number or password.";
    }

    $stmt->close();
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Login</h1>
        <hr>
        <?php if (isset($errorMessage)) { ?>
            <p class='text-danger'><?php echo $errorMessage; ?></p>
        <?php } ?>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="personalnumber">Personal Number:</label>
                <input type="text" class="form-control" id="personalnumber" name="personalnumber" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html>











<?php
// session_start();
// require_once "../Connect.php";
 

//  if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $PersonalNumber = $_POST["personalnumber"];
//     $password = $_POST["password"];

//      $sql = "SELECT employee_id FROM employee WHERE personalnumber = '$PersonalNumber' AND password = '$password'";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//          $row = $result->fetch_assoc();
//         $userId = $row["employee_id"];
//         $_SESSION['employee_id'] = $userId;

//         // Redirect to the main page
//         header("Location: index.php");
//         exit();
//     } else {
//         $errorMessage = "Invalid username or password.";
//     }
// }

// $conn->close();
?>

<!-- <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">User Login</h1>
        <hr>
        <?php //if (isset($errorMessage)) { echo "<p class='text-danger'>$errorMessage</p>"; } ?>
        <form method="post" action="<?php //echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <div class="form-group">
                <label for="username">Personal Number:</label>
                <input type="text" class="form-control" id="personalnumber" name="personalnumber" required>
            </div>
            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" required>
            </div>
            <button type="submit" class="btn btn-primary">Login</button>
        </form>
    </div>
</body>
</html> -->