<?php
  include '../../db_conn.php';
  session_start();
  date_default_timezone_set("Asia/Manila");
  $adminCollege = $_SESSION['College'];
  header('Content-Type: application/json');


  $output = array();
  $numOfInvalidated = 0;
  $aveMood = 0;
  $adminID = $_GET['userID'];

  //Selecting total number of students
  $totalStudentsQuery = "SELECT COUNT(tbl_user.UserID) AS CountOfStudents FROM tbl_user INNER JOIN tbl_college ON tbl_user.Course = tbl_college.CourseName WHERE tbl_college.CollegeDept = '$adminCollege' AND access_type IS NULL";
  $queryTotal = mysqli_query($connection1, $totalStudentsQuery) or die("Failed to query the query1 ".mysqli_error($connection1));
  $rowTotal = mysqli_fetch_array($queryTotal);
  $output['totalStudents'] = $rowTotal['CountOfStudents'];

  //Selecting Invalidated PHQ-9
  $studentsInvalidated = "SELECT UserID, Course FROM tbl_user
  INNER JOIN tbl_college ON tbl_user.Course = tbl_college.CourseName
  WHERE tbl_college.CollegeDept = '$adminCollege' AND access_type IS NULL";
  $queryStudInvalidated = mysqli_query($connection1, $studentsInvalidated) or die("Failed to query the query1 ".mysqli_error($connection1));

  while ($rowStudInvalidated = mysqli_fetch_array($queryStudInvalidated)) {
    $userIDHolder = $rowStudInvalidated['UserID'];
    $totalInvalidated = "SELECT COUNT(UserID) AS invalidatedNum FROM tbl_score WHERE UserID = '$userIDHolder' AND QuestionID = 9 AND Validated=0";
    $queryTotalInvalidated = mysqli_query($connection1, $totalInvalidated) or die("Failed to query the query1 ".mysqli_error($connection1));
    $rowInvalidated = mysqli_fetch_array($queryTotalInvalidated);
    $numOfInvalidated += $rowInvalidated['invalidatedNum'];
  }
  $output['totalInvalidated'] = $numOfInvalidated;

  //Selecting average Mood
  $moodQuery = "SELECT tbl_mood.UserID, MoodLvl, tbl_user.FName FROM tbl_mood
  INNER JOIN tbl_user ON tbl_mood.UserID = tbl_user.UserID
  INNER JOIN tbl_college ON tbl_user.Course = tbl_college.CourseName
  WHERE tbl_college.CollegeDept = '$adminCollege' AND access_type IS NULL";
  $moodResult = mysqli_query($connection1, $moodQuery) or die("Failed to query the query1 ".mysqli_error($connection1));
  $moodCounter = 0;
  while ($rowMood = mysqli_fetch_array($moodResult)) {
    $moodCounter++;
    switch ($rowMood['MoodLvl']) {
      case 'Very Low':
        $aveMood += 20;
        break;
      case 'Low':
        $aveMood += 40;
        break;
      case 'Neutral':
        $aveMood += 60;
        break;
      case 'Neutral':
        $aveMood += 80;
        break;
      default:
        $aveMood += 100;
        break;
    }
  }
  if ($aveMood == 0 ) {
    $output['hasMoodAve'] = false;
  } else {
    $output['hasMoodAve'] = true;
    $finalAverage = $aveMood/$moodCounter;
    $output['finalAverageMood'] = $finalAverage;
  }

  //Selecting Todays Schedule
  /*$currentDay = new DateTime();
  $dailyDate = $currentDay->format('Y-m-d H:i:s');
  $dailyViewDate = substr($dailyDate,0,10) . ' 00:00:00';
  $nextViewDate = substr($nextDate,0,10) . ' 23:59:59';
  $queryToday = "SELECT * FROM tbl_schedule WHERE StartEvent >= '$dailyViewDate' AND EndEvent <= '$nextViewDate' AND UserID = '$adminID'";
  $resultToday = mysqli_query($connection1, $queryToday) or die("Failed to query the query1 ".mysqli_error($connection1));

  while ($rowToday = mysqli_fetch_array($resultToday)) {
    // code...
  }
  if ($rowToday) {
    $output['SchedTitle'] = $rowToday['SchedTitle'];
    $output['StartEvent'] = $rowToday['StartEvent'];
    $output['EndEvent'] = $rowToday['EndEvent'];
    $output['EventSuccess'] = true;
  } else {
    $output['EventSuccess'] = false;
  }*/





  echo json_encode($output);

?>
