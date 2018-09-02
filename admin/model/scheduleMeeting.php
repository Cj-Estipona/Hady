<?php
  include '../../db_conn.php';
  session_start();
  date_default_timezone_set("Asia/Manila");
  $adminCollege = $_SESSION['College'];

  if(isset($_POST['userID'])){
    $output = array();
    $startDate = mysqli_real_escape_string($connection1, $_POST['startTime']);
    $endDate = mysqli_real_escape_string($connection1, $_POST['endTime']);
    $msg = mysqli_real_escape_string($connection1, $_POST['messageToUser']);
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $adminID = $_POST['adminID'];
    $userID = mysqli_real_escape_string($connection1, $_POST['userID']);
    $title = "Meeting with " .$lname.", ".$fname;

    $startToday = new DateTime($startDate);
    $newStartToday = date_format($startToday, 'Y-m-d H:i:s');
    $endToday = new DateTime($endDate);
    $newEndToday = date_format($endToday, 'Y-m-d H:i:s');

    $queryMeet = "INSERT INTO tbl_meeting (`MeetingFrom`, `MeetingTo`, `MeetingStart`, `MeetingEnd`, `MeetingMsg`)
    VALUES('".$adminCollege."','".$userID."','".$newStartToday."','".$newEndToday."','".$msg."') ";
    $resultMeet = mysqli_query($connection1, $queryMeet) or die("Failed to query the query1 ".mysqli_error($connection1));
    $rowCount = mysqli_affected_rows($connection1);


    $queryInsert = "INSERT INTO tbl_schedule(`UserID`, `SchedTitle`, `StartEvent`, `EndEvent`) VALUES('".$adminID."','".$title."','".$newStartToday."','".$newEndToday."')";
    $resultInsert = mysqli_query($connection1, $queryInsert) or die("Failed to query the query1 ".mysqli_error($connection1));


    if ($rowCount > 0) {
      $output['success'] = true;
    } else {
      $output['success'] = false;
    }
    echo json_encode($output);
  }
?>
