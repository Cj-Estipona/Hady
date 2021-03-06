<?php
  session_start();
  date_default_timezone_set("Asia/Manila");
  include '../../db_conn.php';
  $userID = $_SESSION['userId'];

  $request_body = json_decode(file_get_contents('php://input'));
  //$action = $request_body->action;
  $action = $_GET['action'];

  if($action == "checkMood") {
    $today = date('Y-m-d').' 00:00:00';
    $datetime = new DateTime('tomorrow');
    $tomorrow = $datetime->format('Y-m-d').' 00:00:00';

    $query1 = "SELECT COUNT(*) AS MoodPerDay FROM tbl_mood WHERE UserID = '$userID' AND MoodDate >= '$today' AND MoodDate < '$tomorrow'";
    $result1 = mysqli_query($connection1, $query1) or die("Failed to query database ".mysqli_error());
    $row = mysqli_fetch_array($result1);
    if($row){
      echo $row["MoodPerDay"];
    } else {
      echo "error";
    }
  }

  if($action == "submitMood") {
    $passMood = $request_body->passMood;
    $passMoodArr = $request_body->passMoodArr;
    $passTitle = addslashes($request_body->passTitle);
    $passJournal = addslashes($request_body->passJournal);
    $moodDate = date('Y-m-d H:i:s');
    //echo $passTitle;

    if ($passTitle == "" && $passJournal != "") {
      $passTitle = "Untitled Journal";
    } elseif ($passTitle == "") {
      $passTitle = "NULL";
    } else {
      $passTitle = $passTitle;
    }
    $queryMood = "INSERT INTO tbl_mood(`UserID`, `MoodLvl`, `MoodFeel`,`JournalTitle`, `MoodJournal`, `MoodDate`)
      VALUES('".$userID."','".$passMood."','".$passMoodArr."','".$passTitle."','".$passJournal."','".$moodDate."')";
    $resultMood = mysqli_query($connection1, $queryMood) or die ("Failed to query database ".mysqli_error());
    if($resultMood){
      echo "success";
    } else {
      echo $passTitle;
    }
  }
?>
