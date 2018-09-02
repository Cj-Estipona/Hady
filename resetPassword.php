<?php
  include 'db_conn.php';

  $errors = array();
  $response = array();

  if ($_POST['typeReset']=="initialReset") {
    $email = $_POST['email'];
    $email = mysqli_real_escape_string($connection1, $email);
    if (empty($_POST['email'])) {
      $response['success'] = false;
      $response['message'] = "Please enter your email address";
    } else {
      $querySearch = "SELECT * FROM tbl_user WHERE  Email = '$email'";
      $result = mysqli_query($connection1, $querySearch) or die("Failed to query database 1".mysqli_error($connection1));
      $row = mysqli_fetch_array($result);
      if (empty($row['Email'])) {
        $response['success'] = false;
        $response['message'] = "Sorry! This email is not yet registered";
      } else {
        $link = "www.hadycares.com/reset_password.php?action=3&email=".$row['Email']."&userCode=".$row['UserID']."";
        $to = $row['Email'];
        $subject = "Reset Password";
        $message =
        '<!DOCTYPE>
          <html>
          <head>
          <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
          </head>
          <body>

          <div>
                  <p>Hi ' . $row['FName'] . '!<br><br>Please click the link below to reset your password.<br></p>
                  <p>"<a href ="'. $link .'">Reset My Password</a>"</p>

          </div>
          </body>
        </html>';
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

        // More headers
        $headers .= 'From: <counselorHady@gmail.com>' . "\r\n";
        mail($to,$subject,$message,$headers);
        $response['success'] = true;
        $response['message'] = "An email was sent successfully. Please check your email";
      }
    }
  }

  if($_POST['typeReset'] == "finalReset"){
    $email = $_POST['email3'];
    $email = mysqli_real_escape_string($connection1, $email);
    $userID = $_POST['userId'];
    $password = $_POST['password'];
    $confirmPass = $_POST['confirmPassword'];

    if ($password != $confirmPass) {
      $response['success'] = false;
      $response['error'] = "Password does not match the confirm password.";
    }elseif (empty($password) || empty($confirmPass)) {
      $response['success'] = false;
      $response['error'] = "Please complete all the required fields.";
    } elseif (preg_match('/\s/',$password) || preg_match('/\s/',$confirmPass)) {
      $response['success'] = false;
      $response['error'] = "Whitespace is not allowed for password";
    } elseif (strlen($password) <= 5) {
      $response['success'] = false;
      $response['error'] = "Your password must be 6 or more characters.";
    }else {
      $queryNew = "UPDATE tbl_user SET Password=MD5('$confirmPass') WHERE UserID='$userID'";
      $result = mysqli_query($connection1, $queryNew) or die("Failed to query database 1".mysqli_error($connection1));
      if (mysqli_affected_rows($connection1)>0) {
        $response['success'] = true;
        $response['message'] = "You have successfully changed your password.";
      } else {
        $response['success'] = false;
        $response['message'] = "There was an error updating your password.";
      }

    }
  }

  echo json_encode($response);
?>
