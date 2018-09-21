<?php
  include 'db_conn.php';

  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/Exception.php';
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';

  function emailBody($link) {
    $messageBody = "";
    $messageBody.="<html>
    	<body>
    		<div class='container' style='width:450px;height:300px;margin-top:0;margin-bottom:0;margin-right:auto;margin-left:auto;background-color:#ffffff;padding-top:10px;padding-bottom:10px;padding-right:10px;padding-left:10px;' >
    			<div class='heading'>
    				<img src='https://www.hadycares.com/resources/LogoNamePNG.png' alt='Hady Logo' id='hadyLogo' style='width:120px;height:40px;' >
    				<hr style='border-width:0;height:1px;background-color:#333;background-image:linear-gradient(to right, #ccc, #333, #ccc);background-repeat:repeat;background-position:top left;background-attachment:scroll;' >
    				<br>
    			</div>
    			<div class='body' style='text-align:center;' >
    				<h1>Account Confirmation</h1>
    				<p>To reset your password please click the button below.</p>
    				<br><br>
    				<a href='$link' class='btnConfirm' style='border-width:0;box-shadow:none;border-radius:50px;background-color:#51B47B;border-color:#51B47B;padding-top:20px;padding-bottom:20px;padding-left:50px;padding-right:50px;color:#ffffff;text-decoration:none;' >CONFIRM ACCOUNT</a>
    			</div>
    		</div>
    	</body>
    </html>";

    return $messageBody;
  }

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
        /*$mail = new PHPMailer();
        $mail->IsSMTP();
        $mail->Host = 'mx1.hostinger.ph';
        $mail->Port = 587;
        $mail->SMTPAuth = true;
        $mail->Username = 'counselorhady@hadycares.com';
        $mail->Password = 'fisharefriendster';
        $mail->SMTPSecure = '';

        $mail->setFrom('counselorhady@hadycares.com', 'Hady');
        $mail->addAddress($email);

        $mail->isHTML(true);
        $mail->Subject = "Reset Password";
        $mail->Body = emailBody($link);/*"Please click on the link below<br><br>
          <a href='localhost/Hady/confirm.php?email=$email&token=$token'>Confirm Account</a>
        ";
        if(!$mail->send()){
          $response['success'] = false;
          $response['message'] = 'Mailer Error: ' . $mail->ErrorInfo;
        } else {
          $response['success'] = true;
          $response['message'] = "An email was sent successfully. Please check your email";
        }*/
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
