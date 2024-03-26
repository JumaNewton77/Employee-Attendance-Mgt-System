<?php
require_once ($_SERVER['DOCUMENT_ROOT'] . '/Employee/Connect.php');
?>
<?php
// Assuming you've already verified the user's credentials and have their userID
$userId = $_SESSION['employee_id']; // The user's ID, assumed to be stored in session
$startTime = date("Y-m-d H:i:s"); // Current time

// Insert start time into database
$stmt = $conn->prepare("INSERT INTO clock_time (employee_id, start_time) VALUES (?, ?)");
$stmt->bind_param("is", $userId, $startTime);
$stmt->execute();
$sessionId = $conn->insert_id; // Get the session ID of the inserted record
$stmt->close();

// Store the session ID in a session variable for later use
$_SESSION['session_id'] = $sessionId;

?>

<?php
// Fetch the session ID stored earlier
$sessionId = $_SESSION['session_id'];
$endTime = date("Y-m-d H:i:s"); // Current time

// Update the database with the end time
$stmt = $conn->prepare("UPDATE Employee SET end_time = ? WHERE ses_id = ?");
$stmt->bind_param("si", $endTime, $sessionId);
$stmt->execute();
$stmt->close();

// Clear session data
session_unset();
session_destroy();
?>

<script>
window.addEventListener("beforeunload", function() {
    var formData = new FormData();
    formData.append("logout", "true");
    navigator.sendBeacon("record_logout.php", formData);
});
</script>












     
        
          <p>Your Email</p>
          <input type="text" name="name"/>
        </div>
        <div class="item">
          <p>Your Department</p>
          <select>
            <option value=""></option>
            <option value="1">Select Department</option>
            <option value="2">ICT</option>
            <option value="3">Finance</option>
            <option value="4">HR</option>
            <option value="5">Admin</option>
          </select>
        </div>
        <div class="item">
          <p>Date From: </p>
          <input type="date" name="bdate" />
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="item">
          <p>Date To: </p>
          <input type="date" name="bdate" />
          <i class="fas fa-calendar-alt"></i>
        </div>
        <div class="item">
          <p>Leave Type</p>
          <select>
            <option value=""></option>
            <option value="1">Select Leave Type</option>
            <option value="2">Medical Leave</option>
            <option value="3">Maternity Leave</option>
            <option value="4">Personal Leave</option>
            <option value="5">Voting Leavt</option>
          </select>
        </div>
        <div class="item">
          <p>Description Your Leave</p>
          <textarea rows="3" ></textarea>
        </div>

        <div class="btn-block">
          <button type="submit" href="/">Apply</button>
        </div>
      </form>
    </div>