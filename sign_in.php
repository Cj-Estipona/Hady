<?php
  session_start();
 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="resources/iconLogo.png">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0\font-awesome-4.7.0\css\font-awesome.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!--<script
    <src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>-->
    <title>Hady - Your Personal Mental Health Therapist</title>
  </head>

  <style>
    color1 = #5181B4;
    color2 = #56A4BE;
    color3 = #54a7a6;
    color4 = #56BE9F;
    color5 = #51B47B;


    html {
    position: relative;
    min-height: 100%;
    }
    .carousel-fade .carousel-inner .item {
      opacity: 0;
      transition-property: opacity;
    }
    .carousel-fade .carousel-inner .active {
      opacity: 1;
    }
    .carousel-fade .carousel-inner .active.left,
    .carousel-fade .carousel-inner .active.right {
      left: 0;
      opacity: 0;
      z-index: 1;
    }
    .carousel-fade .carousel-inner .next.left,
    .carousel-fade .carousel-inner .prev.right {
      opacity: 1;
    }
    .carousel-fade .carousel-control {
      z-index: 2;
    }
    @media all and (transform-3d),
    (-webkit-transform-3d) {
      .carousel-fade .carousel-inner > .item.next,
      .carousel-fade .carousel-inner > .item.active.right {
          opacity: 0;
          -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
      }
      .carousel-fade .carousel-inner > .item.prev,
      .carousel-fade .carousel-inner > .item.active.left {
          opacity: 0;
          -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
      }
      .carousel-fade .carousel-inner > .item.next.left,
      .carousel-fade .carousel-inner > .item.prev.right,
      .carousel-fade .carousel-inner > .item.active {
          opacity: 1;
          -webkit-transform: translate3d(0, 0, 0);
          transform: translate3d(0, 0, 0);
      }
    }
    .item:nth-child(1) {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(resources/counselling.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    .item:nth-child(2) {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(resources/hope.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    .item:nth-child(3) {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(resources/016.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    .item:nth-child(4) {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(resources/holding-hands-perfect-care.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    .item:nth-child(5) {
      background: linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)), url(resources/17-4-30_kb_achareimot-kedoshim.jpg) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size: cover;
      background-size: cover;
    }
    .carousel {
      z-index: -99;
    }
    .carousel .item {
      position: fixed;
      width: 100%;
      height: 100%;
    }

    .panel{
      margin-top: 50px;
      max-width: 50%;
      font-family: 'Ubuntu', sans-serif;
      border: 0 none !important;
    }
    .panel-transparent {
        background: none;
    }

    .panel-transparent .panel-heading{
        background: rgba(0,0,0,0)!important;
        border: 0 none;
    }

    .panel-transparent .panel-body{
        background: rgba(0,0,0,0)!important;
    }
    @media screen and (max-width: 480px) {
      .panel {max-width: 90%;}
    }
    @media screen and (max-width: 640px) {
        .panel {max-width: 80%;}
    }
    .logo{
      max-height: 250px;
      /*max-width: 250px;*/
      display: block;
    }
    .error{
      display: none;
      color: red;
    }
    .input-group{
      margin-top: 20px;
    }
    .btn{
      width: 70%;
      font-size: 20px
      border: 0 none;
      border-radius: 24px;
      font-family: 'Ubuntu', sans-serif;
    }
    .text{
      font-size: 17px;
    }
    p{
      color: #f0f0f0;
      font-family: 'Ubuntu', sans-serif;
      font-size: 17px;
    }
    .alert1, .alert2, .alert3{
      display: none;
    }

  </style>

  <body>
    <div class="carousel slide carousel-fade" data-ride="carousel" data-interval="20000">
    <!-- Wrapper for slides -->
      <div class="carousel-inner" role="listbox">
        <div class="item active"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
        <div class="item"></div>
      </div>
    </div>


    <center>
    <div class="container">
      <div class="row">
          <div class="panel panel-default panel-transparent">
            <div class="panel-heading">
              <img src="resources/LogoNamePNG.png" class="logo img-responsive" alt="logo">
            </div>
            <div class="panel-body">
              <div id = "message"></div>
              <!--alert-->
              <div class="alert alert-info alert-dismissible alert1">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <strong>You have been logout.</strong> <br>You have been inactive for 30 mins.
              </div>

              <!--alert-->
              <div class="alert alert-info alert-dismissible alert2">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p>Your account has been confirmed. You can now sign in.</p>
              </div>

              <!--alert-->
              <div class="alert alert-danger alert-dismissible alert3">
                <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                <p style="color:#000000;">Please Confirm Your Email Account.</p>
              </div>

              <form class="form-horizontal" method="POST" action="validator_signin.php" id="inForm">
                <div class="input-group" id="error_for_email">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                  <input id="email" type="email" class="form-control input-lg" name="email" placeholder="Email">
                  <span id="span_error_email"></span>
                </div>
                <span class="error-email error">Missing Email</span>
                <div class="input-group" id="error_for_password">
                  <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                  <input id="password" type="password" class="form-control input-lg" name="password" placeholder="Password">
                  <span id="span_error_password"></span>
                </div>
                <span class="error-password error">Missing Password</span>
                <br>
                <input type="submit" class="btn btn-info btn-lg" value="Sign in"><br><br>
                <a href="sign_up.php" class="btn btn-warning btn-lg" role="button">Sign up</a>
              </form>

              <br>
                <a href="reset_password.php?action=2" id="forgotPass"><p class="text text-primary">Forgot password?</p></a>
                <p>By signing up, you agree to our <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a>.</p>
                <!--<a href="sign_up.php"><p class="text text-info">Create an account.</p></a>-->
            </div>
          </div>
      </div>
    </div>
    </center>

    <script>
    var getUrlParameter = function getUrlParameter(sParam) {
      var sPageURL = decodeURIComponent(window.location.search.substring(1)),
          sURLVariables = sPageURL.split('&'),
          sParameterName,
          i;

      for (i = 0; i < sURLVariables.length; i++) {
          sParameterName = sURLVariables[i].split('=');

          if (sParameterName[0] === sParam) {
              return sParameterName[1] === undefined ? true : sParameterName[1];
          }
      }
    };
      $(document).ready(function(){
        $('.alert').hide();
        var action = getUrlParameter('action');
        if(action==1){
          $('.alert1').show();
        }
        if(action==2){
          $('.alert2').show();
        }
        $('form').submit(function(e){
          e.preventDefault();
          $('.error').hide();
          var data = $('#inForm').serialize();
          console.log(data);
          $.ajax({
            type:'POST'
            ,url: 'validator_signin.php'
            ,data: data
            ,dataType: 'json'
            ,success: function(d){
              console.log(d);
              //console.log(d.hello);
              $('#message').html(d.message);
              if(d.success){
                if (d.confirmAlert) {
                  $('.alert3').show();
                } else {
                  //$('#inForm').append('<div>'+d.message+'</div>');
                  $('#message').html(d.message);
          				if(d.access == 1){
          					window.location.replace("admin/index.php");
          				}
          				else{
          					window.location.replace("main/index.php");
          				}
                }
              }
              else {
                if(d.errors.email){
                  $('.error-email').show();
                  $('.error-email').html(d.errors.email);
                  $("#error_for_email").addClass("has-error");
                  $("#error_for_email").addClass("has-feedback");
                  $("#span_error_email").addClass("glyphicon");
                  $("#span_error_email").addClass("glyphicon-remove");
                  $("#span_error_email").addClass("form-control-feedback");
                }
                if(d.errors.password){
                  $('.error-password').show();
                  $('.error-password').html(d.errors.password);
                  $("#error_for_password").addClass("has-error");
                  $("#error_for_password").addClass("has-feedback");
                  $("#span_error_password").addClass("glyphicon");
                  $("#span_error_password").addClass("glyphicon-remove");
                  $("#span_error_password").addClass("form-control-feedback");
                }
              }
            }
          })
        })
      })
    </script>

  </body>
</html>
