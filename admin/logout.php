<?php
$_SESSION['isLogin'] = false;
  if (!$_SESSION['isLogin']) {
    header("Location: ../sign_in.php");
  }
?>