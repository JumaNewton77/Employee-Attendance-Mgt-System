<?php
// include('inc/config.php'); 
require_once ($_SERVER['DOCUMENT_ROOT'] . '../Employee/Connect.php'); 
$sql = "DELETE FROM employee WHERE employee_id='" . $_GET["employee_id"] . "'";

$run = mysqli_query($conn,$sql);

if($run == true){
			
    echo "<script> 
            alert('User Deleted');
            window.open('dashboard.php','_self');
          </script>";
}else{
    echo "<script> 
    alert('Failed to delete');
    </script>";
}

mysqli_close($conn);
?>