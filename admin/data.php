<?php
	include 'db_conn.php';
	//header('Content-Type: application/json');
	//$userid = trim(@$_GET['id']);
	$userid = $_POST['data'];
	$data = array();
	if ($connection1 == false){
		echo 'Unable to connect to Database server!<br>';
	}
	else{
		$sql = "SELECT tbl_mood.MoodDate, tbl_mood.MoodLvl, tbl_user.FName, tbl_user.LName
				FROM tbl_mood
				INNER JOIN tbl_user ON tbl_mood.UserID = tbl_user.UserID
				Where tbl_mood.UserID = '$userid'
		";

		$result = mysqli_query($connection1, $sql);
		foreach ($result as $row){
			$data[] = $row;
		}
	}
	echo json_encode($data);
	//header("Location: viewmood.php");
?>
