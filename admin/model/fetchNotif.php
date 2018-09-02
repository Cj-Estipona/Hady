<?php
  include '../../db_conn.php';
  session_start();
  date_default_timezone_set("Asia/Manila");
  $adminCollege = $_SESSION['College'];

  if (isset($_POST['view'])) {
    if ($_POST['view'] != '') {
      $updateStatus = "UPDATE tbl_notifications AS tblNotif
        INNER JOIN tbl_user AS tblUser ON tblNotif.UserID = tblUser.UserID
        INNER JOIN tbl_college AS tblCol ON tblUser.Course = tblCol.CourseName
        SET tblNotif.NotifStatus=1
        WHERE (tblCol.CollegeDept = '$adminCollege' AND tblUser.access_type IS NULL)
        AND tblNotif.NotifStatus = 0";
      $resultStatus = mysqli_query($connection1, $updateStatus) or die("Failed to query the query1 ".mysqli_error($connection1));

    }
    $dateToday = new DateTime();
    $newFormatDate = date_format($dateToday, 'Y-m-d');

    $queryNotif = "SELECT tbl_notifications.*, tbl_user.UserID, tbl_user.FName, tbl_user.LName FROM tbl_notifications
      INNER JOIN tbl_user ON tbl_notifications.UserID = tbl_user.UserID
      INNER JOIN tbl_college ON tbl_user.Course = tbl_college.CourseName
      WHERE (tbl_college.CollegeDept = '$adminCollege' AND tbl_user.access_type IS NULL)
      /*AND (tbl_notifications.NotifStatus = '0' OR tbl_notifications.NotifDate LIKE '%$newFormatDate%')*/
      ORDER BY tbl_notifications.NotifDate DESC";
    $resultNotif = mysqli_query($connection1, $queryNotif) or die("Failed to query the query1 ".mysqli_error($connection1));
    $data = '';
    if(mysqli_num_rows($resultNotif) > 0){
      while ($rowNotif = mysqli_fetch_array($resultNotif)) {
        $dateNotif = new DateTime($rowNotif['NotifDate']);
        $newDateNotif = date_format($dateNotif, "F j, Y h:ia");
        if($rowNotif['NotifStatus'] == 0){
          $classBackground = "highlighter";
        } else {
          $classBackground = "";
        }
        $data .= '
        <li class="list-group-item listNotif '.$classBackground.'">
          <a href="model/viewProfile.php?idAction='.$rowNotif['UserID'].'">
            <strong>'.$rowNotif['LName'].', '.$rowNotif['FName'].'</strong><br>
            <p>'.$rowNotif['NotifMessage'].'</p>
            <small><em>'.$newDateNotif.'</em></small>
          </a>
        </li>';
      }
    } else {
      $data .= '<li><a href="#" class="text-bold text-italic">No Notification Found</a></li>';
    }

    $queryUnread = "SELECT tbl_notifications.*, tbl_user.FName, tbl_user.LName FROM tbl_notifications
    INNER JOIN tbl_user ON tbl_notifications.UserID = tbl_user.UserID
    INNER JOIN tbl_college ON tbl_user.Course = tbl_college.CourseName
    WHERE (tbl_college.CollegeDept = '$adminCollege' AND access_type IS NULL)
    AND tbl_notifications.NotifStatus = '0'";
    $resultUnread = mysqli_query($connection1, $queryUnread) or die("Failed to query the query1 ".mysqli_error($connection1));
    $count = mysqli_num_rows($resultUnread);
    $output = array(
      'notifications' => $data,
      'unseen_notifications' => $count
    );

    echo json_encode($output);

  }


?>
