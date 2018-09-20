<?php
  include '../../db_conn.php';
  session_start();
  date_default_timezone_set("Asia/Manila");
  $adminCollege = $_SESSION['College'];

  $action = $_POST['action'];
  $output = array();
  $generalDepression = [0,0,0,0,0];
  $hasGenDep = false;


  if ($action == "generalDepression") {
    $selectStudents = "SELECT * FROM tbl_user
      INNER JOIN tbl_college ON tbl_user.Course = tbl_college.CourseName
      WHERE tbl_college.CollegeDept = '$adminCollege' AND access_type IS NULL";
    $resultStudents = mysqli_query($connection1, $selectStudents) or die("Failed to query the query1 ".mysqli_error($connection1));
    while ($rowStudents = mysqli_fetch_array($resultStudents)) {
      $userID = $rowStudents['UserID'];
      $queryPHQ = "SELECT MAX(Part) AS latestPhq, UserID FROM tbl_score WHERE UserID = '$userID'";//"SELECT * FROM tbl_score WHERE UserID = '$userID' AND QuestionID = 9 ORDER BY Part DESC";
      $resultPHQ = mysqli_query($connection1, $queryPHQ) or die("Failed to query the query1 ".mysqli_error($connection1));
      while($rowPHQ = mysqli_fetch_array($resultPHQ))
      {
          if (!$rowPHQ['latestPhq']) {
            break;
          }
          $totalScore = 0;
          $partPhq = $rowPHQ['latestPhq'];
          $useridPhq = $rowPHQ['UserID'];
          $queryComputeScore = "SELECT Score, QuestionID FROM tbl_score WHERE Part = $partPhq AND QuestionID != 10 AND UserID = '$useridPhq'";
          $resultComputeScore = mysqli_query($connection1, $queryComputeScore) or die("Failed to query the query1 ".mysqli_error($connection1));
          while ($rowCompute = mysqli_fetch_array($resultComputeScore)) {
            $hasGenDep = true;
            $totalScore += $rowCompute['Score'];
          }//MOST INNER WHILE

          if ($totalScore >= 20 ) {
            $generalDepression[4] += 1;
          } elseif ($totalScore>=5 && $totalScore <=9) {
            $generalDepression[1] += 1;
          } elseif ($totalScore>=10 && $totalScore <=14) {
            $generalDepression[2] += 1;
          } elseif ($totalScore>=15 && $totalScore <=19) {
            $generalDepression[3] += 1;
          }  else {
            $generalDepression[0] += 1;
          }

      }//INNER WHILE
    }//OUTER WHILE
    $output['genDep'] = $generalDepression;
    $output['hasGenDep'] = $hasGenDep;

  }


  /*if ($action == "CourseDepression") {
    $noDepression = array();
    $mildDepression = array();
    $moderateDepression = array();
    $moderateSevereDepression = array();
    $severeDepression = array();
    $theCourses = array();
    $tempForTotal = 0;
    $courseTotal = 0;
    $totalStudents = 0;




    $selectCourses = "SELECT * FROM tbl_college WHERE CollegeDept = '$adminCollege' ORDER BY CourseName ASC";
    $coursesResult = mysqli_query($connection1, $selectCourses) or die("Failed to query the query1 ".mysqli_error($connection1));

    while ($rowCourses = mysqli_fetch_array($coursesResult)) {
      $sevDep = array();
      $mildDep = array();
      $modDep = array();
      $modSevDep = array();
      $noDep = array();

      $currentCourse = $rowCourses['CourseName'];
      array_push($theCourses, $currentCourse)
      $selectStudents = "SELECT * FROM tbl_user WHERE Course = '$currentCourse' AND access_type IS NULL";
      $resultStudents = mysqli_query($connection1, $selectStudents) or die("Failed to query the query1 ".mysqli_error($connection1));

      while ($rowStudents = mysqli_fetch_array($resultStudents)) {
        $totalStudents += 1;
        $userID = $rowStudents['UserID'];
        $queryPHQ = "SELECT MAX(Part) AS latestPhq, UserID FROM tbl_score WHERE UserID = '$userID'";//"SELECT * FROM tbl_score WHERE UserID = '$userID' AND QuestionID = 9 ORDER BY Part DESC";
        $resultPHQ = mysqli_query($connection1, $queryPHQ) or die("Failed to query the query1 ".mysqli_error($connection1));
        while ($rowPHQ = mysqli_fetch_array($resultPHQ)) {
          if (!$rowPHQ['latestPhq']) {
            break;
          }
          $totalScore = 0;
          $partPhq = $rowPHQ['latestPhq'];
          $useridPhq = $rowPHQ['UserID'];
          $queryComputeScore = "SELECT Score, QuestionID FROM tbl_score WHERE Part = $partPhq AND QuestionID != 10 AND UserID = '$useridPhq'";
          $resultComputeScore = mysqli_query($connection1, $queryComputeScore) or die("Failed to query the query1 ".mysqli_error($connection1));
          while ($rowCompute = mysqli_fetch_array($resultComputeScore)) {
            $totalScore += $rowCompute['Score'];
          }//MOST INNER WHILE

          if ($totalScore >= 20 ) {
            array_push($sevDep, $totalScore);
          } elseif ($totalScore>=5 && $totalScore <=9) {
            array_push($mildDep, $totalScore);
          } elseif ($totalScore>=10 && $totalScore <=14) {
            array_push($modDep, $totalScore);
          } elseif ($totalScore>=15 && $totalScore <=19) {
            array_push($modSevDep, $totalScore);
          }  else {
            array_push($noDep, $totalScore);
          }
        }//PHQ ROW
      }//ROW STUDENTS

    }//ROW COURSES
  }*/

  echo json_encode($output);
?>
