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
    .labelValue{
      font-weight: bold;
      margin: 0 auto;
    }
    .wellLabel .panel-heading{
      padding-top: 10px !important;
    }
    .wellLabel .panel-body{
      padding-top: 0px;
      padding-bottom: 0px;
    }
    .bodyPanel .labelValue{
      text-align: center;
      font-size: 90px;
    }
    center{
      margin: 0 auto;
    }
    h3{
      margin-top: 0px;
    }
    .emotionImg{
      width: 140px;
      height: 140px;
      margin: 0 auto;
    }
    .btn-view{
      background-color: #56BE9F;
      color: #ffffff;
    }
    .btn-view:hover{
      background-color: #4AA48A;
      color: #ffffff;
    }
    #studentChartGender, #moodChartGender{
      display: none;
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
          <!--<center><h2>This page section is under construction. We want to make things better for you! Please stay tuned.</h2></center>-->
          <div class="row">
            <div class="col-md-4">
              <div class="panel panel-primary wellLabel">
                <div class="panel-heading"><h3>Total Number of Students</h3><span style="font-size:12px;"><i><?php echo $adminCollege; ?></i><span></div>
                <div class="panel-body bodyPanel">
                  <p id="totalStudents" class="labelValue"></p>
                  <div id="studentDetails" class="collapse">
                    <div class="form-group">
                      <label for="sel1">Category:</label>
                      <select class="form-control" id="selectCategory" name="selectCategory">
                        <option value="Course">By Course</option>
                        <option value="Gender">By Gender</option>
                      </select>
                    </div>
                    <canvas id="studentChartCourse" height="250"></canvas>
                    <canvas id="studentChartGender" height="250"></canvas>
                    <br>
                  </div>
                </div>
                <div class="panel-footer">
                  <button type="button" class="btn btn-view" data-toggle="collapse" data-target="#studentDetails">View Details</button>
                </div>
              </div>
            </div>
            <div class="col-md-4">
              <div class="panel panel-primary wellLabel">
                <div class="panel-heading"><h3>Average Mood</h3><span style="font-size:12px;"><i>All Students</i><span></div>
                <div class="panel-body bodyPanel" id="MoodPanelist">
                  <div id="MoodPanel">
                  </div>
                  <div id="moodDetails" class="collapse">
                    <div class="form-group">
                      <label for="sel1">Category:</label>
                      <select class="form-control" id="moodCategory" name="moodCategory">
                        <option value="Course">By Course</option>
                        <option value="Gender">By Gender</option>
                      </select>
                    </div>
                    <canvas id="moodChartCourse" height="250"></canvas>
                    <canvas id="moodChartGender" height="250"></canvas>
                  </div>
                </div>
                <div class="panel-footer">
                  <button type="button" class="btn btn-view" data-toggle="collapse" data-target="#moodDetails">View Details</button>
                </div>
              </div>

            </div>
            <div class="col-md-4">
              <div class="panel panel-primary wellLabel">
                <div class="panel-heading"><h3>Invalidated PHQ-9</h3><span style="font-size:12px;"><i>All Students</i><span></div>
                <div class="panel-body bodyPanel">
                  <p id="totalInvalidated" class="labelValue"></p>
                </div>
                <div class="panel-footer">
                  <a href="users.php" class="btn btn-view">View Details</a>
                </div>
              </div>
            </div>
          </div><!--FIRST ROW-->
          <div class="row">
            <div class="col-md-4">
              <div class="panel panel-primary wellLabel">
                <div class="panel-heading"><h3>Today's Schedule</h3></div>
                <div class="panel-body bodyPanel">

                </div>
              </div>
            </div>
          </div><!--SECOND ROW-->
            <br><br><br>
            <h1 style="text-align:center">More Features to Come....</h1>
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
          url:"model/getDashboard.php?userID=<?php echo $adminID; ?>",
          method:"POST",
          success: function(response){
            $('#totalStudents').html(response.totalStudents);
            $('#totalInvalidated').html(response.totalInvalidated);
            if (response.hasMoodAve) {
              var emotionFace = "";
              if (response.finalAverageMood > 0 && response.finalAverageMood <= 20 ) {
                emotionFace = "../resources/VERY SAD.png";
              } else if (response.finalAverageMood >= 21 && response.finalAverageMood <= 40 ) {
                emotionFace = "../resources/SAD.png";
              } else if (response.finalAverageMood >= 41 && response.finalAverageMood <= 60 ) {
                emotionFace = "../resources/NEUTRAL.png";
              } else if (response.finalAverageMood >= 61 && response.finalAverageMood <= 80 ) {
                emotionFace = "../resources/HAPPY.png";
              } else if (response.finalAverageMood == 0) {
                emotionFace = "../resources/notavailable.png";
              }else {
                emotionFace = "../resources/VERY HAPPY.png";
              }
              $('#MoodPanel').append("<img class='img-responsive emotionImg' src='"+emotionFace+"'/>");
            } else {
              $('#MoodPanel').html("Oh No");
            }
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

      //STUDENT CHART
      function load_student_charts(varHolder, holderElement){
        var myBarStudent;
        var action = varHolder;
        var dataStudents = {};
        var optionsStudents = {};
          $.ajax({
           url:"model/dashboardChart.php",
           method:"POST",
           data:{actionCourse:action},
           success:function(data)
           {
             if (data.successStudent) {
               dataStudents = {
                   labels: data.labelArray,
                   datasets: [{
                       backgroundColor: [
                         'rgba(54, 162, 235, 1)',
                          'rgba(255, 99, 132, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)',
                          'rgba(255, 118, 181, 1)',
                          'rgba(255, 243, 144, 1)',
                          'rgba(74, 185, 204, 1)',
                          'rgba(74, 204, 90, 1)',
                          'rgba(104, 255, 231, 1)',
                          'rgba(204, 99, 62, 1)'
                      ],
                      borderColor: [
                         'rgba(54, 162, 235, 1)',
                         'rgba(255,99,132,1)',
                         'rgba(255, 206, 86, 1)',
                         'rgba(75, 192, 192, 1)',
                         'rgba(153, 102, 255, 1)',
                         'rgba(255, 159, 64, 1)',
                         'rgba(255, 118, 181, 1)',
                         'rgba(255, 243, 144, 1)',
                         'rgba(74, 185, 204, 1)',
                         'rgba(74, 204, 90, 1)',
                         'rgba(104, 255, 231, 1)',
                         'rgba(204, 99, 62, 1)'
                     ],
                     borderWidth: 1,
                     data: data.countItem,
                   }]
               };
               optionsStudents = {
                   responsive:true,
                   legend: {
                        display: true,
                        position: "bottom",
                        labels: {
                            fontColor: "#333",
                        }
                    }

               };
               var ctxStudent = document.getElementById(holderElement);
               var myBarStudent = new Chart(ctxStudent, {
                   type: 'doughnut',
                   data: dataStudents,
                   options: optionsStudents
               });
             }else {
               $(".labelRecord").show();
             }
           }
         });
      }

      //MOOD CHART
      function load_mood_charts(varHolder, holderElement){
        console.log("WORKING");
        var myBarStudent;
        var action = varHolder;
        var dataStudents = {};
        var optionsStudents = {};
          $.ajax({
           url:"model/dashboardChart.php",
           method:"POST",
           data:{actionCourse:action},
           success:function(data)
           {
             if (data.successMood) {
               dataStudents = {
                   labels: data.MoodCourse,
                   datasets: [{
                       backgroundColor: [
                         'rgba(54, 162, 235, 1)',
                          'rgba(255, 99, 132, 1)',
                          'rgba(255, 206, 86, 1)',
                          'rgba(75, 192, 192, 1)',
                          'rgba(153, 102, 255, 1)',
                          'rgba(255, 159, 64, 1)',
                          'rgba(255, 118, 181, 1)',
                          'rgba(255, 243, 144, 1)',
                          'rgba(74, 185, 204, 1)',
                          'rgba(74, 204, 90, 1)',
                          'rgba(104, 255, 231, 1)',
                          'rgba(204, 99, 62, 1)'
                      ],
                      borderColor: [
                         'rgba(54, 162, 235, 1)',
                         'rgba(255,99,132,1)',
                         'rgba(255, 206, 86, 1)',
                         'rgba(75, 192, 192, 1)',
                         'rgba(153, 102, 255, 1)',
                         'rgba(255, 159, 64, 1)',
                         'rgba(255, 118, 181, 1)',
                         'rgba(255, 243, 144, 1)',
                         'rgba(74, 185, 204, 1)',
                         'rgba(74, 204, 90, 1)',
                         'rgba(104, 255, 231, 1)',
                         'rgba(204, 99, 62, 1)'
                     ],
                     borderWidth: 1,
                     data: data.MoodDetails,
                   }]
               };
               optionsStudents = {
                  legend: {
                     display: false
                  },
                   responsive:true,
                   scales: {
                       xAxes: [{
                           ticks: {
                               display: false
                           },
                           gridLines: {
                               drawOnChartArea: true
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
               var ctxStudent = document.getElementById(holderElement);
               var myBarStudent = new Chart(ctxStudent, {
                   type: 'bar',
                   data: dataStudents,
                   options: optionsStudents
               });
             }else {
               $(".labelRecord").show();
             }
           }
         });
      }


      $(document).ready(function(){
        var counterTimer = false;
        fetch_data();
        getDashboard();
        load_unseen_notification();
        load_student_charts("Course", "studentChartCourse");
        load_mood_charts("CourseMood", "moodChartCourse");

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

        //STUDENTS
        $('#selectCategory').on('change', function() {
          var chartElement;
          if (this.value == "Course") {
            $('#studentChartGender').hide();
            $('#studentChartCourse').show();
            chartElement = "studentChartCourse";
          } else {
            $('#studentChartGender').show();
            $('#studentChartCourse').hide();
            chartElement = "studentChartGender";
          }
          load_student_charts(this.value, chartElement);
        });

        //MOODS
        $('#moodCategory').on('change', function() {
          var chartElement;
          if (this.value == "Course") {
            $('#moodChartGender').hide();
            $('#moodChartCourse').show();
            chartElement = "moodChartCourse";
          } else {
            $('#moodChartGender').show();
            $('#moodChartCourse').hide();
            chartElement = "moodChartGender";
          }
          load_mood_charts(this.value+"Mood", chartElement);
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
