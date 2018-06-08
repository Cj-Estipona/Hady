<?php
  session_start();
  include '../../db_conn.php';

  $request_body = file_get_contents('php://input');
  $data = json_decode($request_body);
  $action = $data->action;
  $output = "";

  if ($action == "getAvatar") {
    $userID = $_SESSION['userId'];
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
         <div class="col-sm-2 col-xs-3"><center><img src="data:image/jpeg;base64,'.base64_encode($row['AvatarName'] ).'" height="60px" width="60px" class="avatarImage" value='.$row['AvatarID'].'></center></div>';
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
 ?>
