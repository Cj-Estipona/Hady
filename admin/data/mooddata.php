<?php
session_start();
	include '../../db_conn.php';
	header('Content-Type: application/json');
	
  $college = $_SESSION['College'];
  $adminID = $_SESSION['userId'];
  
	$userid = trim(@$_GET['id']);
	//$userid = $_POST['data'];
	$data = array();
	if ($connection1 == false){
		echo 'Unable to connect to Database server!<br>';
	}
	else{
		$sql = "SELECT tbl_mood.MoodLvl
				FROM tbl_mood
				INNER JOIN tbl_user ON tbl_mood.UserID = tbl_user.UserID
				INNER JOIN tbl_college ON tbl_user.Course = tbl_college.CourseName
				Where tbl_college.CollegeDept = '$college'
                AND tbl_user.UserID <> '$adminID'
		";

		$result = mysqli_query($connection1, $sql);
		foreach ($result as $row){
			$data[] = $row;
		}
	}
	echo json_encode($data);
	//header("Location: viewmood.php");
?>
