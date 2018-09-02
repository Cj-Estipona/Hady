<?php
  include '../../db_conn.php';

  $activityID = $_GET['actID'];

  $deleteQuery = "DELETE FROM tbl_activity WHERE `ActID`=$activityID";
  $deleteResult = mysqli_query($connection1, $deleteQuery) or die("Failed to query the query1 ".mysqli_error($connection1));
  header("Location: ../uploads.php");
?>
