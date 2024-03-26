<?php
    require_once ($_SERVER['DOCUMENT_ROOT'] . '../Employee/Connect.php');
	//include 'Connect.php'; 
	// if (isset($_POST['approve'])){
	// 	$appid = $_POST['appid'];
	// 	$sql = "UPDATE leaves SET status='1' WHERE personalnumber = '$appid'";
	// 	$run = mysqli_query($conn,$sql);
	// 	if($run == true){
			
	// 		echo "<script> 
	// 				ale/rt('Application Approved');
	// 				window.open('dashboard.php','_self');
	// 			  </script>";
	// 	}else{
	// 		echo "<script> 
	// 		alert('Failed To Approved');
	// 		</script>";
	// 	}
	// }

$sql = "UPDATE leaves SET status=? WHERE leave_id=?";
$stmt = $conn->prepare($sql);
$status = 1;  
$stmt->bind_param("is", $status, $appid);  
if($stmt->execute()){
    echo "<script> 
             alert('Application Approved');
             window.location.href='dashboard.php';
         </script>";
} else {
    echo "<script> 
             alert('Failed To Approve');
         </script>";
}
$stmt->close();

	
 ?>