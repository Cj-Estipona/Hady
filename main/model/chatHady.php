<?php
  session_start();
  date_default_timezone_set("Asia/Manila");
  include '../../db_conn.php';
  $userID = $_SESSION['userId'];
  $mySession = $_SESSION['currentSessionID'];

  $request_body = json_decode(file_get_contents('php://input'));
  //$action = $request_body->action;
  $action = $_GET['action'];
  $output = array();
  $val=0;


  if ($action == "checkChat") {
    $queryCheck = "SELECT tbl_preference.*, tbl_user.Nickname FROM tbl_preference INNER JOIN tbl_user ON tbl_preference.UserID = tbl_user.UserID WHERE tbl_preference.UserID='$userID'";
    $resultCheck = mysqli_query($connection1, $queryCheck) or die("Failed to query database ".mysqli_error());
    $rowCheck = mysqli_fetch_array($resultCheck);

    if ($rowCheck) {
      $output['userName'] = "My name is ".$rowCheck['Nickname'];
      $output['nickname'] = $rowCheck['Nickname'];
      $output['userIDsession'] = $userID;
      $output['successCheck'] = true;
      //$output['chatUse'] = $rowCheck['ChatUse'];
      $val = $rowCheck['ChatUse'];
      $output['chatUse'] = $val;
      if ($rowCheck['Counselling']==1) {
        $output['talkThe'] = true;
      } else {
        $output['talkThe'] = false;
      }
    } else {
      $output['successCheck'] = false;
    }
  }

  if($action == "setChat") {
    $querySet = "UPDATE tbl_preference SET ChatUse=1 WHERE UserID = '$userID'";
    $resultSet = mysqli_query($connection1, $querySet) or die("Failed to query database ".mysqli_error());

    $maxQuery = "SELECT MAX(Part) AS latestPhq FROM tbl_score WHERE UserID = '$userID'";
    $maxResult = mysqli_query($connection1, $maxQuery) or die("Failed to query database ".mysqli_error());
    $rowMax = mysqli_fetch_array($maxResult);
    $maxPhq = $rowMax['latestPhq'] + 1;
    if(mysqli_affected_rows($connection1) > 0){
      $queryInsert = "INSERT INTO tbl_score (`UserID`, `QuestionID`, `Part`) VALUES ('".$userID."',1,'".$maxPhq."'),
      ('".$userID."',2,'".$maxPhq."'),
      ('".$userID."',3,'".$maxPhq."'),
      ('".$userID."',4,'".$maxPhq."'),
      ('".$userID."',5,'".$maxPhq."'),
      ('".$userID."',6,'".$maxPhq."'),
      ('".$userID."',7,'".$maxPhq."'),
      ('".$userID."',8,'".$maxPhq."'),
      ('".$userID."',9,'".$maxPhq."'),
      ('".$userID."',10,'".$maxPhq."')";
      $resultInsert = mysqli_query($connection1, $queryInsert) or die("Failed to query database ".mysqli_error());
      if ($resultInsert) {
        $output['success'] = true;
      }else {
        $output['success'] = false;
      }
    } else {
      $output['success'] = false;
    }
  }

  if ($action == "loadMessages") {
    $messageArray = array();
    $contentArray = array();

    $queryMessage = "SELECT  tbl_chat.*, tbl_preference.Icon FROM tbl_chat INNER JOIN tbl_preference ON tbl_chat.UserID = tbl_preference.UserID WHERE tbl_chat.UserID = '$userID'";
    $resultMessage = mysqli_query($connection1, $queryMessage) or die("Failed to query database ".mysqli_error());

    while ($rowMessage = mysqli_fetch_array($resultMessage)){
      $contentArray['ChatID'] = $rowMessage['ChatID'];
      $contentArray['UserID'] = $rowMessage['UserID'];
      $contentArray['SentBy'] = $rowMessage['SentBy'];
      $contentArray['Message'] = $rowMessage['Message'];
      $contentArray['SentDate'] = date("D M j, g:i a", strtotime($rowMessage['SentDate']));
      if ($contentArray['SentBy'] == "Hady") {
        $contentArray['Icon'] = "counsellorHead.png";
      } else {
        $contentArray['Icon'] = $rowMessage['Icon'].".png";
      }
      array_push($messageArray, $contentArray);
    }//while

    $output['chat'] = $messageArray;
  }

  if ($action == "sendMessage") {
    $passMessage = mysqli_real_escape_string($connection1, $request_body->passMessage);
    $passWho = $request_body->passWho;
    $sender = "";
    $dateToday = date("Y-m-d H:i:s");

    $nicknameQuery = "SELECT Nickname FROM tbl_user WHERE UserID = '$userID'";
    $resultNickname = mysqli_query($connection1, $nicknameQuery) or die ('Unable to select database!');
    $rowNickname = mysqli_fetch_array($resultNickname);

    if ($rowNickname) {
      if ($passWho == 'bot') {
        $sender = 'Hady';
      } else {
        $sender = $rowNickname['Nickname'];
      }

      $querySend = "INSERT INTO tbl_chat (`UserID`,`SentBy`, `Message`, `SentDate`, `SessionID`) VALUES ('".$userID."', '".$sender."','".$passMessage."','".$dateToday."','".$mySession."')";
      $resultSend = mysqli_query($connection1, $querySend) or die ('Unable to select database!');

      if ($resultSend) {
        $output['success'] = true;
      } else {
        $output['success'] = false;
      }
    }
  }

  if ($action == "storeScore") {
    $actionFlow = $request_body->action;
    $scorePhq = strtolower($request_body->actionValue);
    $question = 0;
    $scoreQuestion = 0;
    $dateToday = date("Y-m-d H:i:s");

    switch ($actionFlow) {
      case 'phqQuestion-2':
        $question = 1;
        $scoreQuestion = checkIfExisting(1, $scorePhq);
        break;
      case 'phqQuestion-3':
        $question = 2;
        $scoreQuestion = checkIfExisting(1, $scorePhq);
        break;
      case 'phqQuestion-4':
        $question = 3;
        $scoreQuestion = checkIfExisting(1, $scorePhq);
        break;
      case 'phqQuestion-5':
        $question = 4;
        $scoreQuestion = checkIfExisting(1, $scorePhq);
        break;
      case 'phqQuestion-6':
        $question = 5;
        $scoreQuestion = checkIfExisting(1, $scorePhq);
        break;
      case 'phqQuestion-7':
        $question = 6;
        $scoreQuestion = checkIfExisting(1, $scorePhq);
        break;
      case 'phqQuestion-8':
        $question = 7;
        $scoreQuestion = checkIfExisting(1, $scorePhq);
        break;
      case 'phqQuestion-9':
        $question = 8;
        $scoreQuestion = checkIfExisting(1, $scorePhq);
        break;
      case 'phqQuestion-Thanks':
        $question = 9;
        $scoreQuestion = checkIfExisting(1, $scorePhq);
        break;
      case 'phqQuestionDifficulties':
        $question = 10;
        $scoreQuestion = checkIfExisting(0, $scorePhq);
        break;
      default:
        $question = 10;
        $scoreQuestion = checkIfExisting(0, $scorePhq);
        break;
    }
    $maxQuery = "SELECT MAX(Part) AS latestPhq FROM tbl_score WHERE UserID = '$userID'";
    $maxResult = mysqli_query($connection1, $maxQuery) or die("Failed to query database ".mysqli_error());
    $rowMax = mysqli_fetch_array($maxResult);
    $maxPhq = $rowMax['latestPhq'];
    if ($question != 0 ) {
      $queryScoreUp = "UPDATE tbl_score SET Score = '$scoreQuestion', Date = '$dateToday' WHERE QuestionID = '$question' AND UserID = '$userID' AND Part = $maxPhq";
      $resultScoreUp = mysqli_query($connection1, $queryScoreUp) or die("Failed to query database ".mysqli_error());
      if (mysqli_affected_rows($connection1) > 0) {
        $output['success'] = true;
      } else {
        $output['success'] = false;
      }
    }
  }

  if ($action == 'trial') {
    $queryCheckChat = "SELECT ChatUse FROM tbl_preference WHERE UserID = '$userID'";
    $resultChatUse = mysqli_query($connection1, $queryCheckChat) or die("Failed to query database ".mysqli_error());
    $rowCheckQ = mysqli_fetch_array($resultChatUse);

    if ($rowCheckQ) {
      $chatUse = $rowCheckQ['ChatUse'];
      $scoreArray = array();
      $scoreContent = array();
      $totalScore = 0;
      $depressionStatus = 0;
      $suicidal = false;

      $queryPhqResult = "SELECT * FROM tbl_score WHERE UserID='$userID' AND Part='$chatUse'";
      $resultPhqRes = mysqli_query($connection1, $queryPhqResult) or die("Failed to query database ".mysqli_error());

      while ($rowCheckPhq = mysqli_fetch_array($resultPhqRes)) {
        $scoreArray['UserID'] = $rowCheckPhq['UserID'];
        $scoreArray['Question'] = $rowCheckPhq['QuestionID'];
        $scoreArray['Score'] = $rowCheckPhq['Score'];
        $scoreArray['Date'] = $rowCheckPhq['Date'];
        if ($rowCheckPhq['Score'] != NULL && $rowCheckPhq['QuestionID'] != 10) {
          $totalScore += $rowCheckPhq['Score'];
        }
        if ($rowCheckPhq['QuestionID'] == 9 && $rowCheckPhq['Score'] > 0) {
          $suicidal = true;
        }
        array_push($scoreContent, $scoreArray);
      }
      if ($totalScore >= 20 || $suicidal) {
        $depressionStatus = "Severe Depression";
      } elseif ($totalScore>=5 && $totalScore <=9) {
        $depressionStatus = "Mild Depression";
      } elseif ($totalScore>=10 && $totalScore <=14) {
        $depressionStatus = "Moderate Depression";
      } elseif ($totalScore>=15 && $totalScore <=19) {
        $depressionStatus = "Moderately Severe Depression";
      }  else {
        $depressionStatus = "No Depression";
      }

      $output['success'] = true;
      $output['totalScore'] = $totalScore;
      $output['part'] = $scoreContent;
      $output['depressionStatus'] = $depressionStatus;
    }
  }

  if ($action == "counselling") {
    $queryCounselling = "UPDATE tbl_preference SET Counselling = 1 WHERE UserID = '$userID'";
    $resultCounselling = mysqli_query($connection1, $queryCounselling) or die("Failed to query database ".mysqli_error());
    if (mysqli_affected_rows($connection1) > 0) {
      $output['success'] = true;
    } else {
      $output['success'] = false;
    }
  }

  echo json_encode($output);

  function checkIfExisting($flag, $value){

    $phqScores = ['not at all', 'several days', 'more than half the days', 'nearly every day', '0', '1', '2', '3'];
    $phqdifficulties = ['not difficult at all', 'somewhat difficult', 'very difficult', 'extremely difficult', '0', '1', '2', '3'];

    if ($flag==1) {
      for ($i=0; $i < count($phqScores) ; $i++) {
        if (stripos($phqScores[$i], $value) !== false) {
            return $i;
        }
      }
    } else {
      for ($i=0; $i < count($phqdifficulties) ; $i++) {
        if (stripos($phqdifficulties[$i], $value) !== false) {
            return $i;
        }
      }
    }


  }


?>
