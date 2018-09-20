<?php
  include '../db_conn.php';
  date_default_timezone_set("Asia/Manila");
  //header('Content-Type: application/json');

  $adminID = $_GET['adminID'];

  $data = array();
  $outputArray = array();

  $querySelect = "SELECT * FROM tbl_schedule WHERE UserID = '$adminID' ORDER BY SchedID";
  $resultSelect = mysqli_query($connection1, $querySelect) or die("Failed to query the query1 ".mysqli_error($connection1));

  while ($rowSelect = mysqli_fetch_array($resultSelect)) {
    $data['id'] = $rowSelect['SchedID'];
    $data['title'] = $rowSelect['SchedTitle'];
    $data['start'] = $rowSelect['StartEvent'];
    $data['end'] = $rowSelect['EndEvent'];

    array_push($outputArray, $data);
  }

  echo json_encode($outputArray);
?>
