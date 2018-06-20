
<?php
  session_start();

  if (!$_SESSION['isLogin']) {
    header("Location: ../sign_in.php");
  }
  debug_to_console($_SESSION['userId']);

  function debug_to_console( $data ) {
    $output = $data;
    if ( is_array( $output ) )
        $output = implode( ',', $output);

    echo "<script>console.log( 'Debug Objects: " . $output . "' );</script>";
  }
 ?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hady - Home</title>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/navbar-fixed-side.css" />
    <link rel="stylesheet" type="text/css" href="css/rzslider.min.css"/>
    <link rel="stylesheet" href="../font-awesome-4.7.0\font-awesome-4.7.0\css\font-awesome.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootbox.min.js"></script>
    <script src="../js/typed.js"></script>
    <script src="../js/scrollreveal.min.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

  </head>

  <style>
    .themeDarkSky{
      background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url(../resources/darkSky.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      margin: 0;
      position: relative;
    }
    .themeNightSky{
      background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url(../resources/nightSky.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      margin: 0;
      position: relative;
    }
    .themeHimalayas{
      background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url(../resources/himalayasBG.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      margin: 0;
      position: relative;
    }
    .themeMountainSky{
      background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url(../resources/mountainSky.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      margin: 0;
      position: relative;
    }
    .themeDefault{
      background: linear-gradient(rgba(0, 0, 0, 0.1), rgba(0, 0, 0, 0.1)), url(../resources/mainbgBlur.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
      margin: 0;
      position: relative;
    }
    .content{
      color: #EFEEF1;
    }

  </style>

  <body ng-app="hadyWebApp" ng-controller="IndexCtrl" ng-class="$root.appBodyBG" ng-init="loadResource()">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-lg-2">
          <nav class="navbar navbar-default navbar-fixed-side">
            <div class="container-fluid navForeground">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" id="UserAvatar">
                      <img ng-src={{$root.avatarSrc}} height="60px" width="60px" class="avatarImage">
                    </a>
                    <div class="welcomeUser">
                      <h4>Welcome,</h4>
                      <h3> {{$root.Nickname}}</h3>
                    </div>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-main" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="#/" class="active"><i class="fa fa-home"></i><span class="textLink">Today</span></a></li>
                        <li><a href="#/moodTrack"><i class="fa fa-bar-chart"></i><span class="textLink">Mood Tracking</span></a></li>
                        <li><a href="#/chat"><i class="fa fa-comments-o"></i><span class="textLink">Chat</span></a></li>
                        <li><a href="#/activities"><i class="fa fa-lightbulb-o"></i><span class="textLink">Activities</span></a></li>
                        <li><a href="#/account"><i class="fa fa-cog"></i><span class="textLink">Account</span></a></li>
                    </ul>
                </div>
                <div class="navbar-footer">
                  <img src="../resources/LogoNamePNG.png" alt="Hady Logo" class="img-responsive">
                </div>
            </div>
          </nav>
        </div>

        <!--Main App-->
        <div class="col-sm-9 col-lg-10 content" ng-view>

        </div>
      </div>
    </div>


    <script src="lib/angular.min.js"></script>
    <script src="lib/angular-route.min.js"></script>
    <script src="lib/angular-sanitize.min.js"></script>
    <script src="lib/underscore-min.js"></script>
    <script src="lib/rzslider.min.js"></script>
    <script src="lib/angular-drag-and-drop-lists.min.js"></script>
    <script src="lib/Chart.min.js"></script>
    <script src="lib/angular-chart.min.js"></script>
    <script src="app_routes.js"></script>
    <script src="js/today.js"></script>
    <script src="js/moodTrack.js"></script>
    <script src="js/chat.js"></script>
    <script src="js/activities.js"></script>
    <script src="js/account.js"></script>
    <script src="js/app_service.js"></script>
    <script src="js/body.js"></script>
    <script>
      var idleTime = 0;

      $(document).ready(function(){
        //fetch_data();
        addRemove_active();
        //fetch data for user avatar
        /*function fetch_data() {
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
        }*/

        //add active class for page refresh
        function active_class_refresh(){
          if (performance.navigation.type == 1) {
            addRemove_active();
          }
        }
        function addRemove_active(){
          var pathname = window.location.href;
          var extractLoc = pathname.substr(pathname.indexOf('#'));
          $('.navbar-nav > li > a').closest('ul').find('.active').removeClass('active');
          $('.navbar-nav > li > a[href="'+extractLoc+'"]').addClass('active');
        }

        //add active class when link is clicked
        $('.navbar-nav li').on('click', 'a', function () {
          // only do the following if the clicked link isn't already active
          if(!$(this).closest('li').hasClass('active')) {
              $(this).closest('ul').find('.active').removeClass('active');
              $(this).closest('a').addClass('active');
          }
        });

        //Increment the idle time counter every minute.
        var idleInterval = setInterval(timerIncrement, 60000); // 1 minute

        //Zero the idle timer on mouse movement.
        $(this).mousemove(function (e) {
            idleTime = 0;
        });
        $(this).keypress(function (e) {
            idleTime = 0;
        });

      });

      function timerIncrement() {
          idleTime = idleTime + 1;
          if (idleTime > 29) { // 30 minutes
            $.ajax({
             url:"model/destroy.php",
             method:"POST",
             data:{},
             success:function(data)
             {
              window.location.href = '../sign_in.php?action=1';
             }
            })
            //alert("You will be logout because of inactivity.");
          }
      }
    </script>
  </body>
</html>
