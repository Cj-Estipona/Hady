<?php include 'includes/heading.php'?>
<?php
  $adminCollege = $_SESSION['College'];
  $currentPage = 'Dashboard';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hady - Dashboard</title>
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
      padding: 0;
    }
    hr {
        border: 0;
        height: 1px;
        background: #333;
        background-image: linear-gradient(to right, #ccc, #333, #ccc);
    }
    .dashboard-view{
      padding-top: 50px;
      padding-left: 25px;
      padding-right: 25px;
    }
    .error{
      color: #E53F22;
    }
    .well-lg{
      font-size: 20px;
    }
    #bar-notif{
      background-color: #0F2024;
      padding: 10px, 10px, 10px, 10px;
      margin-left: 0px;
      margin-right: 0px;
      color: #ffffff;
      min-height: 50px;
    }
    #nav-notif li .notifClass, #nav-notif li .logsClass{
      text-decoration: none;
      color: #ffffff !important;
    }
    #nav-notif li .notifClass:hover, #nav-notif li .logsClass:hover, #nav-notif li .notifClass:focus, #nav-notif li .logsClass:focus, #nav-notif li .notifClass.active, #nav-notif li .logsClass.active{
      background-color: #0F2024;
      color: #77DFF0 !important;
    }
    .listNotif{
      padding: 0;
    }
    .notificationClass {
        height: auto;
        max-height: 250px;
        overflow-x: hidden;
    }
    .highlighter{
      background-color: #F4FFCC;
    }
    center{
      margin: 0 auto;
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
        <div id="bar-notif">
          <div class="notif-navigation" id="nav-notif">
              <ul class="nav navbar-nav">
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle notifClass" data-toggle="dropdown">
                      <span class="label label-pill label-danger countNotif"></span><i class="fa fa-lg fa-envelope"></i>&nbsp;&nbsp;Notifications
                    </a>
                    <ul class="dropdown-menu notificationClass"></ul>
                  </li>
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle logsClass" data-toggle="dropdown">
                      <span class="label label-pill label-danger countLogs"></span><i class="fa fa-lg fa-bell"></i>&nbsp;&nbsp;Logs
                    </a>
                    <ul class="dropdown-menu logClass"></ul>
                  </li>

              </ul>
          </div>
        </div>
  			<div class="dashboard-view">

          <h2>Dashboard</h2>
          <hr>
          <center><h2>This page section is under construction. We want to make things better for you! Please stay tuned.</h2></center>
          <!--<div class="row">
            <div class="col-md-4">
              <div class="well well-lg">Total Number of Students: <span id="totalStudents"></span><br><span style="font-size:12px;"><i><?php echo $adminCollege; ?></i><span></div>
            </div>
            <div class="col-md-4">
              <div class="well well-lg">Depression Cases: <br><span style="font-size:12px;"><i>Based on last record of PHQ-9</i><span></div>
            </div>
            <div class="col-md-4">
              <div class="well well-lg">Pending PHQ-9: <br></div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-4">
              <div class="panel panel-primary">
                <div class="panel-heading">Panel with panel-primary class</div>
                <div class="panel-body">Panel Content<br><br><br><br><br><br><br><br><br><br><br><br><br><br><br></div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="panel panel-info">
                <div class="panel-heading">Depression Cases by Gender</div>
                <div class="panel-body">Panel Content<br><br><br><br><img src="../resources/bar_chart_example2.png" class="img-responsive"><br><br><br><br><br><br></div>
              </div>
            </div>

            <div class="col-md-4">
              <div class="panel panel-warning">
                <div class="panel-heading">Depression Cases by Course</div>
                <div class="panel-body">Panel Content<img src="../resources/2000px-Pie_chart_EP_election_2004.svg.png" class="img-responsive"><br><br><br><br><br><br></div>
              </div>
            </div>
          </div>-->

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

      function getDashboard(){
        $.ajax({
          url:"model/getDashboard.php",
          method:"POST",
          success: function(response){
            $('#totalStudents').html(response.totalStudents);
          }
        });
      }

      function load_unseen_notification(view = ''){
        $.ajax({
          url:"model/fetchNotif.php",
          method:"POST",
          data:{view:view},
          dataType:"json",
          success:function(data){
            $('.notificationClass').html(data.notifications);
            if(data.unseen_notifications > 0){
              $('.countNotif').html(data.unseen_notifications);
            }
          }
        });
      }

      $(document).ready(function(){
        var counterTimer = false;
        fetch_data();
        getDashboard();
        load_unseen_notification();

        $(document).on('click', '.notifClass', function(){
          counterTimer = true;
          $('.countNotif').html('');
          setTimeout(function() {
            load_unseen_notification('yes');
            counterTimer = false;
          }, 10000);
        })

        $("#btnLogout").click(function(){
          logoutExecute();
        });

        setInterval(function(){
          if(!counterTimer){
            load_unseen_notification();
          }
        }, 10000);

      });

    </script>

  </body>
</html>
