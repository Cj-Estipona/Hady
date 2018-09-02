<?php
  include '../db_conn.php';
  date_default_timezone_set("Asia/Manila");

  if (isset($_POST['id'])) {
    $eventID = $_POST['id'];
    $userID = $_POST['userid'];

    $queryDelete = "DELETE FROM tbl_schedule WHERE `SchedID` = $eventID AND `UserID` = '$userID'";
    $resultDelete = mysqli_query($connection1, $queryDelete) or die("Failed to query the query1 ".mysqli_error($connection1));

    echo "Nice";
  }
?>
