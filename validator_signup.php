<?php
  include 'db_conn.php';
  date_default_timezone_set("Asia/Manila");
  header('Content-Type: application/json');
  /*use PHPMailer\PHPMailer\PHPMailer;
  include 'PHPMailer/PHPMailer.php';*/
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception;

  require 'PHPMailer/Exception.php';
  require 'PHPMailer/PHPMailer.php';
  require 'PHPMailer/SMTP.php';

  function emailBody($email, $token) {
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
    				<p>You’re almost there. Confirm your account below to finish creating your Hady account.</p>
    				<br><br>
    				<a href='localhost/Hady/confirm.php?email=$email&token=$token' class='btnConfirm' style='border-width:0;box-shadow:none;border-radius:50px;background-color:#51B47B;border-color:#51B47B;padding-top:20px;padding-bottom:20px;padding-left:50px;padding-right:50px;color:#ffffff;text-decoration:none;' >CONFIRM ACCOUNT</a>
    			</div>
    		</div>
    	</body>
    </html>";

    return $messageBody;
  }

  $backError = array();
  $backResponse = array();

  $fName = $_POST['FName'];
  $mName = $_POST['MName'];
  $lName = $_POST['LName'];
  $birthdate = $_POST['BDate'];
  $contact = $_POST['MNumber'];
  $studNum = $_POST['studNum'];
  $gender = $_POST['optradio'];
  $privilage = $_POST['optAllow'];
  $course = $_POST['course'];
  $nickName = $_POST['FName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $avatarID = $_POST['disabledInput'];
  $date_today = date('Y-m-d H:i:s');
  $userID = md5(time() . mt_rand(1,1000000));
  $token = substr(md5(uniqid()), 20);
  $backResponse['msg'] = "ERROR";

  if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $query1 = "INSERT INTO tbl_user(`UserID`, `Email`, `Password`, `FName`, `MName`, `LName`, `BDate`, `MNumber`, `Gender`, `Course`,`Nickname`, `StudNumber`, `Token`)
      VALUES('".$userID."','".$email."','".md5($password)."','".$fName."','".$mName."','".$lName."','".$birthdate."','".$contact."','".$gender."','".$course."','".$nickName."','".$studNum."','".$token."')";
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

    $query3 = "INSERT INTO tbl_privilage(`UserID`,`ViewPriv`)
      VALUES('".$userID."','".$privilage."')";
    $result3 = mysqli_query($connection1, $query3) or die("Failed to query the query2 ".mysqli_error($connection1));
    if($result3) {
      $backResponse['query3'] = true;
    }else {
      $backResponse['query3'] = false;
    }

    //email confirmation sending
    if($backResponse['query1'] && $backResponse['query2'] && $backResponse['query3']){
      $mail = new PHPMailer();
      $mail->IsSMTP();
      $mail->Host = 'smtp.gmail.com';
      $mail->Port = 587;
      $mail->SMTPAuth = true;
      $mail->Username = 'counselorhady@gmail.com';
      $mail->Password = 'fisharefriendster';
      $mail->SMTPSecure = '';

      $mail->setFrom('counselorhady@gmail.com', 'Hady');
      $mail->addAddress($email);

      $mail->isHTML(true);
      $mail->Subject = "Hady Account Confirmation";
      $mail->Body = emailBody($email, $token);/*"Please click on the link below<br><br>
        <a href='localhost/Hady/confirm.php?email=$email&token=$token'>Confirm Account</a>
      ";*/
      if(!$mail->send()){
        $backResponse['query4'] = false;
        $backResponse['msg'] = 'Mailer Error: ' . $mail->ErrorInfo;
      } else {
        $backResponse['query4'] = true;
        $backResponse['msg'] = "Email has been successfully sent";
      }
    }

  }

  echo json_encode($backResponse);

 ?>
