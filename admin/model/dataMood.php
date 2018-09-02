<?php
  include '../../db_conn.php';
  header('Content-Type: application/json');

  $userid = $_POST['action'];

  $output = array();
  $moodLvlArr = array();
  $dateMoodArr = array();
  $intMood = -1;

  $selectMood = "SELECT MoodLvl, MoodFeel, JournalTitle, MoodJournal, MoodDate FROM tbl_mood WHERE UserID = '$userid'";
  $querySelectMood = mysqli_query($connection1, $selectMood) or die("Failed to query the query1 ".mysqli_error($connection1));
  $queryRowCount=mysqli_num_rows($querySelectMood);

  if($queryRowCount > 0){
    $output['success'] = true;
    while ($row = mysqli_fetch_array($querySelectMood)) {
      switch ($row['MoodLvl']) {
        case 'Very Low':
          $intMood = 20;
          break;
        case 'Low':
          $intMood = 40;
          break;
        case 'Neutral':
          $intMood = 60;
          break;
        case 'High':
          $intMood = 80;
          break;
        default:
          $intMood = 100;
          break;
      }
      array_push($moodLvlArr, $intMood);
      $dateMood = new DateTime($row['MoodDate']);
      array_push($dateMoodArr, date_format($dateMood, "F j, Y h:ia"));
    }
    $output['moodlvl'] = $moodLvlArr;
    $output['datemood'] = $dateMoodArr;
  } else {
    $output['success'] = false;
  }




  echo json_encode($output);
?>
