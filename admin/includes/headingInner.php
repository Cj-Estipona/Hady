<?php
  session_start();
  date_default_timezone_set("Asia/Manila");
  if(!$_SESSION['admin']){
    $_SESSION['isLogin'] = false;
  }
  if (!$_SESSION['isLogin']) {
    header("Location: ../../sign_in.php");
  }
  debug_to_console($_SESSION['userId']);

  $college = $_SESSION['College'];
  $adminID = $_SESSION['userId'];

  function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
  }
?>
