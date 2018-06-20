<?php
  include 'db_conn.php';
  session_start();

  $errors = array();
  $response = array();
  $_SESSION['isLogin'] = false;
  $email = $_POST['email'];
  $password = $_POST['password'];
  $lastname = "";
  $nickname = "";
  $id = "";
  $access = "";


  //$response['hello'] = $email;

  $email = mysqli_real_escape_string($connection1, $email);
  $password = mysqli_real_escape_string($connection1, $password);

  if(empty($_POST['email'])){
    $errors['email'] = 'Email is needed!';
  }
  if(empty($_POST['password'])){
    $errors['password'] = 'Password is needed!';
  }

  if(!empty($email) && !empty($password)){
    $querySearch = "SELECT * FROM tbl_user WHERE  Email = '$email' AND Password = '$password'";
    $result = mysqli_query($connection1, $querySearch) or die("Failed to query database 1".mysqli_error($connection1));
    $row = mysqli_fetch_array($result);
    $id = $row['UserID'];
    $nickname = $row['Nickname'];
	$access = $row['access_type'];

    if(empty($row['Email']) || empty($row['Password'])){
      $errors['email'] = 'Invalid Email';
      $errors['password'] = 'Invalid Password';
    }
  }


  $response['errors'] = $errors;
  if(!empty($errors)){
    $response['success'] = false;
    $response['message'] = 'FAIL!';
  }
  else {
    $response['success'] = true;
	$response['access'] = $access;
    $response['message'] = 'SUCCESS!';
    $_SESSION['isLogin'] = true;
    $_SESSION['userId'] = $id;
    $_SESSION['nickname'] = $nickname;
    $_SESSION['currentSessionID'] = substr(md5(uniqid()), 20);
    $dateLogin = date('Y-m-d H:i:s');

    $queryChange = "UPDATE tbl_preference SET isLogin = 1 WHERE  UserID = '$id'";
    $result1 = mysqli_query($connection1, $queryChange) or die("Failed to query database 2 ".mysqli_error($connection1));

    $queryLogTime = "INSERT INTO tbl_time(`UserID`, `SessionID`, `Login`)
      VALUES('".$_SESSION['userId']."','".$_SESSION['currentSessionID']."','".$dateLogin."')";
    $resultLogTime = mysqli_query($connection1, $queryLogTime) or die("Failed to query database 2 ".mysqli_error($connection1));


  }

  echo json_encode($response);

?>
