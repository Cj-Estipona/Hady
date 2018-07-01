<?php
  session_start();
  include '../../db_conn.php';
  $userID = $_SESSION['userId'];

  $request_body = json_decode(file_get_contents('php://input'));
  //$action = $request_body->action;
  $action = $_GET['action'];
  date_default_timezone_set('Asia/Manila');

  if ($action=="getCurrMood") {
    $passFirstday = new DateTime($request_body->passFirstday);
    $passLastday =  new DateTime($request_body->passLastday);
    $firstVar = $passFirstday->format('Y-m-d H:i:s');
    $lastVar = $passLastday->format('Y-m-d H:i:s');
    $first = substr($firstVar,0,10) . ' 00:00:00';
    $last =  substr($lastVar,0,10) . ' 00:00:00';
    $output = array(); //json array for the passing of data to javascript
    $scopeData = array(); //array for the equivalent numbers of moodlvl
    $scopeDate = array(); //array for the date parallel to the scopeData
    $numOfArray = array(); //
    $daysOfArray = array(); //array for the day of the week 2018-06-17,2018-06-18...2018-06-23
    $dataArray = array(); //array for the result of the first query which is to get the data within the week
    $avePerDayArr = array(); //array for the average mood of user per day
    $avePerWeekHolder = 0;
    $avePerWeek = 0;
    $strMood = "";
    $moodFeelHolder = array(); //storing the mood string

    //call the query
    $resultData = getUserWeekData($connection1,$first,$last,$userID);
    $rowNum = mysqli_num_rows($resultData);
    $counterTimes = 0;
    $dateFromLocal = new DateTime($first);
    $dateHolder =  $dateFromLocal->format('Y-m-d');
    if ($rowNum) {
      //get the table data and pass to array
      while ($row = mysqli_fetch_array($resultData)){
        $dataArray[]=$row;
      }//while

      //initialize the first day of the week
      $dateFromLocal2 = $first;
      $day =  substr($dateFromLocal2,0,10);
      $daysOfArray[] = $day;
      for ($z=1; $z < 7; $z++) {
        //+1Day
        $day = date('Y-m-d', strtotime( $day . '+1 day' ));
        $daysOfArray[] = $day;
      }
      //Selecting data for each day of the week

      $dayQuery = "SELECT  (SELECT COUNT(*) FROM  `tbl_mood` WHERE UserID = '$userID' AND MoodDate LIKE '%$daysOfArray[0]%' ORDER BY MoodDate ASC) AS moodDay1,(SELECT COUNT(*) FROM  `tbl_mood` WHERE UserID = '$userID' AND MoodDate LIKE '%$daysOfArray[1]%' ORDER BY MoodDate ASC) AS moodDay2,(SELECT COUNT(*) FROM `tbl_mood` WHERE UserID = '$userID' AND MoodDate LIKE '%$daysOfArray[2]%' ORDER BY MoodDate ASC) AS moodDay3,(SELECT COUNT(*) FROM `tbl_mood` WHERE UserID = '$userID' AND MoodDate LIKE '%$daysOfArray[3]%' ORDER BY MoodDate ASC) AS moodDay4,(SELECT COUNT(*) FROM `tbl_mood` WHERE UserID = '$userID' AND MoodDate LIKE '%$daysOfArray[4]%' ORDER BY MoodDate ASC) AS moodDay5,(SELECT COUNT(*) FROM `tbl_mood` WHERE UserID = '$userID' AND MoodDate LIKE '%$daysOfArray[5]%' ORDER BY MoodDate ASC) AS moodDay6,(SELECT COUNT(*) FROM `tbl_mood` WHERE UserID = '$userID' AND MoodDate LIKE '%$daysOfArray[6]%' ORDER BY MoodDate ASC) AS moodDay7";
      $resultDayQuery = mysqli_query($connection1, $dayQuery) or die("Failed to query database ".mysqli_error());
      $rowDayData = mysqli_fetch_array($resultDayQuery);

      //initialize array for data
      for ($i=0; $i < max($rowDayData); $i++) {
        $scopeData[$i] = array();
        $scopeDate[$i] = array();
      }

      //inserting the data in the array
      $maximumRow = max($rowDayData);
      $dataArrNum = 0;
      $moodLvl = 0;
      $moodLvl2 = 0;
      for ($j=0; $j < 7 ; $j++) { //for the days of the week Sunday-Saturday
        $avePerDayHolder = 0;
        $remainingRow = $maximumRow-$rowDayData[$j];
        $checkEmpty = false;
        for ($i=0; $i < $rowDayData[$j] ; $i++) { //for the column of the specific day
          $checkEmpty = true;
          $indexArrNum = $dataArrNum++;
          $moodHolder = $dataArray[$indexArrNum]['MoodLvl'];
          $dateMoodHolder = substr($dataArray[$indexArrNum]['MoodDate'],10,-3);
          if ($moodHolder == 'Very Low') {
            $moodLvl = 20;
          } elseif ($moodHolder == 'Low') {
            $moodLvl = 40;
          } elseif ($moodHolder == 'Neutral') {
            $moodLvl = 60;
          } elseif ($moodHolder == 'High') {
            $moodLvl = 80;
          } else {
            $moodLvl = 100;
          }
          $scopeData[$i][$j] = $moodLvl;
          $scopeDate[$i][$j] = $dateMoodHolder;
          //inserting 0 for no mood log
          if($i==$rowDayData[$j]-1){
            for ($k=$i+1; $k < $maximumRow; $k++) {
              $scopeData[$k][$j] = 0;
              $scopeDate[$k][$j] = '';
            }
          }
        }// inner for loop
        //if there is no log for the day
        if (!$checkEmpty) {
          for ($i=0; $i < $maximumRow ; $i++) {
            $scopeData[$i][$j] = 0;
            $scopeDate[$i][$j] = '';
          }
        }
        //getting the average per day;
        for ($z=0; $z < $maximumRow ; $z++) {
          $avePerDayHolder += $scopeData[$z][$j];
        }
        //average perday array
        if ($avePerDayHolder != 0) {
          $avePerDayArr[] = $avePerDayHolder/$rowDayData[$j];
        } else {
          $avePerDayArr[] = 0;
        }

      }//outer for loop
      //average for thee whole week
      for ($z=0; $z < $rowNum; $z++) {
        if ($dataArray[$z]['MoodLvl'] == 'Very Low') {
          $moodLvl2 = 20;
        } elseif ($dataArray[$z]['MoodLvl'] == 'Low') {
          $moodLvl2 = 40;
        } elseif ($dataArray[$z]['MoodLvl'] == 'Neutral') {
          $moodLvl2 = 60;
        } elseif ($dataArray[$z]['MoodLvl'] == 'High') {
          $moodLvl2 = 80;
        } else {
          $moodLvl2 = 100;
        }
        $avePerWeekHolder += $moodLvl2;

        //top 5 mood
        $strMood .= $dataArray[$z]['MoodFeel'].",";
      }
      $moodFeelHolder = explode(",",substr($strMood,0,-1));
      $avePerWeek = $avePerWeekHolder/$rowNum;

      // new array containing frequency of values of $arr
    	$arr_freq = array_count_values($moodFeelHolder);

    	// arranging the new $arr_freq in decreasing
    	// order of occurrences
    	arsort($arr_freq);

    	// $new_arr containing the keys of sorted array
    	$new_arr = array_keys($arr_freq);
      $newarr = array();
      if (count($new_arr) < 6) {
        $newarr = array_filter($new_arr, function($value) { return $value !== ''; });
      } else {
        $counter = 0;
        while ($counter < 5) {
          array_push($newarr,$new_arr[$counter]);
          $counter++;
        }
        $newarr = array_filter($newarr, function($value) { return $value !== ''; });
      }
    } else {
      for ($x=0; $x < 7 ; $x++) {
        $scopeData[$x] = 0;
        $scopeDate[$x] = '';
      }
      $newarr = [];
      $arr_freq = [];
    }


    /*$date1 = new DateTime($first);
    $date2 = new DateTime($last);
    $interval = $date1->diff($date2);
    $interval->format('%d%');*/

    //knowing the best day and the worst day of the user
    $bestDay = array();
    $worstDay = array();
    if ($avePerDayArr) {
      $bestDay = array_keys($avePerDayArr, max($avePerDayArr));
      $worstDay = array_keys($avePerDayArr, min(array_diff($avePerDayArr, array(0))));
    } else {
      $bestDay = [];
      $worstDay = [];
    }



    //$output['moodDate'] = $scopeData;
    $output['moodData'] = $scopeData;
    $output['moodDate'] = $scopeDate;
    $output['daysOfWeek'] = $daysOfArray;
    $output['weekAverage'] = $avePerWeek;
    $output['bestDay'] = $bestDay;
    $output['worstDay'] = $worstDay;
    $output['topMood'] = $newarr;
    $output['journalData'] = $dataArray;

    $output['firstday'] = $dataArray;
    $output['lastday'] =  $arr_freq;


    echo json_encode($output);
  }

  //Select the data within the week
  function getUserWeekData ($connection1,$first,$last,$userID) {
    $selectData = "SELECT * FROM `tbl_mood` WHERE UserID = '$userID' AND MoodDate >= '$first' AND MoodDate < '$last' ORDER BY MoodDate ASC";
    $resultData = mysqli_query($connection1, $selectData) or die("Failed to query database ".mysqli_error());
    return $resultData;
  }



?>
