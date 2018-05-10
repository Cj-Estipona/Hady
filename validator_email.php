<?php
  include 'db_conn.php';

  //initialize output
  $message = "";

  $keyword = $_POST['keywordEmail'];

	//server side email validation
		//check if email exist
		$queryCheckEmail = "SELECT * FROM tbl_user WHERE Email = '$keyword'";
		//$query = $conn->query($sql);
    $result = mysqli_query($connection1, $queryCheckEmail) or die("Failed to query database ".mysql_error());
    $row = mysqli_fetch_array($result);

		if($row > 0){
			$message = 'Email already taken';
		}


	echo json_encode($message);
 ?>
