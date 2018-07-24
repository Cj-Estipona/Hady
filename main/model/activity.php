<?php
  session_start();
  date_default_timezone_set("Asia/Manila");
  include '../../db_conn.php';
  $userID = $_SESSION['userId'];

  $request_body = json_decode(file_get_contents('php://input'));
  //$action = $request_body->action;
  $action = $_GET['action'];

  if ($action == "getLearn") {
    $queryFile = "SELECT ActID,ActivityName,ActivityDesc,ActivityMime FROM tbl_activity";
    $resultFile = mysqli_query($connection1, $queryFile) or die("Failed to query database ".mysqli_error());
    $rowNumFile = mysqli_num_rows($resultFile);

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
 ?>
