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
    .panel-default{
      width: 250px;
      margin: 0 auto;
      text-align: center;
    }
    .panel-default > .panel-body{
      padding-top: 0;
    }
    .panel-default{
      border: none;
    }
    .panel-info > .panel-body{
      padding: 0;
    }
    td{
      padding-left: 20px !important;
      padding-right: 20px !important;
    }
    .userInfo{
      margin-top: 20px;
    }
    .btn-mood:hover{
      background-color: #469A6A;
      color: #ffffff;
    }
    .btn-phq:hover{
      background-color: #4AA48A;
      color: #ffffff;
    }
    .btn-phq{
      background-color: #56BE9F;
      color: #ffffff;
    }
    .btn-mood{
      background-color: #51B47B;
      color: #ffffff;
    }
    .btn-sched{
      background-color: #4DC1C0;
      color: #ffffff;
    }
    .btn-sched:hover{
      background-color: #398E8D;
      color: #ffffff;
    }
    .actionButtons button{
      margin-top: 5px;
      margin-bottom:5px;
    }
    .bootstrap-datetimepicker-widget.dropdown-menu {
      min-width: 100%;
    }
    #schedule-meet{
      padding-top: 20px;
      padding-right: 15px;
      padding-bottom: 20px;
    }

    .alert{
      text-align: center;
      margin-left: 10px;
      display: none;
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

          <h2><a href="../users.php" class="breadCrumbs">Students</a> > Profile</h2>
          <hr>
          <?php
            include '../../db_conn.php';
            $userID = $_GET['idAction'];

            $selectUser = "SELECT tbl_user.*, tbl_avatar.*, tbl_preference.IsLogin, tbl_preference.TextNotif,tbl_preference.DateCreated, tbl_preference.Icon FROM tbl_user
            INNER JOIN tbl_preference ON tbl_user.UserID = tbl_preference.UserID
            INNER JOIN tbl_avatar ON  tbl_preference.Icon = tbl_avatar.AvatarID
            WHERE tbl_user.UserID = '$userID' ";
            $resultStudentProf = mysqli_query($connection1, $selectUser) or die("Failed to query the query1 ".mysqli_error($connection1));
            $rowStudent = mysqli_fetch_array($resultStudentProf);

            $fname = $rowStudent['FName'];
            $lname = $rowStudent['LName'];
          ?>

          <div class="panel panel-default">
            <div class="panel-body">
              <a class="" id="profilePic">
                <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($rowStudent['AvatarName']).'" height="110px" width="110px" class="avatarImage" value='.$rowStudent['AvatarID'].'>';  ?>
              </a>
              <h4><b><?php echo $rowStudent['LName'].", ".$rowStudent['FName']." ".$rowStudent['MName']; ?></b></h4>
              <h5><?php echo $rowStudent['Course'] ?></h5>
            </div>
          </div>

          <div class="row userInfo">
            <div class="col-md-6">
              <div class="panel panel-info">
                <div class="panel-heading"><h4>Basic Information</h4></div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                      <tbody>
                        <tr>
                          <td><b>Last Name</b></td>
                          <td><?php echo $rowStudent['LName']; ?></td>
                        </tr>
                        <tr>
                          <td><b>First Name</b></td>
                          <td><?php echo $rowStudent['FName']; ?></td>
                        </tr>
                        <tr>
                          <td><b>Middle Name</b></td>
                          <td><?php echo $rowStudent['MName']; ?></td>
                        </tr>
                        <tr>
                          <td><b>Course</b></td>
                          <td><?php echo $rowStudent['Course']; ?></td>
                        </tr>
                        <tr>
                          <td><b>Gender</b></td>
                          <td><?php echo $rowStudent['Gender']; ?></td>
                        </tr>
                        <tr>
                          <td><b>Birth Date</b></td>
                          <td><?php $bdate = new DateTime($rowStudent['BDate']); echo date_format($bdate, "F j, Y"); ?></td>
                        </tr>
                        <tr>
                          <td><b>Mobile Number</b></td>
                          <td><?php echo $rowStudent['MNumber']; ?></td>
                        </tr>
                        <tr>
                          <td><b>Email</b></td>
                          <td><a href="<?php echo 'mailto:'.$rowStudent['Email'] ?>"><?php echo $rowStudent['Email']; ?></a></td>
                        </tr>
                      </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="panel panel-info">
                <div class="panel-heading"><h4>Additional Information</h4></div>
                <div class="panel-body">
                  <table class="table table-striped table-hover">
                      <tbody>
                        <tr>
                          <td><b>Student Number</b></td>
                          <td><?php echo $rowStudent['StudNumber']; ?></td>
                        </tr>
                        <tr>
                          <td><b>User ID</b></td>
                          <td><?php echo $rowStudent['UserID']; ?></td>
                        </tr>
                        <tr>
                          <td><b>Account Name</b></td>
                          <td><?php echo $rowStudent['Nickname']; ?></td>
                        </tr>
                        <tr>
                          <td><b>Date Created</b></td>
                          <td><?php $cdate = new DateTime($rowStudent['DateCreated']); echo date_format($cdate, "F j, Y"); ?></td>
                        </tr>
                        <tr>
                          <td><b>Text Notification</b></td>
                          <td><?php if ($rowStudent['TextNotif']==1) {
                            echo "On";
                          }else {
                            echo "Off";
                          } ?></td>
                        </tr>
                      </tbody>
                  </table>
                </div>
              </div>
              <div class="actionButtons">
                <center>
                <a  href='#sched-section' class='abtn-sched'> <button class='btn btn-lg btn-sched' data-toggle="collapse" data-target="#sched-section"> <i class='fa fa-calendar-check-o' ></i> Schedule Meeting</button></a>
                <a  href='viewPHQ.php?idAction=<?php echo $rowStudent['UserID'] ?>' class='abtn-phq'> <button class='btn btn-lg btn-phq'> <i class='fa fa-file' ></i> View PHQ-9</button></a>
                <a  href='viewMood.php?idAction=<?php echo $rowStudent['UserID'] ?>' class='abtn-mood'> <button class='btn btn-lg btn-mood'> <i class='fa fa-heart' ></i> View Mood</button></a>
                <center>
              </div>
              <div id="sched-section" class="collapse">
                <div class="panel panel-info">
                  <div class="panel-heading"><h4>Schedule Meeting</h4></div>
                  <div class="panel-body" id="schedule-meet">
                        <form method="POST" action="scheduleMeeting.php" id="formMeeting">
                          <div class="form-group">
                            <label class="col-sm-2 control-label">Start</label>
                              <div class='input-group date col-sm-10' id='datetimepicker6'>
                                  <input type='text' id="startTime" name="startTime" class="form-control" required/>
                                  <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                          </div>


                          <div class="form-group">
                              <label class="col-sm-2 control-label">End</label>
                              <div class='input-group date col-sm-10' id='datetimepicker7'>
                                  <input type='text' id="endTime" name="endTime" class="form-control" required/>
                                  <span class="input-group-addon">
                                      <span class="glyphicon glyphicon-calendar"></span>
                                  </span>
                              </div>
                          </div>

                          <div class="form-group">
                              <label class="col-sm-2 control-label">Message</label>
                              <div class='input-group date col-sm-10' id='messageUser'>
                                  <textarea class="form-control" id="messageToUser" name="messageToUser" type="text" placeholder="Write your message.." required></textarea>
                              </div>
                          </div>
                          <input type="hidden" name="userID" id="userID" value="<?php echo $userID; ?>">
                          <input type="hidden" name="adminID" id="adminID" value="<?php echo $adminID; ?>">
                          <input type="hidden" name="fname" id="fname" value="<?php echo $fname; ?>">
                          <input type="hidden" name="lname" id="lname" value="<?php echo $lname; ?>">

                            <div class="alert alert-success alert-dismissible fade in">
                              <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                              <strong>Success!</strong> An event was also added to your calendar.
                            </div>

                          <center><br><input type="submit" id="btnSubmit" class="btn btn-md btn-sched" value="Send"></center>
                        </form>
                        <script type="text/javascript">
                          $(function () {
                              $('#datetimepicker6').datetimepicker({
                                minDate: new Date()
                              });
                              $('#datetimepicker7').datetimepicker({
                                  useCurrent: false //Important! See issue #1075
                              });
                              $("#datetimepicker6").on("dp.change", function (e) {
                                  $('#datetimepicker7').data("DateTimePicker").minDate(e.date);
                              });
                              $("#datetimepicker7").on("dp.change", function (e) {
                                  $('#datetimepicker6').data("DateTimePicker").maxDate(e.date);
                              });
                          });
                      </script>
                  </div>
                </div>
              </div>
            </div>


          </div><!--row User Infor-->

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

        $('#btnSubmit').click(function(){
          event.preventDefault();
          var data = $("#formMeeting").serialize();
          /*var action = 'go';
          var userID = '<?php echo $userID; ?>';
          var start = $('#startTime').val();
          var end = $('#endTime').val();
          var msg = $('#messageToUser').val();*/

          $.ajax({
            url:"scheduleMeeting.php",
            method:"POST",
            /*data:{action:action, userID:userID,startTime:start,endTime:end,messageToUser:msg},*/
            data:data,
            dataType:"json",
            success:function(data){
              if(data.success){
                console.log("successful");
                $('#startTime').val('');
                $('#endTime').val('');
                $('#messageToUser').val('');
                $('.alert').show();
              } else {
                console.log("unsuccessful");
              }
            }
          });
        });

        $("#btnLogout").click(function(){
          logoutExecute();
        });

      });

    </script>

  </body>
</html>
