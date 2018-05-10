<?php
  include 'db_conn.php';
  session_start();

  $errors = array();
  $response = array();

  $email = $_POST['email'];
  $password = $_POST['password'];
  $lastname = "";
  $firstName = "";
  $id = "";


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
    $response['message'] = 'SUCCESS!';
    $queryChange = "UPDATE tbl_preference SET isLogin = 1 WHERE  UserID = '$id'";
    $result1 = mysqli_query($connection1, $queryChange) or die("Failed to query database 2 ".mysqli_error($connection1));


  }

  echo json_encode($response);

?>
