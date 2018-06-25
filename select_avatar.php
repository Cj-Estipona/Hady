<?php
  session_start();
  include 'db_conn.php';
  $userID = "";
  $output = '';

  if($_POST["action"] == "fetch")
  {
    $query = "SELECT * FROM tbl_avatar";
    $result = mysqli_query($connection1, $query) or die("Failed to query database ".mysql_error());
    $output = '
    <div class="avatarContainer">
      <div class="row">';

    while($row = mysqli_fetch_array($result))
    {
     $output .= '
         <div class="col-sm-2 col-xs-3"><center><input type="image" src="data:image/jpeg;base64,'.base64_encode($row['AvatarName'] ).'" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(this)" value='.$row['AvatarID'].'></center></div>';
    }
    $output .= '
    </div>
  </div>';
    echo $output;
   }
   else {
     $userID = $_SESSION['userId'];
     $query = "SELECT tbl_avatar.* FROM tbl_avatar INNER JOIN tbl_preference ON tbl_avatar.AvatarID = tbl_preference.Icon WHERE tbl_preference.UserID = '$userID'";
     $result = mysqli_query($connection1, $query) or die("Failed to query database ".mysql_error());

     while($row = mysqli_fetch_array($result))
     {
      $output = '
          <img src="data:image/jpeg;base64,'.base64_encode($row['AvatarName'] ).'" height="60px" width="60px" class="avatarImage" value='.$row['AvatarID'].'>';
     }
     echo $output;
   }
 ?>
