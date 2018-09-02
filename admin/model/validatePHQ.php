
<?php
  include '../../db_conn.php';
  header('Content-Type: application/json');

  $action = $_POST['action'];
  $output = array();

  if ($action == "toggle") {
    $userID = $_POST['userid'];
    $part = $_POST['part'];
    $validateValue = $_POST['validateValue'];


    if ($validateValue == '0') {
      $validateValue = 1;
    } else {
      $validateValue = 0;
    }

    $queryValidate = "UPDATE tbl_score SET Validated = '$validateValue' WHERE Part = '$part' AND UserID = '$userID'";
    $queryResult = mysqli_query($connection1, $queryValidate) or die("Failed to query the query1 ".mysqli_error($connection1));

    if (mysqli_affected_rows($connection1) > 0) {
      $output['toggleValue'] = $validateValue;
      if ($validateValue == 1) {
        $output['anchor'] = "<a  href='#' class='abtn-profile'> <button onClick=toggleValidate('".$userID."','".$part."','".$validateValue."') class='btn btn-success'> <i class='fa fa-check-square-o' ></i> Validated</button></a>";
      } else {
        $output['anchor'] = "<a  href='#' class='abtn-profile'> <button onClick=toggleValidate('".$userID."','".$part."','".$validateValue."') class='btn btn-warning'> <i class='fa fa-square-o' ></i> Validate</button></a>";
      }
    }
  }

  if($action=="view"){
    $userID = $_POST['userid'];
    $part = $_POST['part'];
    $validateValue = $_POST['validateValue'];

    $tableOutput = "<div class='panel panel-default'>
        <div class='panel-body'>
            <h3 style='text-align:center'>Session ".$part."</h3>
            <div class='table-responsive'>
                <table class='table table-bordered table-hover' id='dataTables-journal'>
                    <thead>
                        <tr class='info'>
                            <th>#</th>
                            <th>Questions</th>
                            <th>Not at all</th>
                            <th>Several days</th>
                            <th>More than half the days</th>
                            <th>Nearly every day</th>
                        </tr>
                    </thead>
                    <tbody>";
    $notAtAll = "";
    $nearlyEvery = "";
    $severalDays = "";
    $moreThan = "";
    $totalScore = 0;

    //$querySelectPhq = "SELECT Score, QuestionID FROM tbl_score WHERE Part = $part AND UserID = '$userID'";
    $querySelectPhq = "SELECT tbl_question.QuestionID, tbl_question.Question, tbl_score.Score FROM tbl_question INNER JOIN tbl_score ON tbl_question.QuestionID = tbl_score.QuestionID Where tbl_score.UserID = '$userID' AND tbl_score.Part =  $part";
    $resultSelectPhq = mysqli_query($connection1, $querySelectPhq) or die("Failed to query the query1 ".mysqli_error($connection1));
    while ($rowSelectPhq = mysqli_fetch_array($resultSelectPhq)) {
      if ($rowSelectPhq['QuestionID'] != 10) {
        $totalScore += $rowSelectPhq['Score'];
      }

      switch ($rowSelectPhq['Score']) {
        case 0:
          $notAtAll = "<i class='fa fa-check' ></i>";
          $severalDays = " ";
          $moreThan = " ";
          $nearlyEvery = " ";
          break;
        case 1:
            $notAtAll = " ";
            $severalDays = "<i class='fa fa-check' ></i>";
            $moreThan = " ";
            $nearlyEvery = " ";
            break;
        case 2:
            $notAtAll = " ";
            $severalDays = " ";
            $moreThan = "<i class='fa fa-check' ></i>";
            $nearlyEvery = " ";
            break;
        case 3:
            $notAtAll = " ";
            $severalDays = " ";
            $moreThan = " ";
            $nearlyEvery = "<i class='fa fa-check' ></i>";
            break;

        default:
          $notAtAll = " ";
          $severalDays = " ";
          $moreThan = " ";
          $nearlyEvery = " ";
          break;
      }
      $tableOutput .= "<tr>
        <td>".$rowSelectPhq['QuestionID']."</td>
        <td>".$rowSelectPhq['Question']."</td>
        <td>".$notAtAll."</td>
        <td>".$severalDays."</td>
        <td>".$moreThan."</td>
        <td>".$nearlyEvery."</td>
      </tr>";
    }

    $tableOutput .= "</tbody>
                    </table>
                    </div>
                    <div class='footnote' style='float:right;'>
                      <h3>Total Score: ".$totalScore."</h3>
                      <p><i>Total computation without question #10</i></p>
                    </div>
                    </div>
                    </div>";
    $output['table'] = $tableOutput;
  }


  echo json_encode($output);

?>
