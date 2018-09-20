<?php include '../includes/headingInner.php'?>
<?php
  date_default_timezone_set("Asia/Manila");
  $adminCollege = $_SESSION['College'];
  $currentPage = 'Students';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hady - Students</title>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
	   <?php include '../includes/importsInner.php'; ?>

     <script>
       function toggleValidate(userid, part, validateValue){
         //console.log(userid+"-"+part+"-"+validateValue);
         //location.reload();
         var action = "toggle";
         $.ajax({
          url:"validatePHQ.php",
          method:"POST",
          data:{action:action,userid:userid,part:part,validateValue:validateValue},
          success:function(data)
          {
            $('#btnValidate'+part).html(data.anchor);
           //console.log("Validate Input "+data.toggleValue);
          }
         })
       }

       function viewQuestionnaire(userid, part, validateValue){
         var action = "view";
         $.ajax({
          url:"validatePHQ.php",
          method:"POST",
          data:{action:action,userid:userid,part:part,validateValue:validateValue},
          success:function(data)
          {
            var dialog = bootbox.dialog({
              message: data.table,
              size: 'large'
          });
          }
         })

       }
     </script>
  </head>


  <style>
    body{
      background:#FFFFFF;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      margin: 0;
      position: relative;
    }
    .content{
      color: #000000;
    }
    hr {
        border: 0;
        height: 1px;
        background: #333;
        background-image: linear-gradient(to right, #ccc, #333, #ccc);
    }
    .phq-9-view{
      padding-top: 50px;
      padding-left: 25px;
      padding-right: 25px;
    }
    .error{
      color: #E53F22;
    }

    h2 a{
      color: #5bc0de;
      text-decoration: none !important;
    }
    h2 a:hover{
      color: #53A3BF;
    }
    .profile{
      width: 250px;
      margin: 0 auto;
      text-align: center;
    }
    .profile > .panel-body{
      padding-top: 0;
    }
    .profile{
      border: none;
    }
    .labelRecord{
      display: none;
      margin: 0 auto;
      text-align: center;
    }
    .btn-questionnaire:hover{
      background-color: #4AA48A;
      color: #ffffff;
    }
    .btn-questionnaire{
      background-color: #56BE9F;
      color: #ffffff;
    }

  </style>
  <body ng-app="hadyWebApp">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-lg-2">
          <?php include '../includes/navbarInner.php' ?>
        </div>

        <!--Main App-->
			<div class="col-sm-9 col-lg-10 content">
  			<div class="phq-9-view">

          <h2><a href="../users.php" class="breadCrumbs">Students</a> > PHQ-9</h2>
          <hr>

          <?php
            include '../../db_conn.php';
            $userID = $_GET['idAction'];

            $selectUser = "SELECT tbl_user.*, tbl_avatar.*, tbl_preference.IsLogin, tbl_preference.TextNotif,tbl_preference.DateCreated, tbl_preference.Icon FROM tbl_user
            INNER JOIN tbl_preference ON tbl_user.UserID = tbl_preference.UserID
            INNER JOIN tbl_avatar ON  tbl_preference.Icon = tbl_avatar.AvatarID
            WHERE tbl_user.UserID = '$userID' ";
            $resultStudentProf = mysqli_query($connection1, $selectUser) or die("Failed to query the query1 ".mysqli_error($connection1));
            $rowStudent = mysqli_fetch_array($resultStudentProf)
          ?>

          <div class="panel panel-default profile">
            <div class="panel-body">
              <a class="" id="profilePic">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($rowStudent['AvatarName']).'" height="110px" width="110px" class="avatarImage" value='.$rowStudent['AvatarID'].'>';  ?>
              </a>
              <h4><b><?php echo $rowStudent['LName'].", ".$rowStudent['FName']." ".$rowStudent['MName']; ?></b></h4>
              <h5><?php echo $rowStudent['Course'] ?></h5>
            </div>
          </div>
          <?php
            $queryPHQ = "SELECT * FROM tbl_score WHERE UserID = '$userID' AND QuestionID = 9 ORDER BY Part DESC";
            $resultPHQ = mysqli_query($connection1, $queryPHQ) or die("Failed to query the query1 ".mysqli_error($connection1));
          ?>

          <!-- Advanced Tables -->
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-hover" id="dataTables-journal">
                          <thead>
                              <tr class="info">
                                  <th>#</th>
                                  <th>Log Date</th>
                                  <th>Session</th>
                                  <th>Status</th>
                                  <th>Score</th>
                                  <th>Action</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                              $count = 1;
                              $totalScore = 0;
                              $btnValidate = "";
                              $depressionStatus = "";
                              $labelStatus = "";
                              $rowCount = mysqli_num_rows($resultPHQ);
                              if (!$rowCount) {
                                echo "<h3 style='text-align:center;'>No Records Available</h3>";
                              }
                              while($rowPHQ = mysqli_fetch_array($resultPHQ))
                              {
                                  $totalScore = 0;
                                  $partPhq = $rowPHQ['Part'];
                                  $useridPhq = $rowPHQ['UserID'];
                                  $queryComputeScore = "SELECT Score, QuestionID FROM tbl_score WHERE Part = $partPhq AND QuestionID != 10 AND UserID = '$useridPhq'";
                                  $resultComputeScore = mysqli_query($connection1, $queryComputeScore) or die("Failed to query the query1 ".mysqli_error($connection1));
                                  while ($rowCompute = mysqli_fetch_array($resultComputeScore)) {
                                    $totalScore += $rowCompute['Score'];
                                  }

                                  if ($totalScore >= 20 ) {
                                    $depressionStatus = "Severe Depression";
                                    $labelStatus = "text-danger";
                                  } elseif ($totalScore>=5 && $totalScore <=9) {
                                    $depressionStatus = "Mild Depression";
                                    $labelStatus = "text-warning";
                                  } elseif ($totalScore>=10 && $totalScore <=14) {
                                    $depressionStatus = "Moderate Depression";
                                    $labelStatus = "text-warning";
                                  } elseif ($totalScore>=15 && $totalScore <=19) {
                                    $depressionStatus = "Moderately Severe Depression";
                                    $labelStatus = "text-danger";
                                  }  else {
                                    $depressionStatus = "No Depression";
                                    $labelStatus = "text-success";
                                  }

                                  if ($rowCompute['QuestionID'] == 9 && $rowCompute['Score'] > 0) {
                                    $depressionStatus = "Suicidal";
                                    $labelStatus = "text-danger";
                                  }

                                  if ($rowPHQ['Validated'] == 0) {
                                    $btnValidate = "<a  href='#' class='abtn-profile'> <button style='float:left;margin-right:5px;' onClick=toggleValidate('".$rowPHQ['UserID']."','".$rowPHQ['Part']."','".$rowPHQ['Validated']."') class='btn btn-warning'> <i class='fa fa-square-o' ></i> Validate</button></a>";
                                  } else {
                                    $btnValidate = "<a  href='#' class='abtn-profile'> <button style='float:left;margin-right:5px;' onClick=toggleValidate('".$rowPHQ['UserID']."','".$rowPHQ['Part']."','".$rowPHQ['Validated']."') class='btn btn-success'> <i class='fa fa-check-square-o' ></i> Validated</button></a>";
                                  }
                                  $datePHQ = new DateTime($rowPHQ['Date']);
                                  $newDatePHQ = date_format($datePHQ, "F j, Y - h:i A");
                                  echo"<tr class='filesList'>
                                      <td>".$count."</td>
                                      <td class='col-md-3'>".$newDatePHQ."</td>
                                      <td class='col-md-2'>Session ".$rowPHQ['Part']."</td>
                                      <td class='col-md-2 ".$labelStatus."'>".$depressionStatus."</td>
                                      <td class='col-md-2'>
                                        <a href='#'> <button onClick=viewQuestionnaire('".$rowPHQ['UserID']."','".$rowPHQ['Part']."','".$rowPHQ['Validated']."') class='btn btn-questionnaire'> <i class='fa fa-paperclip' ></i> View Questionnaire</button></a>
                                      </td>
                                      <td class='col-md-3' id='btnValidate".$rowPHQ['Part']."'>".$btnValidate."

                                        <form method='POST' target='_blank' action='generatePDF.php' style='float:left;'>
                                            <input type='hidden' id='userID' name='userID' value='".$userID."'>
                                            <input type='hidden' id='part' name='part' value='".$rowPHQ['Part']."'>
                                            <input type='hidden' id='status' name='status' value='".$depressionStatus."'>
                                            <input type='hidden' id='date' name='date' value='".$newDatePHQ."'>
                                            <input type='submit' name='generate_PDF' class='btn btn-info' value='Generate PDF'>
                                        </form>
                                      </td>
                                  </tr>";
                                  $count++;
                              }
                            ?>
                          </tbody>
                      </table>
                  </div>
              </div>
          </div>
          <!--End Advanced Tables -->



        </div><!--ProfileView-->
      </div>
    </div>
  </div>


	<script>
      //fetch data for user avatar
      function fetch_data() {
        var action = "fetchAvatar";
        $.ajax({
         url:"../../select_avatar.php",
         method:"POST",
         data:{action:action},
         success:function(data)
         {
          $('#UserAvatar').html(data);
         }
        })
      }

      function logoutExecute(){
        bootbox.confirm({
            title: "<b>Logout</b>",
            size: "small",
            message: "Are you sure you want to logout? ",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel',
                    className: 'btn btn-danger'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Accept',
                    className: 'btn btn-info'
                }
            },
            callback: function (result) {
                if(result){
                  $.ajax({
                    url:"destroy.php",
                    method: "POST",
                    success: function(response) {
                      if(response.data == "success" || typeof response.data == 'undefined'){
                        console.log(response.data);
                        window.location.href = '../../sign_in.php';
                      } else {
                        console.log(response.data);
                      }
                    },
                    error: function(response){

                    }
                  });
                }else {
                  console.log("cancel logout");
                }
            }
        });
      };

      $(document).ready(function(){
        fetch_data();

        $("#btnLogout").click(function(){
          logoutExecute();
        });


      });

    </script>

  </body>
</html>
