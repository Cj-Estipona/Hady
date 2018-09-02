<?php
  session_start();
  date_default_timezone_set("Asia/Manila");
  include '../../db_conn.php';
  $userID = $_SESSION['userId'];
  $userCourse = $_SESSION['course'];

  $request_body = json_decode(file_get_contents('php://input'));
  //$action = $request_body->action;
  $action = $_GET['action'];

  if ($action == "getLearn") {
    $querySearch = "SELECT CollegeDept FROM tbl_college Where CourseName = '$userCourse'";
		$result = mysqli_query($connection1, $querySearch) or die("Failed to query database 1".mysqli_error($connection1));
		$row = mysqli_fetch_array($result);

    if (!empty($row)) {
      $college = $row['CollegeDept'];

      $queryFile = "SELECT ActID,ActivityName,ActivityDesc,ActivityMime FROM tbl_activity WHERE (UploadedBy = '$college' OR UploadedBy = 'MAINADMIN') AND (UploadTo = '$userCourse' OR UploadTo='ALL') ";
      $resultFile = mysqli_query($connection1, $queryFile) or die("Failed to query database ".mysqli_error());
      $rowNumFile = mysqli_num_rows($resultFile);
    }

    $fileArray = array();
    $output = array();

    if ($rowNumFile) {
      while ($rowFile = mysqli_fetch_array($resultFile)) {
        $fileArray[] = $rowFile;
      }
      $output['success'] = true;
    } else {
      $output['success'] = false;
    }

    $output['dataFile'] = $fileArray;

    echo json_encode($output);


  }

  if($action == "getNotif"){
    $queryMeeting = "SELECT * FROM tbl_meeting WHERE MeetingTo = '$userID'";
    $resultMeeting = mysqli_query($connection1, $queryMeeting) or die("Failed to query database ".mysqli_error());
    $rowMeeting = mysqli_fetch_array($resultMeeting);
    if($rowMeeting){
      $output['success'] = true;
      $output['msg'] = $rowMeeting['MeetingMsg'];
      $output['start'] = date("F j, Y, g:i a", strtotime($rowMeeting['MeetingStart']));
      $output['end'] = date("F j, Y, g:i a", strtotime($rowMeeting['MeetingEnd'] ));
      $output['from'] = $rowMeeting['MeetingFrom'];
    } else {
      $output['success'] = false;
    }

    echo json_encode($output);
  }
 ?>
