<?php
  include '../../db_conn.php';
  session_start();
  date_default_timezone_set("Asia/Manila");
  $adminCollege = $_SESSION['College'];
  header('Content-Type: application/json');


  $output = array();

  $totalStudentsQuery = "SELECT COUNT(tbl_user.UserID) AS CountOfStudents FROM tbl_user INNER JOIN tbl_college ON tbl_user.Course = tbl_college.CourseName WHERE tbl_college.CollegeDept = '$adminCollege' AND access_type IS NULL";
  $queryTotal = mysqli_query($connection1, $totalStudentsQuery) or die("Failed to query the query1 ".mysqli_error($connection1));
  $rowTotal = mysqli_fetch_array($queryTotal);
  $output['totalStudents'] = $rowTotal['CountOfStudents'];

  echo json_encode($output);

?>
