<?php
  include '../../db_conn.php';
  date_default_timezone_set("Asia/Manila");

  $userID = $_GET['userID'];

  $deletetblMeeting = "DELETE FROM tbl_meeting WHERE MeetingTo = '$userID'";
  $resultMeeting = mysqli_query($connection1, $deletetblMeeting) or die("Failed to query database ".mysqli_error());

  $deletetblMood = "DELETE FROM tbl_mood WHERE UserID = '$userID'";
  $resultMood = mysqli_query($connection1, $deletetblMood) or die("Failed to query database ".mysqli_error());

  $deletetblNotifications = "DELETE FROM tbl_notifications WHERE UserID = '$userID'";
  $resultNotifications = mysqli_query($connection1, $deletetblNotifications) or die("Failed to query database ".mysqli_error());

  $deletetblPrivilage = "DELETE FROM tbl_privilage WHERE UserID = '$userID'";
  $resultPrivilage = mysqli_query($connection1, $deletetblPrivilage) or die("Failed to query database ".mysqli_error());

  $deletetblPreference = "DELETE FROM tbl_preference WHERE UserID = '$userID'";
  $resultPreference = mysqli_query($connection1, $deletetblPreference) or die("Failed to query database ".mysqli_error());

  $deletetblChat = "DELETE FROM tbl_chat WHERE UserID = '$userID'";
  $resultChat = mysqli_query($connection1, $deletetblChat) or die("Failed to query database ".mysqli_error());

  $deletetblScedule = "DELETE FROM tbl_schedule WHERE UserID = '$userID'";
  $resultSchedule = mysqli_query($connection1, $deletetblScedule) or die("Failed to query database ".mysqli_error());

  $deletetblScore = "DELETE FROM tbl_score WHERE UserID = '$userID'";
  $resultScore = mysqli_query($connection1, $deletetblScore) or die("Failed to query database ".mysqli_error());

  $deletetblTime = "DELETE FROM tbl_time WHERE UserID = '$userID'";
  $resultTime = mysqli_query($connection1, $deletetblTime) or die("Failed to query database ".mysqli_error());

  $deletetblUser = "DELETE FROM tbl_user WHERE UserID = '$userID'";
  $resultUser = mysqli_query($connection1, $deletetblUser) or die("Failed to query database ".mysqli_error());

  echo "success";
?>
