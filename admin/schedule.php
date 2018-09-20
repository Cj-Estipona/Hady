<?php include 'includes/heading.php'?>
<?php
  $adminCollege = $_SESSION['College'];
  $currentPage = 'Schedule';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hady - Schedule</title>
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
    .schedule-view{
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
    .fc-widget-header{
        background-color:#51B47B;
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
  			<div class="schedule-view">

          <h2>Schedules</h2>
          <hr>

          <div class="mainCalendar">
            <div id="calendar"></div>
          </div>

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

        $("#btnLogout").click(function(){
          logoutExecute();
        });

        var calendar = $('#calendar').fullCalendar({
          height: 550,
          editable:true,
          header:{
            left:'prev,next today',
            center:'title',
            right:'month,agendaWeek,agendaDay'
          },
          events: {
            url: 'loadEvents.php?adminID=<?php echo $adminID; ?>',
          },
          eventBackgroundColor: '#51B47B',
          eventBorderColor: '#51B47B',
          selectable:true,
          selectHelper:true,
          select: function(start, end, allday){
            var title = prompt("Enter Schedule Title");
            if (title) {
              var start = $.fullCalendar.formatDate(start,"Y-MM-DD HH:mm:ss");
              var end = $.fullCalendar.formatDate(end,"Y-MM-DD HH:mm:ss");
              $.ajax({
                url:"insertSched.php",
                type:"POST",
                data:{title:title, start:start, end:end, userid:'<?php echo $adminID; ?>'},
                success:function(){
                  calendar.fullCalendar('refetchEvents');
                  bootbox.alert("Added Successfully");
                }
              })
            }
          },
          editable:true,
          eventResize:function(event){
            var start = $.fullCalendar.formatDate(event.start,"Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end,"Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
              url:"updateSched.php",
              type:"POST",
              data:{id:id, title:title, start:start, end:end, userid:'<?php echo $adminID; ?>'},
              success:function(data){
                console.log(data);
                calendar.fullCalendar('refetchEvents');
                //bootbox.alert("Schedule Updated");
              }
            })
          },
          eventDrop:function(event){
            var start = $.fullCalendar.formatDate(event.start,"Y-MM-DD HH:mm:ss");
            var end = $.fullCalendar.formatDate(event.end,"Y-MM-DD HH:mm:ss");
            var title = event.title;
            var id = event.id;
            $.ajax({
              url:"updateSched.php",
              type:"POST",
              data:{id:id, title:title, start:start, end:end, userid:'<?php echo $adminID; ?>'},
              success:function(data){
                console.log(data);
                calendar.fullCalendar('refetchEvents');
                //bootbox.alert("Schedule Updated");
              }
            })
          },
          eventClick:function(event){
            if (confirm("Are you sure you want to delete this schedule?")) {
              var id = event.id;
              $.ajax({
                url:"deleteSched.php",
                type:"POST",
                data:{id:id, userid:'<?php echo $adminID; ?>'},
                success:function(){
                  //console.log(data);
                  calendar.fullCalendar('refetchEvents');
                  //bootbox.alert("Schedule Updated");
                }
              })
            }
          }
        });


      });

    </script>

  </body>
</html>
