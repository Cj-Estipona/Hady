<?php


  //FUNCTION TO CHECK IF SUICIDAL OR NOT
  function getUserDepression ($passID) {
     session_start();
     date_default_timezone_set("Asia/Manila");
     include '../db_conn.php';
     $userID = $passID;

    $depressionStatus = false;
    $suicidal = false;

    $queryCheckChat = "SELECT `ChatUse` FROM `tbl_preference` WHERE UserID = '$userID'";
    $resultChatUse = mysqli_query($connection1, $queryCheckChat) or die("Failed to query database ".mysqli_error());
    $rowCheckQ = mysqli_fetch_array($resultChatUse);

    if (($rowCheckQ['ChatUse'] % 2) != 0) {
      $chatUse = $rowCheckQ['ChatUse'];
      $scoreArray = array();
      $scoreContent = array();
      $totalScore = 0;


      $queryPhqResult = "SELECT * FROM `tbl_score` WHERE UserID='$userID' AND Part='$chatUse'";
      $resultPhqRes = mysqli_query($connection1, $queryPhqResult) or die("Failed to query database ".mysqli_error());

      while ($rowCheckPhq = mysqli_fetch_array($resultPhqRes)) {
        if ($rowCheckPhq['Score'] != NULL && $rowCheckPhq['QuestionID'] != 10) {
          $totalScore += $rowCheckPhq['Score'];
        }
        if ($rowCheckPhq['QuestionID'] == 9 && $rowCheckPhq['Score'] > 0) {
          $suicidal = true;
        }
      }

      if ($totalScore >= 20 || $suicidal) {
        $depressionStatus = true;
      }
    }
    return $depressionStatus;
  }

  function processMessage($update) {
      //CHECK IF SUICIDAL OR HAS SEVERE DEPRESSION
      if($update["result"]["action"] == "phqQuestionDifficulties"){
          $suicidalSeverity = getUserDepression($update["sessionId"]);

          $contextArray[] = ['name'=>'suicidalReminder', 'lifespan'=>1,'parameters'=>['suicidalVar'=>'Sad']];
          if ($suicidalSeverity) {
            $btnArray= ["Thanks Hady!"];
            $speech = "Thanks, this will be a big help for me to understand you more.<br><br> I also want to remind you that you can always approach our loving and caring guidance counselor if you have any problems whether it is personal or not. It is always a good thing to talk to someone who can understand more your thoughts. <br><br>You can also go to your Account Settings > Contacts to see the list of registered psychologist. ";
            $payloads = [['type'=>0,'speech'=>$speech],['type'=>4,'payload'=>['replies'=> $btnArray,'title' => 'Quick Reply Title']]];
            sendMessage(array(
                "source" => $update["result"]["source"],
                "messages" => $payloads,
                "speech" => $speech,
                "displayText" => $speech,
                "contextOut" => $contextArray
            ));
          }else {
            $btnArray= ["Thanks Hady!"];
            $speech = "Thanks, your result will be a big help for me to understand you more and I have a feeling that it will be a good one.";
            $payloads = [['type'=>0,'speech'=>$speech],['type'=>4,'payload'=>['replies'=> $btnArray,'title' => 'Quick Reply Title']]];
             sendMessage(array(
              "source" => $update["result"]["source"],
              "messages" => $payloads,
              "speech" => $speech,
              "displayText" => $speech,
              "contextOut" => $contextArray
             ));
          }

      }
      //RESPONSE FOR CHECKING if PHQ HAS GREATER THAN 0
      if($update["result"]["action"] == "phqQuestion-10"){
          session_start();
          date_default_timezone_set("Asia/Manila");
          include '../db_conn.php';
          $userID = $update["sessionId"];
          $hasCheckIn = false;

          $queryCheckChat = "SELECT `ChatUse` FROM `tbl_preference` WHERE UserID = '$userID'";
          $resultChatUse = mysqli_query($connection1, $queryCheckChat) or die("Failed to query database ".mysqli_error());
          $rowCheckQ = mysqli_fetch_array($resultChatUse);

          if (($rowCheckQ['ChatUse'] % 2) != 0) {
            $chatUse = $rowCheckQ['ChatUse'];

            $queryPhqResult = "SELECT * FROM `tbl_score` WHERE UserID='$userID' AND Part='$chatUse' AND QuestionID != 10";
            $resultPhqRes = mysqli_query($connection1, $queryPhqResult) or die("Failed to query database ".mysqli_error());

            while ($rowCheckPhq = mysqli_fetch_array($resultPhqRes)) {
              if ($rowCheckPhq['Score'] > 0) {
                $hasCheckIn = true;
                break;
              }
            }

          }

          if($hasCheckIn){
            $btnArray= ["Not difficult at all", "Somewhat difficult", "Very difficult", "Extremely difficult"];
            $contextArray[] = ['name'=>'PHQ-9Main-10th-followup', 'lifespan'=>1,'parameters'=>['PhqConfirmation'=>'Not difficult at all']];
            $speech = "Since you have checked off some problems, how difficult have those problems made it for you to Do your school work, take care of things at home, or get along with other people?";
            $payloads = [['type'=>0,'speech'=>$speech],['type'=>4,'payload'=>['replies'=> $btnArray,'title' => 'Quick Reply Title']]];
            sendMessage(array(
              "source" => $update["result"]["source"],
              "messages" => $payloads,
              "speech" => $speech,
              "displayText" => $speech,
              "contextOut" => $contextArray
            ));
          }else{
            $contextArray[] = ['name'=>'suicidalReminder', 'lifespan'=>1,'parameters'=>['suicidalVar'=>'Sad']];
            $btnArray= ["Thanks Hady!"];
            $speech = "Thanks, your result will be a big help for me to understand you more and I have a feeling that it will be a good one.";
            $payloads = [['type'=>0,'speech'=>$speech],['type'=>4,'payload'=>['replies'=> $btnArray,'title' => 'Quick Reply Title']]];
              sendMessage(array(
              "source" => $update["result"]["source"],
              "messages" => $payloads,
              "speech" => $speech,
              "displayText" => $speech,
              "contextOut" => $contextArray
             ));

          }

      }
      //RESPONSE FOR PHQ QUESTION NUMBER 2
      if($update["result"]["action"] == "phqQuestion-3"){
          $btnArray= ["Not at all", "Several days", "More than half the days", "Nearly every day"];
          $checkValue = $update["result"]["parameters"]["PhqScore"];
          $contextArray[] = ['name'=>'PHQ-9Main-2nd-followup', 'lifespan'=>0,'parameters'=>['PhqScore'=>$checkValue]];
          if($checkValue == "Not at all"){
              $speech = "That's good to know!<br><br>How about having trouble falling asleep, staying asleep, or sleeping too much?";
              $payloads = [['type'=>0,'speech'=>$speech],['type'=>4,'payload'=>['replies'=> $btnArray,'title' => 'Quick Reply Title']]];
               sendMessage(array(
                  "source" => $update["result"]["source"],
                  "messages" => $payloads,
                  "speech" => $speech,
                  "displayText" => $speech,
                  "contextOut" => $contextArray
                ));
          } else {
              $speech = "I'm sorry that you are going through a lot. Let me finish our PHQ-9 test and we can talk about it later.<br><br> For my next question, are you having trouble falling asleep, staying asleep, or sleeping too much?";
              $payloads = [['type'=>0,'speech'=>$speech],['type'=>4,'payload'=>['replies'=> $btnArray,'title' => 'Quick Reply Title']]];
              sendMessage(array(
                  "source" => $update["result"]["source"],
                  "messages" => $payloads,
                  "speech" => $speech,
                  "displayText" => $speech,
                  "contextOut" => $contextArray
                ));
          }

      }
      //Response for Greetings
      if($update["result"]["action"] == "greetings"){
          $contextArray[] = ['name'=>'greetingsMessage', 'lifespan'=>1,'parameters'=>['greet'=>'Nice']];
          sendMessage(array(
              "source" => $update["result"]["source"],
              "speech" => "Hello from webhook",
              "displayText" => "Hello from webhook",
              "contextOut" => $contextArray
          ));
      }
  }

  function sendMessage($parameters) {
      echo json_encode($parameters);
  }
  $update_response = file_get_contents("php://input");
  $update = json_decode($update_response, true);
  if (isset($update["result"]["action"])) {
      processMessage($update);
  }
?>
