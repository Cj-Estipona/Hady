<?php include 'includes/heading.php'?>
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
	   <?php include 'includes/imports.php'; ?>
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
    .userListTable{
      padding-top: 50px;
      padding-left: 25px;
      padding-right: 25px;
    }
    .error{
      color: #E53F22;
    }
    .btnActions{
      text-align:center;
    }
    .btnActions a{
      margin-left: 5px;
      margin-right: 5px;
      margin-top: 8px;
    }
    .btn-phq{
      background-color: #56BE9F;
      color: #ffffff;
    }
    .btn-mood{
      background-color: #51B47B;
      color: #ffffff;
    }
    .btn-profile{
      background-color: #54a7a6;
      color: #ffffff;
    }
    .btn-profile:hover{
      background-color: #478D8D;
      color: #ffffff !important;
    }
    .btn-mood:hover{
      background-color: #469A6A;
      color: #ffffff;
    }
    .btn-phq:hover{
      background-color: #4AA48A;
      color: #ffffff;
    }

  </style>

  <body ng-app="hadyWebApp">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-lg-2">
          <?php include 'includes/navbar.php' ?>
        </div>

        <!--Main App-->
			<div class="col-sm-9 col-lg-10 content">
  			<div class="userListTable">

          <h2>Students</h2>
          <hr>
          <?php
           include '../db_conn.php';
           $selectStudents = "SELECT UserID, FName, LName, Course, StudNumber FROM tbl_user INNER JOIN tbl_college ON tbl_user.Course = tbl_college.CourseName WHERE tbl_college.CollegeDept = '$adminCollege' AND access_type IS NULL";
           $resultStudents = mysqli_query($connection1, $selectStudents) or die("Failed to query the query1 ".mysqli_error($connection1));
          ?>
          <!-- Advanced Tables -->
          <div class="panel panel-default">
              <div class="panel-body">
                  <div class="table-responsive">
                      <table class="table table-striped table-hover" id="dataTables-students">
                          <thead>
                              <tr class="info">
                                  <th>#</th>
                                  <th>Student Number</th>
                                  <th>Lastname</th>
                                  <th>Firstname</th>
                                  <th>Course</th>
                                  <th>Actions</th>
                              </tr>
                          </thead>
                          <tbody>
                            <?php
                              $count = 1;
                              $label = "";
                              while($row = mysqli_fetch_array($resultStudents))
                              {
                                $idHolder = $row['UserID'];
                                $queryPHQ = "SELECT COUNT(UserID) AS ValidatedNum FROM tbl_score WHERE UserID = '$idHolder' AND QuestionID = 9 AND Validated=0 ORDER BY Part DESC";
                                $resultPHQ = mysqli_query($connection1, $queryPHQ) or die("Failed to query the query1 ".mysqli_error($connection1));
                                $rowPHQ = mysqli_fetch_array($resultPHQ);
                                if ($rowPHQ['ValidatedNum'] == 0) {
                                  $label = "";
                                } else {
                                  $label = "<span class='label label-pill label-warning countUnread'>".$rowPHQ['ValidatedNum']."</span>";
                                }

                                  echo"<tr class='filesList'>

                                      <td>".$count."</td>
                                      <td class='col-md-2'>".$row['StudNumber']."</td>
                                      <td class='col-md-2'>".$row['LName']."</td>
                                      <td class='col-md-2'>".$row['FName']."</td>
                                      <td class='col-md-2'>".$row['Course']."</td>
                                      <td class='col-md-4 btnActions'>
                                        <a  href='model/viewProfile.php?idAction=".$row['UserID'] ."' class='abtn-profile'> <button class='btn btn-profile'> <i class='fa fa-user' ></i> Profile</button></a>
                                        <a  href='model/viewPHQ.php?idAction=".$row['UserID'] ."' class='abtn-phq'> <button class='btn btn-phq'>".$label." <i class='fa fa-file' ></i> PHQ-9</button></a>
                                        <a  href='model/viewMood.php?idAction=".$row['UserID'] ."' class='abtn-mood'> <button class='btn btn-mood'> <i class='fa fa-heart' ></i> Mood</button></a>
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
        </div>
      </div>
    </div>
  </div>


	<script>
      //fetch data for user avatar
      function fetch_data() {
        var action = "fetchAvatar";
        $.ajax({
         url:"../select_avatar.php",
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
                    url:"model/destroy.php",
                    method: "POST",
                    success: function(response) {
                      if(response.data == "success" || typeof response.data == 'undefined'){
                        console.log(response.data);
                        window.location.href = '../sign_in.php';
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
        $('#dataTables-students').DataTable();

        $("#btnLogout").click(function(){
          logoutExecute();
        });

      });

    </script>

  </body>
</html>
