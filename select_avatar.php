<?php
  include 'db_conn.php';

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
 ?>
