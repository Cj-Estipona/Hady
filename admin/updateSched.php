<?php
  include '../db_conn.php';
  date_default_timezone_set("Asia/Manila");

  if (isset($_POST['id'])) {
    $eventID = $_POST['id'];
    $userID = $_POST['userid'];
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];

    $queryUpdate = "UPDATE tbl_schedule SET `SchedTitle` = '$title', `StartEvent` = '$start', `EndEvent` = '$end' WHERE `SchedID` = $eventID AND `UserID` = '$userID'";
    $resultUpdate = mysqli_query($connection1, $queryUpdate) or die("Failed to query the query1 ".mysqli_error($connection1));

    echo "Nice";
  }
?>
