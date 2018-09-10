<?php include '../includes/headingInner.php'?>
<?php
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
    .profileView{
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

  </style>

  <body ng-app="hadyWebApp">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-lg-2">
          <?php include '../includes/navbarInner.php' ?>
        </div>

        <!--Main App-->
			<div class="col-sm-9 col-lg-10 content">
  			<div class="profileView">

          <h2><a href="../users.php" class="breadCrumbs">Students</a> > Mood</h2>
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

          <div class="labelRecord">
            <h1>No Records Found</h1>
          </div>
          <div class="chartMood">
            <canvas id="canvasChartMood" height="90"></canvas>
          </div>
          <br>
          <?php
             include '../../db_conn.php';
             $selectJournal = "SELECT tbl_mood.* FROM tbl_mood INNER JOIN tbl_privilage ON tbl_mood.UserID = tbl_privilage.UserID WHERE tbl_mood.UserID = '$userID' AND tbl_privilage.ViewPriv='1' ORDER BY MoodDate DESC";
             $resultJournal = mysqli_query($connection1, $selectJournal) or die("Failed to query the query1 ".mysqli_error($connection1));
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
                                  <th>Moods</th>
                                  <th>Journal Title</th>
                                  <th>Journal</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                              $count = 1;
                              while($rowJournal = mysqli_fetch_array($resultJournal))
                              {
                                  $dateMoods = new DateTime($rowJournal['MoodDate']);
                                  $newDateMoods = date_format($dateMoods, "F j, Y h:ia");
                                  echo"<tr class='filesList'>
                                      <td>".$count."</td>
                                      <td class='col-md-3'>".$newDateMoods."</td>
                                      <td class='col-md-2'>".$rowJournal['MoodFeel']."</td>
                                      <td class='col-md-2'>".$rowJournal['JournalTitle']."</td>
                                      <td class='col-md-5'>".$rowJournal['MoodJournal']."</td>
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
        $('#dataTables-journal').DataTable({
          "language": {
            "emptyTable": "No Permission to View the Data"
          }
        });

        var data = {};
        var options = {};
          $.ajax({
           url:"dataMood.php",
           method:"POST",
           data:{action:"<?php echo $_GET['idAction'] ?>"},
           success:function(data)
           {
             if (data.success) {
               data = {
                   labels: data.datemood,
                   datasets: [{
                       label: "Mood Level",
                       backgroundColor: 'rgb(255, 99, 132)',
                       borderColor: 'rgb(255, 99, 132)',
                       pointDotRadius: 1,
                       data: data.moodlvl,
                   }]
               };
               options = {
                   scales: {
                       xAxes: [{
                           ticks: {
                               display: false
                           },
                           gridLines: {
                               drawOnChartArea: false
                           }
                       }],
                       yAxes: [{
                           ticks: {
                               stepSize:20,
                               beginAtZero: true,
                               suggestedMax: 100
                           }
                       }]
                   }
               };
               var ctx = document.getElementById("canvasChartMood");
               var myLineChart = new Chart(ctx, {
                   type: 'line',
                   data: data,
                   options: options
               });
             }else {
               $(".labelRecord").show();
             }
           }
         });

      });

    </script>

  </body>
</html>
