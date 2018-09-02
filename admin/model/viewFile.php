<?php
  session_start();
  date_default_timezone_set("Asia/Manila");
  include '../../db_conn.php';
  $userID = $_SESSION['userId'];

  $fileId = isset($_GET['idAction']) ? $_GET['idAction'] : "";
  $queryFiles = "SELECT * FROM tbl_activity WHERE ActID = '$fileId'";
  $resultFiles = mysqli_query($connection1, $queryFiles) or die("Failed to query database ".mysqli_error());
  $rowFiles = mysqli_fetch_array($resultFiles);
  header('Content-Type:'.$rowFiles['ActivityMime']);
  echo $rowFiles['ActivityData'];
 ?>
