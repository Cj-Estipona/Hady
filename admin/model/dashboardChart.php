<?php
  include '../../db_conn.php';
  session_start();
  date_default_timezone_set("Asia/Manila");
  $adminCollege = $_SESSION['College'];
  header('Content-Type: application/json');

  $actionCourse = $_POST['actionCourse'];
  $output = array();

  if ($actionCourse == "Course") {
    $courseArray = array();
    $countCourseArr = array();
    $maxCourse = 0;

    $queryCollege = "SELECT * FROM tbl_college WHERE CollegeDept = '$adminCollege'";
    $resultCollege = mysqli_query($connection1, $queryCollege) or die("Failed to query the query1 ".mysqli_error($connection1));
    while ($rowCollege = mysqli_fetch_array($resultCollege)) {
      $courseHolder = $rowCollege['CourseName'];
      array_push($courseArray, $courseHolder);

      $queryCourse = "SELECT COUNT(UserID) AS countCourse FROM tbl_user WHERE Course = '$courseHolder' AND access_type IS NULL";
      $resultCourse = mysqli_query($connection1, $queryCourse) or die("Failed to query the query1 ".mysqli_error($connection1));
      $rowCourse = mysqli_fetch_array($resultCourse);
      $maxCourse += $rowCourse['countCourse'];
      array_push($countCourseArr, $rowCourse['countCourse']);
    }

    $output['labelArray'] = $courseArray;
    $output['countItem'] = $countCourseArr;
    $output['Max'] = $maxCourse;
    $output['successStudent'] = true;
  }

  if($actionCourse == "Gender"){
    $genderArray = ["Male", "Female"];
    $countGenderArr = array();

    $queryGender = "SELECT COUNT(CASE WHEN tbl_user.Gender='Male' then 1 end) as maleCount,
    COUNT(CASE WHEN tbl_user.Gender='Female' then 1 end) as femaleCount, COUNT(*) as totalCount FROM `tbl_user`
    INNER JOIN tbl_college ON tbl_user.Course = tbl_college.CourseName
    WHERE tbl_college.CollegeDept='$adminCollege' and tbl_user.access_type IS NULL";
    $resultGender = mysqli_query($connection1, $queryGender) or die("Failed to query the query1 ".mysqli_error($connection1));
    $rowGender = mysqli_fetch_array($resultGender);
    array_push($countGenderArr, $rowGender['maleCount'], $rowGender['femaleCount']);

    $output['labelArray'] = $genderArray;
    $output['countItem'] = $countGenderArr;
    $output['Max'] = $rowGender['totalCount'];
    $output['successStudent'] = true;

  }

  if($actionCourse == "CourseMood"){
    $courseMoodArray = array();
    $countCourseMoodArr = array();

    $queryCollege = "SELECT * FROM tbl_college WHERE CollegeDept = '$adminCollege'";
    $resultCollege = mysqli_query($connection1, $queryCollege) or die("Failed to query the query1 ".mysqli_error($connection1));
    while ($rowCollege = mysqli_fetch_array($resultCollege)) {
      $averageMoodHolder = 0;
      $counterMood = 0;
      $courseHolder = $rowCollege['CourseName'];
      array_push($courseMoodArray, $courseHolder);

      $queryMood = "SELECT tbl_mood.UserID, tbl_mood.MoodLvl, tbl_user.Course FROM `tbl_mood`
      INNER JOIN tbl_user ON tbl_mood.UserID = tbl_user.UserID
      INNER JOIN tbl_college ON tbl_user.Course = tbl_college.CourseName
      WHERE tbl_college.CollegeDept = '$adminCollege' AND tbl_user.Course='$courseHolder' AND tbl_user.access_type IS NULL";
      $resultMood = mysqli_query($connection1, $queryMood) or die("Failed to query the query1 ".mysqli_error($connection1));

      while ($rowMood = mysqli_fetch_array($resultMood)) {
        $counterMood++;
        switch ($rowMood['MoodLvl']) {
          case 'Very Low':
            $averageMoodHolder += 20;
            break;
          case 'Low':
            $averageMoodHolder += 40;
            break;
          case 'Neutral':
            $averageMoodHolder += 60;
            break;
          case 'High':
            $averageMoodHolder += 80;
            break;
          default:
            $averageMoodHolder += 100;
            break;
        }
      }
      if ($counterMood != 0) {
        $averageTotal = $averageMoodHolder/$counterMood;
      } else {
        $averageTotal = 0;
      }
      array_push($countCourseMoodArr, $averageTotal);

    }

    $output['MoodCourse'] = $courseMoodArray;
    $output['MoodDetails'] = $countCourseMoodArr;
    $output['successMood'] = true;

  }

  if ($actionCourse == "GenderMood") {
    $genderMoodArray = ["Male", "Female"];
    $countGenderMoodArr = array();

    for ($i=0; $i < count($genderMoodArray) ; $i++) {
      $averageMoodHolder = 0;
      $counterMood = 0;

      $queryMoodGender = "SELECT tbl_mood.UserID, tbl_mood.MoodLvl, tbl_user.Course, tbl_user.Gender FROM `tbl_mood`
      INNER JOIN tbl_user ON tbl_mood.UserID = tbl_user.UserID
      INNER JOIN tbl_college ON tbl_user.Course = tbl_college.CourseName
      WHERE tbl_college.CollegeDept = '$adminCollege' AND tbl_user.Gender = '$genderMoodArray[$i]' AND tbl_user.access_type IS NULL";
      $resultMoodGender = mysqli_query($connection1, $queryMoodGender) or die("Failed to query the query1 ".mysqli_error($connection1));

      while ($rowMoodGender = mysqli_fetch_array($resultMoodGender)) {
        $counterMood++;
        switch ($rowMoodGender['MoodLvl']) {
          case 'Very Low':
            $averageMoodHolder += 20;
            break;
          case 'Low':
            $averageMoodHolder += 40;
            break;
          case 'Neutral':
            $averageMoodHolder += 60;
            break;
          case 'High':
            $averageMoodHolder += 80;
            break;
          default:
            $averageMoodHolder += 100;
            break;
        }
      }
      if ($counterMood != 0) {
        $averageTotal = $averageMoodHolder/$counterMood;
      } else {
        $averageTotal = 0;
      }
      array_push($countGenderMoodArr, $averageTotal);
    }



    $output['MoodCourse'] = $genderMoodArray;
    $output['MoodDetails'] = $countGenderMoodArr;
    $output['successMood'] = true;
  }

  echo json_encode($output);



?>
