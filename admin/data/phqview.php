<?php
session_start();
	include '../../db_conn.php';
	header('Content-Type: application/json');
	$college = $_SESSION['College'];
	$adminID = $_SESSION['userId'];
	//$userid = $_POST['data'];
	$data = array();
	if ($connection1 == false){
		echo 'Unable to connect to Database server!<br>';
	}
	else{
		$sql = "SELECT tbl_score.UserID, Score, QuestionID, max( Date )
		FROM tbl_score 
		INNER JOIN tbl_user ON tbl_score.UserID = tbl_user.UserID
		INNER JOIN tbl_college ON tbl_user.Course = tbl_college.CourseName
		Where tbl_college.CollegeDept = '$college'
        AND QuestionID <> 10
		AND tbl_score.Date = (
                                SELECT MAX(tbl_score.Date) 
                                FROM tbl_score
								WHERE tbl_user.userID = tbl_score. UserID
                            )
		group by UserID, QuestionID
		";

		$result = mysqli_query($connection1, $sql);
		foreach ($result as $row){
			$data[] = $row;
		}
	}
	echo json_encode($data);
	//header("Location: viewmood.php");
?>
