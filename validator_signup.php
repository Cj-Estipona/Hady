<?php
  include 'db_conn.php';
  date_default_timezone_set("Asia/Manila");

  $backError = array();
  $backResponse = array();

  $fName = $_POST['FName'];
  $mName = $_POST['MName'];
  $lName = $_POST['LName'];
  $birthdate = $_POST['BDate'];
  $contact = $_POST['MNumber'];
  $gender = $_POST['optradio'];
  $course = $_POST['course'];
  $nickName = $_POST['FName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $avatarID = $_POST['disabledInput'];
  $date_today = date('Y-m-d H:i:s');
  $userID = md5(time() . mt_rand(1,1000000));

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query1 = "INSERT INTO tbl_user(`UserID`, `Email`, `Password`, `FName`, `MName`, `LName`, `BDate`, `MNumber`, `Gender`, `Course`,`Nickname`)
      VALUES('".$userID."','".$email."','".$password."','".$fName."','".$mName."','".$lName."','".$birthdate."','".$contact."','".$gender."','".$course."','".$nickName."')";
    $result = mysqli_query($connection1, $query1) or die("Failed to query the query1 ".mysqli_error($connection1));
    if($result) {
      $backResponse['query1'] = true;
    }else {
      $backResponse['query1'] = false;
    }
    //$last_id = mysqli_insert_id($connection1);
    $backResponse['lastID'] = $userID;
    $query2 = "INSERT INTO tbl_preference(`UserID`,`DateCreated`, `Icon`)
      VALUES('".$userID."','".$date_today."','".$avatarID."')";
    $result2 = mysqli_query($connection1, $query2) or die("Failed to query the query2 ".mysqli_error($connection1));
    if($result2) {
      $backResponse['query2'] = true;
    }else {
      $backResponse['query2'] = false;
    }
  }

  echo json_encode($backResponse);

 ?>
