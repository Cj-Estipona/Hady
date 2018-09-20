<?php
  include '../../db_conn.php';
  session_start();
  date_default_timezone_set("Asia/Manila");
  $adminCollege = $_SESSION['College'];

  $action = $_POST['action'];
  $adminID = $_POST['adminID'];
  $output = array();
  $dataToday = "";
  $dataUpcoming = "";
  $hasTodaysSched = false;
  $hasUpcomingSched = false;

  if ($action=="actionSched") {
    $dateToday = new DateTime();
    $newFormatDate = date_format($dateToday, 'Y-m-d');
    $todaysDate = substr($newFormatDate,0,10) . ' 00:00:00';
    $todaysDateLimit = substr($newFormatDate,0,10) . ' 23:59:59';


    $addSevenDays = $dateToday->add(new DateInterval('P7D'));
    $newSevenDays = date_format($addSevenDays, 'Y-m-d');
    $nextDate = substr($newSevenDays,0,10) . ' 00:00:00';
    $nextDateLimit = substr($newSevenDays,0,10) . ' 23:59:59';

    $selectSchedToday = "SELECT * FROM tbl_schedule WHERE UserID = '$adminID' AND (StartEvent >= '$todaysDate' AND StartEvent <= '$todaysDateLimit') ORDER BY StartEvent ASC";
    $resultSchedToday = mysqli_query($connection1, $selectSchedToday) or die("Failed to query the query1 ".mysqli_error($connection1));

    while ($rowToday = mysqli_fetch_array($resultSchedToday)) {
      $hasTodaysSched = true;
      $startEvent = new DateTime($rowToday['StartEvent']);
      $startFormat = date_format($startEvent, "h:i a");
      $endEvent = new DateTime($rowToday['EndEvent']);
      $endFormat = date_format($endEvent, "h:i a");

      $dataToday .= '
      <li class="list-group-item">
        <strong class="SchedTitle"><em>'.$rowToday['SchedTitle'].'</em></strong><br><br>
        <div class="row">
          <div class="col-md-6">
            <p><b>Start</b>: '.$startFormat.'</p>
          </div>
          <div class="col-md-6">
            <p><b>End</b>: '.$endFormat.'</p>
          </div>
        </div>
      </li>';
    }

    $upcomingSelect = "SELECT * FROM tbl_schedule WHERE UserID = '$adminID' AND (StartEvent > '$todaysDateLimit' AND StartEvent <= '$nextDateLimit') ORDER BY StartEvent ASC";
    $upcomingResult = mysqli_query($connection1, $upcomingSelect) or die("Failed to query the query1 ".mysqli_error($connection1));
    while ($rowUpcoming = mysqli_fetch_array($upcomingResult)) {
      $hasUpcomingSched = true;
      $startEventUpcoming = new DateTime($rowUpcoming['StartEvent']);
      $startFormatUpcoming = date_format($startEventUpcoming, "h:i a");
      $endEventUpcoming = new DateTime($rowUpcoming['EndEvent']);
      $endFormatUpcoming = date_format($endEventUpcoming, "h:i a");
      $dateFormat = date_format($startEventUpcoming, "F j, Y");

      $dataUpcoming .= '
      <li class="list-group-item">
        <div style="float:left"><b>Date</b>: '.$dateFormat.'</div>
        <br><br>
        <strong><em>'.$rowUpcoming['SchedTitle'].'</em></strong><br><br>
        <div class="row">
          <div class="col-md-6">
            <p><b>Start</b>: '.$startFormatUpcoming.'</p>
          </div>
          <div class="col-md-6">
            <p><b>End</b>: '.$endFormatUpcoming.'</p>
          </div>
        </div>
      </li>';
    }

    $output['todaysList'] = $dataToday;
    $output['hasTodaysSched'] = $hasTodaysSched;
    $output['hasUpcomingSched'] = $hasUpcomingSched;
    $output['upcomingList'] = $dataUpcoming;

  }
  echo json_encode($output);
?>
