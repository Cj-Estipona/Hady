<?php
  include '../db_conn.php';
  date_default_timezone_set("Asia/Manila");

  if(isset($_POST['title'])){
    $userID = $_POST['userid'];
    $title = $_POST['title'];
    $start = $_POST['start'];
    $end = $_POST['end'];
    $queryInsert = "INSERT INTO tbl_schedule(`UserID`, `SchedTitle`, `StartEvent`, `EndEvent`) VALUES('".$userID."','".$title."','".$start."','".$end."')";
    $resultInsert = mysqli_query($connection1, $queryInsert) or die("Failed to query the query1 ".mysqli_error($connection1));
  }
?>
