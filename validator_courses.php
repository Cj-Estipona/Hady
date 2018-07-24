<?php
  include 'db_conn.php';

  //initialize output
  $message = array();
  $outputCourse = array();

  $keyword = $_POST['keywordCollege'];

	//getCourse dynamically
		$queryGetCourse = "SELECT * FROM tbl_college WHERE CollegeDept = '$keyword'";
    $resultCourse = mysqli_query($connection1, $queryGetCourse) or die("Failed to query database ".mysql_error());
    $rowNumFile = mysqli_num_rows($resultCourse);
    $message['try'] = $rowNumFile;

    if ($rowNumFile) {
      while ($rowCourse = mysqli_fetch_array($resultCourse)) {
        $message['success'] = true;
        $outputCourse[] = $rowCourse['CourseName'];
      }
      $message['output'] = $outputCourse;
    } else {
      $message['success'] = false;
      $message['output'] = $rowCourse['CourseName'];
    }


	echo json_encode($message);
 ?>
