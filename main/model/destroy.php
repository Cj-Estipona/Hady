<?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();
date_default_timezone_set("Asia/Manila");
include '../../db_conn.php';
$userID = $_SESSION['userId'];
$sessionID = $_SESSION['currentSessionID'];
$dateLogout = date('Y-m-d H:i:s');
$loginTime = "";
$logoutTime = "";

// Unset all of the session variables.
$_SESSION = array();

//update query for Islogin Column
$query1 = "UPDATE tbl_preference SET IsLogin=0 WHERE UserID = '$userID'";
$result1 = mysqli_query($connection1, $query1) or die("Failed to query database ".mysqli_error());
if(mysqli_affected_rows($connection1) > 0){
  //update query for logout time
  $queryLogout = "UPDATE tbl_time SET Logout='$dateLogout' WHERE UserID = '$userID' AND SessionID = '$sessionID'";
  $resultLogout = mysqli_query($connection1, $queryLogout) or die("Failed to query database ".mysqli_error());
  if (mysqli_affected_rows($connection1) > 0) {
    //Select values for the login and logout time
    $querySelectTime = "SELECT * FROM tbl_time WHERE UserID = '$userID' AND SessionID = '$sessionID'";
    $resultSelectTime = mysqli_query($connection1, $querySelectTime) or die("Failed to query database ".mysqli_error());
    $row = mysqli_fetch_array($resultSelectTime);
    if($row > 0){
      $loginTime = date('Y-m-d H:i:s',  strtotime($row['Login']));
      $logoutTime = date('Y-m-d H:i:s',  strtotime($row['Logout']));
      //updating the total time difference
      $queryTotalTime = "SELECT TIMESTAMPDIFF(MINUTE,'".$loginTime."','".$logoutTime."')";
      $resultTotalTime = mysqli_query($connection1, $queryTotalTime) or die("Failed to query database ".mysqli_error());
      $rowTotalTime = mysqli_fetch_array($resultTotalTime);
      if ($rowTotalTime > 0) {
        $queryUpdateTotalTime = "UPDATE tbl_time SET TotalTime='$rowTotalTime[0]' WHERE UserID = '$userID' AND SessionID = '$sessionID'";
        $resultUpdateTime = mysqli_query($connection1, $queryUpdateTotalTime) or die("Failed to query database ".mysqli_error());
        // If it's desired to kill the session, also delete the session cookie.
        // Note: This will destroy the session, and not just the session data!
        if (ini_get("session.use_cookies")) {
          $params = session_get_cookie_params();
          setcookie(session_name(), '', time() - 42000,
              $params["path"], $params["domain"],
              $params["secure"], $params["httponly"]
          );
        }
        // Finally, destroy the session.
        echo "success";
        session_destroy();
      } else {
        echo "There is no Time stamp Diff!";
      }
    } else {
      echo "No Selected Login Time and Log Out Time";
    }
  } else {
    echo "There is an error updating the logout column.";
  }
} else {
  echo "There is an error updating database.";
}


?>
