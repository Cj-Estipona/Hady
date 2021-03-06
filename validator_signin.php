<?php
  include 'db_conn.php';
  session_start();
  date_default_timezone_set("Asia/Manila");

  $errors = array();
  $response = array();
  $_SESSION['isLogin'] = false;
  $email = $_POST['email'];
  $password = $_POST['password'];
  $lastname = "";
  $nickname = "";
  $id = "";
  $access = "";
  $flag = false;
  $anotherFlag = false;

  //$response['hello'] = $email;

  $email = mysqli_real_escape_string($connection1, $email);
  $password = mysqli_real_escape_string($connection1, $password);

  if(empty($_POST['email'])){
    $errors['email'] = 'Email is needed!';
  }
  if(empty($_POST['password'])){
    $errors['password'] = 'Password is needed!';
  }

  //$hashPassword = md5($password);

  if(!empty($email) && !empty($password)){
    $querySearch = "SELECT * FROM tbl_user WHERE  Email = '$email' AND Password = MD5('$password')";
    $result = mysqli_query($connection1, $querySearch) or die("Failed to query database 1".mysqli_error($connection1));
    $row = mysqli_fetch_array($result);
    $id = $row['UserID'];
    $nickname = $row['Nickname'];
	  $access = $row['access_type'];
	  $course = $row['Course'];

	//QUERY

    if(empty($row['Email']) || empty($row['Password'])){
      $errors['email'] = 'Invalid Email';
      $errors['password'] = 'Invalid Password';
      $anotherFlag = true;
    }

    if($row['IsEmailConfirmed'] == 0 && !$anotherFlag){
      $errors['emailConfirmed'] = "Please Confirm you email account.";
      $flag = true;
    } else {
      $flag = false;
    }
  }

  	if($access != null)
	{
		$querySearch = "SELECT CollegeDept FROM tbl_college Where CourseName = '$course'";
		$result = mysqli_query($connection1, $querySearch) or die("Failed to query database 1".mysqli_error($connection1));
		$row = mysqli_fetch_array($result);
		$college = $row['CollegeDept'];
	}

  $response['errors'] = $errors;
  if(!empty($errors)){
    if ($flag) {
      $response['success'] = true;
      $response['confirmAlert'] = true;
    } else {
      $response['success'] = false;
      $response['message'] = 'FAIL!';
    }

  }
  else {
    $response['success'] = true;
    $response['confirmAlert'] = false;
	  $response['access'] = $access;
    $response['message'] = 'SUCCESS!';
    $_SESSION['isLogin'] = true;
    $_SESSION['userId'] = $id;
    $_SESSION['nickname'] = $nickname;
    $_SESSION['course'] = $course;
  	if($access!= null)
  	{$_SESSION['College'] = $college;}
    $_SESSION['currentSessionID'] = substr(md5(uniqid()), 20);
    $dateLogin = date('Y-m-d H:i:s');

  	if($access == 1){
  		$_SESSION['admin'] = true;
  	}
  	else{
  		$_SESSION['admin'] = false;
  	}

    $queryChange = "UPDATE tbl_preference SET isLogin = 1 WHERE  UserID = '$id'";
    $result1 = mysqli_query($connection1, $queryChange) or die("Failed to query database 2 ".mysqli_error($connection1));

    $queryLogTime = "INSERT INTO tbl_time(`UserID`, `SessionID`, `Login`)
      VALUES('".$_SESSION['userId']."','".$_SESSION['currentSessionID']."','".$dateLogin."')";
    $resultLogTime = mysqli_query($connection1, $queryLogTime) or die("Failed to query database 2 ".mysqli_error($connection1));


  }

  echo json_encode($response);

?>
