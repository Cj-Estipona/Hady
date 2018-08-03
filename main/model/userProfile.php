<?php
  session_start();
  date_default_timezone_set("Asia/Manila");
  include '../../db_conn.php';
  $userID = $_SESSION['userId'];

  $request_body = json_decode(file_get_contents('php://input'));
  //$action = $request_body->action;
  $action = $_GET['action'];
  $output = "";

  if ($action == "getAvatar") {
    $query = "SELECT tbl_avatar.* FROM tbl_avatar INNER JOIN tbl_preference ON tbl_avatar.AvatarID = tbl_preference.Icon WHERE tbl_preference.UserID = '$userID'";
    $result = mysqli_query($connection1, $query) or die("Failed to query database ".mysql_error());
    $row = mysqli_fetch_array($result);

    if($row > 0){
      $imgSrc = "data:image/jpeg;base64," .base64_encode($row['AvatarName'])."";
      echo $imgSrc;
    }
    else {
      echo json_encode("There was error when retrieving data");
    }
  }

  if($action == "displayImage")
  {

    $query = "SELECT * FROM tbl_avatar";
    $result = mysqli_query($connection1, $query) or die("Failed to query database ".mysql_error());
    $output = '
    <div class="avatarContainer">
      <div class="row">';

    while($row = mysqli_fetch_array($result))
    {
     $output .= '
         <div class="col-sm-2 col-xs-3"><center><img src="data:image/jpeg;base64,'.base64_encode($row['AvatarName'] ).'" height="60px" width="60px" class="avatarImage" ng-click="updateAvatar('.$row['AvatarID'].')"></center></div>';
    }
    $output .= '
    </div>
  </div>';
    /*echo '<div class="avatarContainer">
      <div class="row">
         <div class="col-sm-2 col-xs-3"><center><img src="../avatars/Astronaut_Character-256.png"></center></div>
    </div>
  </div>';*/
    echo $output;
   }

   if($action == "updateImage") {
     $passVar = $request_body->passVar;

     $query1 = "UPDATE tbl_preference SET Icon='$passVar' WHERE UserID = '$userID'";
     $result1 = mysqli_query($connection1, $query1) or die("Failed to query database ".mysqli_error());
     if(mysqli_affected_rows($connection1) > 0){
       echo "Your image was successfuly updated!";
     } else {
       echo "There is an error updating image.";
     }
   }

   if($action == "textNotif") {
     $output = array();
     $query1 = "SELECT * FROM tbl_preference WHERE UserID = '$userID'";
     $result1 = mysqli_query($connection1, $query1) or die("Failed to query database ".mysqli_error());
     $row = mysqli_fetch_array($result1);
     if($row){
       $output['textNotif'] = $row['TextNotif'];
     } else {
       $output['textNotif'] = "There is an error selecting text notification.";
     }

     $query2 = "SELECT * FROM tbl_privilage WHERE UserID = '$userID'";
     $result2 = mysqli_query($connection1, $query2) or die("Failed to query database ".mysqli_error());
     $row2 = mysqli_fetch_array($result2);
     if($row2){
       $output['allowStatus'] = $row2['ViewPriv'];
     } else {
       $output['allowStatus'] = "There is an error in privilage";
     }

     echo json_encode($output);
   }

   if($action == "updateTextNotif") {
     $passVar = $request_body->passVar;
     if($passVar){
       $notifStatus = 1;
     } else {
       $notifStatus = 0;
     }

     $query1 = "UPDATE tbl_preference SET TextNotif='$notifStatus' WHERE UserID = '$userID'";
     $result1 = mysqli_query($connection1, $query1) or die("Failed to query database ".mysqli_error());
     if(mysqli_affected_rows($connection1) > 0){
       echo "success";
     } else {
       echo "There is an error updating notification.";
     }
   }

   if($action == "updatePrivilage") {
     $passVar = $request_body->passVar;
     if($passVar){
       $allowStatus = 1;
     } else {
       $allowStatus = 0;
     }

     $query1 = "UPDATE tbl_privilage SET ViewPriv='$allowStatus' WHERE UserID = '$userID'";
     $result1 = mysqli_query($connection1, $query1) or die("Failed to query database ".mysqli_error());
     if(mysqli_affected_rows($connection1) > 0){
       echo "success";
     } else {
       echo "There is an error updating notification.";
     }
   }

   if($action == "updatePassword") {
     $passValue = $request_body->passValue;
     $oldPassword = $passValue->oldPassword;
     $newPassword = $passValue->newPassword;
     $confirmPassword = $passValue->confirmPassword;

     $query1 = selectFromUser($userID);
     $result1 = mysqli_query($connection1, $query1) or die("Failed to query database ".mysqli_error());
     $row = mysqli_fetch_array($result1);
     if($row){
       if($row['Password'] != $oldPassword){
         echo "You have entered an invalid old password";
       } elseif ($newPassword != $confirmPassword) {
         echo "Please check your new password";
       } else {
         $updateQuery = "UPDATE tbl_user SET Password='$confirmPassword' WHERE UserID = '$userID'";
         $result2 = mysqli_query($connection1, $updateQuery) or die("Failed to query database ".mysqli_error());
         if(mysqli_affected_rows($connection1) > 0){
           echo "success";
         } else {
           echo "There is an error updating password.";
         }
       }
     } else {
       echo "There is an Error in the Query";
     }
   }

   if($action == "getInfo") {
     $querySelect = selectFromUser($userID);
     $resultSelect = mysqli_query($connection1, $querySelect) or die("Failed to query database ".mysqli_error());
     $rowSelect = mysqli_fetch_array($resultSelect);
     $_SESSION['nickname'] = $rowSelect['Nickname'];
     echo json_encode($rowSelect);
   }

   if($action == "updateUserInfo") {
     $varToUpdate = $request_body->varToUpdate;
     $valToUpdate = $request_body->valToUpdate;

     $queryUpdate = "UPDATE tbl_user SET $varToUpdate='$valToUpdate' WHERE UserID = '$userID'";
     $updateResult = mysqli_query($connection1, $queryUpdate) or die("Failed to query database ".mysqli_error());
     if(mysqli_affected_rows($connection1) > 0){
       echo "success";
     } else {
       echo "There was an error updating your data. Please try again.";
     }
   }

   if($action == "updateUserInfoName") {
     $valFToUpdate = $request_body->valFToUpdate;
     $valMToUpdate = $request_body->valMToUpdate;
     $valLToUpdate = $request_body->valLToUpdate;

     $queryUpdate = "UPDATE tbl_user SET FName='$valFToUpdate',MName='$valMToUpdate',LName='$valLToUpdate' WHERE UserID = '$userID'";
     $updateResult = mysqli_query($connection1, $queryUpdate) or die("Failed to query database ".mysqli_error());
     if(mysqli_affected_rows($connection1) > 0){
       echo "success";
     } else {
       echo "There was an error updating your data. Please try again.";
     }
   }

   if ($action == "updateUserTheme") {
     $varToUpdate = $request_body->varToUpdate;
     $valToUpdate = $request_body->valToUpdate;

     $queryUpdate = "UPDATE tbl_preference SET $varToUpdate='$valToUpdate' WHERE UserID = '$userID'";
     $updateResult = mysqli_query($connection1, $queryUpdate) or die("Failed to query database ".mysqli_error());
     if(mysqli_affected_rows($connection1) > 0){
       echo "success";
     } else {
       echo "There was an error updating your data. Please try again.";
     }
   }

   if ($action == "getCourses") {
     $coursesArray = array();
     $output = array();
     $coursesQuery = "SELECT * FROM `tbl_college` ORDER BY `tbl_college`.`CollegeDept` ASC";
     $resultCourse = mysqli_query($connection1, $coursesQuery) or die("Failed to query database ".mysqli_error());
     while ($rowCourses = mysqli_fetch_array($resultCourse)) {
       $coursesArray[] = $rowCourses['CourseName'];
     }
     if (empty($coursesArray)) {
       $output['success'] = false;
     } else {
       $output['success'] = true;
     }
     $output['courses'] = $coursesArray;
     echo json_encode($output);
   }

   //Function for Selecting User Prifle and Preference
   function selectFromUser($userID){
     $selectQuery = "SELECT tbl_user.*, tbl_preference.isLogin,tbl_preference.TextNotif,tbl_preference.DateCreated,tbl_preference.Theme FROM tbl_user INNER JOIN tbl_preference ON tbl_user.UserID = tbl_preference.UserID WHERE tbl_preference.UserID = '$userID'";
     return $selectQuery;
   }

   mysqli_close($connection1);
 ?>
