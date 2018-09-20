<?php
  include '../../db_conn.php';
  include '../../TCPDF/tcpdf.php';
  session_start();
  date_default_timezone_set("Asia/Manila");
  $adminCollege = $_SESSION['College'];

  if (isset($_POST['generate_PDF'])) {
    $userID = $_POST['userID'];
    $part = $_POST['part'];
    $status = $_POST['status'];
    $date = $_POST['date'];

    $tableOutput = '';

    $detailsArr = array();
    $lastname = "";
    $studentNumber = "";

    $selectDetails = "SELECT * FROM tbl_user WHERE UserID = '$userID' AND access_type IS NULL";
    $detailsResult = mysqli_query($connection1, $selectDetails) or die("Failed to query the query1 ".mysqli_error($connection1));
    while ($rowDetails = mysqli_fetch_array($detailsResult)) {
      $studentNumber= $rowDetails['StudNumber'];
      /*$lastname = $rowDetails['LName'];
      $detailsArr['Firstname'] = $rowDetails['FName'];
      $detailsArr['Middlename'] = $rowDetails['MName'];
      $detailsArr['Gender'] = $rowDetails['Gender'];
      $detailsArr['Course'] = $rowDetails['Course'];*/


    $tableOutput = '<div class="header" style="text-align:center;">
      <img src="../../resources/LogoNamePNG.png" alt="LOGO" width="130" height="50">
      <h3 style="text-align:center">Session '.$part.': PHQ-9 QUESTIONNAIRE</h3>
    </div>

    <div class="details">
      <table border="1" cellspacing="0" cellpadding="5">
        <tbody>
          <tr>
            <td width="15%"><b>Name: </b></td>
            <td width="35%">'.$rowDetails["LName"].', '.$rowDetails["FName"].' '.$rowDetails["MName"].'</td>
            <td width="15%"><b>Student No. </b></td>
            <td width="35%">'.$rowDetails["StudNumber"].'</td>
          </tr>
          <tr>
            <td width="15%"><b>Course: </b></td>
            <td width="35%">'.$rowDetails['Course'].'</td>
            <td width="15%"><b>Gender </b></td>
            <td width="35%">'.$rowDetails['Gender'].'</td>
          </tr>
          <tr>
            <td width="15%"><b>Date Taken: </b></td>
            <td width="35%">'.$date.'</td>
            <td width="15%"><b>Status </b></td>
            <td width="35%">'.$status.'</td>
          </tr>
        </tbody>
      </table>
    </div>

            <div class="table-responsive">
                <table border="1" cellspacing="0" cellpadding="5" id="dataTables-journal">
                    <thead>
                        <tr class="info">
                            <th width="5%">#</th>
                            <th width="55%">Questions</th>
                            <th width="10%">Not at all</th>
                            <th width="10%">Several days</th>
                            <th width="10%">More than half the days</th>
                            <th width="10%">Nearly every day</th>
                        </tr>
                    </thead>
                    <tbody>';
    }
    $notAtAll = "";
    $nearlyEvery = "";
    $severalDays = "";
    $moreThan = "";
    $totalScore = 0;

    $querySelectPhq = "SELECT tbl_question.QuestionID, tbl_question.Question, tbl_score.Score FROM tbl_question INNER JOIN tbl_score ON tbl_question.QuestionID = tbl_score.QuestionID Where tbl_score.UserID = '$userID' AND tbl_score.Part =  $part";
    $resultSelectPhq = mysqli_query($connection1, $querySelectPhq) or die("Failed to query the query1 ".mysqli_error($connection1));
      while ($rowSelectPhq = mysqli_fetch_array($resultSelectPhq)) {
        if ($rowSelectPhq['QuestionID'] != 10) {
          $totalScore += $rowSelectPhq['Score'];
        }

        if(isset($rowSelectPhq['Score'])){
          switch ($rowSelectPhq['Score']) {
            case 0:
              $notAtAll = '<center><img src="checkmark.png" alt="Smiley face" height="12" width="12"></center>';
              $severalDays = " ";
              $moreThan = " ";
              $nearlyEvery = " ";
              break;
            case 1:
                $notAtAll = " ";
                $severalDays = '<center><img src="checkmark.png" alt="Smiley face" height="12" width="12"></center>';
                $moreThan = " ";
                $nearlyEvery = " ";
                break;
            case 2:
                $notAtAll = " ";
                $severalDays = " ";
                $moreThan = '<center><img src="checkmark.png" alt="Smiley face" height="12" width="12"></center>';
                $nearlyEvery = " ";
                break;
            case 3:
                $notAtAll = " ";
                $severalDays = " ";
                $moreThan = " ";
                $nearlyEvery = '<center><img src="checkmark.png" alt="Smiley face" height="12" width="12"></center>';
                break;

            default:
              $notAtAll = " ";
              $severalDays = " ";
              $moreThan = " ";
              $nearlyEvery = " ";
              break;
          }
        } else {
          $notAtAll = " ";
          $severalDays = " ";
          $moreThan = " ";
          $nearlyEvery = " ";
        }


        $tableOutput .= '<tr>
          <td width="5%">'.$rowSelectPhq["QuestionID"].'</td>
          <td width="55%">'.$rowSelectPhq["Question"].'</td>
          <td width="10%" style="text-align:center">'.$notAtAll.'</td>
          <td width="10%" style="text-align:center">'.$severalDays.'</td>
          <td width="10%" style="text-align:center">'.$moreThan.'</td>
          <td width="10%" style="text-align:center">'.$nearlyEvery.'</td>
        </tr>';
      }

      $tableOutput .= '</tbody>
                      </table>
                      </div>
                      <div class="footnote" style="text-align:right;">
                        <h3>Total Score: '.$totalScore.'</h3>
                        <p><i>Total computation without question #10</i></p>
                      </div>';
      $fileName = $studentNumber." PHQ-9 Session ".$part.".pdf";

      $obj_pdf = new TCPDF('P', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
      $obj_pdf->SetCreator(PDF_CREATOR);
      $obj_pdf->SetTitle("PHQ-9 Questionnaire");
      $obj_pdf->SetHeaderData('', '', PDF_HEADER_TITLE, PDF_HEADER_STRING);
      $obj_pdf->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
      $obj_pdf->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));
      $obj_pdf->SetDefaultMonospacedFont('helvetica');
      $obj_pdf->SetFooterMargin(PDF_MARGIN_FOOTER);
      $obj_pdf->SetMargins(PDF_MARGIN_LEFT, '5', PDF_MARGIN_RIGHT);
      $obj_pdf->setPrintHeader(false);
      $obj_pdf->setPrintFooter(false);
      $obj_pdf->SetAutoPageBreak(TRUE, 10);
      $obj_pdf->SetFont('helvetica', '', 11);
      $obj_pdf->AddPage();
      $obj_pdf->writeHTML($tableOutput);
      $obj_pdf->Output($fileName, 'I');
  }
?>
