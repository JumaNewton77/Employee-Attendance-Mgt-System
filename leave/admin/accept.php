<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . '../Employee/Connect.php');

	if (isset($_POST['approve'])) {
		$leaveId = $_GET['leave_id'];  
		$query = "UPDATE leaves SET status = 1 WHERE leave_id = $leaveId";
	
		if (mysqli_query($conn, $query)) {
			echo "Leave status updated successfully."; 
			header("dashboard.php");
		} else {
			echo "Error updating record: " . mysqli_error($conn);
		}
	}
	
 ?>