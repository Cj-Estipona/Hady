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
    <title>Hady - Reset Your Password</title>
  </head>

  <style>
    .spinner {
      display: none;
    margin: 100px auto 0;
    width: 70px;
    text-align: center;
    }

    .spinner > div {
    width: 18px;
    height: 18px;
    background-color: #333;

    border-radius: 100%;
    display: inline-block;
    -webkit-animation: sk-bouncedelay 1.4s infinite ease-in-out both;
    animation: sk-bouncedelay 1.4s infinite ease-in-out both;
    }

    .spinner .bounce1 {
    -webkit-animation-delay: -0.32s;
    animation-delay: -0.32s;
    }

    .spinner .bounce2 {
    -webkit-animation-delay: -0.16s;
    animation-delay: -0.16s;
    }

    @-webkit-keyframes sk-bouncedelay {
    0%, 80%, 100% { -webkit-transform: scale(0) }
    40% { -webkit-transform: scale(1.0) }
    }

    @keyframes sk-bouncedelay {
      0%, 80%, 100% {
        -webkit-transform: scale(0);
        transform: scale(0);
      } 40% {
        -webkit-transform: scale(1.0);
        transform: scale(1.0);
      }
    }
    #titleHeading{
      color: #54a7a6;
    }
    hr{
      background-color: #51B47B;
      height: 1px;
      border: 0;
    }
    #HadyAvatar{
      height: 700px;
      max-width: 100%;
    }
    .alert2{
      display: none;
      text-align: center;
      margin-bottom: 25px;
    }
    .alert3{
      display: none;
      text-align: center;
      margin-bottom: 25px;
    }
    .left-content{
      margin-top: 20px;
    }
    .container{
      margin-top: 15px;
    }
    .btn{
      margin-top: 20px;
      float: right;
    }
    #message{
      font-size: 16px;
      color: #51B47B;
    }
    #message3{
      font-size: 16px;
      color: #51B47B;
    }
    p{
      font-size: 16px;
    }
    .error{
      display: none;
      color: red;
      font-size: 16px;
    }
    .left-content-2{
      display: none;
    }
    .left-content-3{
      display: none;
    }
    .group3{
      margin-bottom: 15px;
      margin-top: 15px;
    }
    #login{
      display: none;
      margin-right: 20px;
      margin-left: 20px;
    }

  </style>

  <body>
    <div class="container">
      <h2 id="titleHeading">Reset Your Password</h2>
      <hr>
      <div class="row">
        <div class="col-md-5 left-content-2">
          <!--alert-->
          <div class="alert alert-info alert-dismissible alert2">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Please Check Your Email</strong><br>We have sent an email to your account.
          </div>

          <form class="form-horizontal" method="POST" action="resetPassword.php" id="inForm">
            <p>Enter your email address and we will send an instructions on how to reset your password.</p>
            <div class="input-group" id="error_for_email">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input id="email" type="email" class="form-control input-lg" name="email" placeholder="Email">
              <span id="span_error_email"></span>
            </div>
            <input id="typeReset" type="hidden" name="typeReset" value="initialReset">
            <div id = "message"></div>
            <span class="error-email error">Missing Email</span>
            <div class="spinner">
              <div class="bounce1"></div>
              <div class="bounce2"></div>
              <div class="bounce3"></div>
            </div>
            <input id="submit1" type="button" class="btn btn-info btn-lg" value="Send"><br><br>
          </form>
        </div>

        <div class="col-md-5 left-content-3">
          <form class="form-horizontal" method="POST" action="resetPassword.php" id="inForm3">
            <p>Please enter your new password.</p>

            <div class="input-group group3" id="errorEmail">
              <span class="input-group-addon"><i class="glyphicon glyphicon-envelope"></i></span>
              <input id="email3" type="email" class="form-control input-lg" name="email3" placeholder="Email" readonly>
            </div>

            <div class="input-group group3" id="errorPass">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="password" type="password" class="form-control input-lg" name="password" placeholder="New Password" required>
              <span id="span_error_pass"></span>
            </div>

            <div class="input-group group3" id="errorNewPass">
              <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
              <input id="confirmPass" type="password" class="form-control input-lg" name="confirmPassword" placeholder="Confirm New Password" required>
              <span id="span_error_pass2"></span>
            </div>
            <input id="userId" type="hidden" name="userId">
            <input id="typeReset3" type="hidden" name="typeReset" value="finalReset">

            <div class="checkbox">
              <label><input type="checkbox" value="Show Password" name="showPassword" id="showPassword">Show Password</label>
            </div>
            <div id = "message3"></div>
            <span class="error-password error"></span>

            <input id="submit2" type="button" class="btn btn-info btn-lg" value="Change">
            <button id="login" type="button" class="btn btn-info btn-lg">Login</button><br><br>

          </form>
        </div>

        <div class="col-md-7 right-content">
          <center>
            <img src="resources/1530340779585_COUNSELOR CLIEN.png" class="img-responsive" alt="Hady Logo" id="HadyAvatar">
          </center>
        </div>
      </div>
    </div>
  </body>
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
      var action = getUrlParameter('action');
      if(action==2){
        $('.left-content-2').show();
        $('.left-content-3').hide();
        //console.log(action);
      } else {
        $('.left-content-3').show();
        $('.left-content-2').hide();
      }
      $('#submit1').click(function(e){
        $('.spinner').show();
        //$("#submit1").attr("disabled", "disabled");
        e.preventDefault();
        var data = $('#inForm').serialize();
        console.log(data);
        $.ajax({
          type:'POST'
          ,url: 'resetPassword.php'
          ,data: data
          ,dataType: 'json'
          ,success: function(d){
            //console.log(d);
            //console.log(d.hello);
            //$('#message').html(d.message);
            $('.spinner').hide();
            if(d.success){
              //$('#inForm').append('<div>'+d.message+'</div>');
              $('#message').show();
              $('#message').html(d.message);
              $('.error-email').hide();
              $("#error_for_email").removeClass("has-error");
              $("#error_for_email").removeClass("has-feedback");
              $("#span_error_email").removeClass("glyphicon");
              $("#span_error_email").removeClass("glyphicon-remove");
              $("#span_error_email").removeClass("form-control-feedback");
              $("input[type=submit]").attr("disabled", "disabled");
            }
            else {
              $('#message').hide();
              $('.error-email').show();
              $('.error-email').html(d.message);
              $("#error_for_email").addClass("has-error");
              $("#error_for_email").addClass("has-feedback");
              $("#span_error_email").addClass("glyphicon");
              $("#span_error_email").addClass("glyphicon-remove");
              $("#span_error_email").addClass("form-control-feedback");
              $("input[type=submit]").removeAttr("disabled", "disabled");
            }
          }
        })
      })//submit1 click
      var email = getUrlParameter('email');
      var userId = getUrlParameter('userCode');
      $('#email3').val(email);
      $('#userId').val(userId);

      $("#showPassword").click(function(){
        $("#password").attr('type', $(this).is(':checked') ? 'text' : 'password');
        $("#confirmPass").attr('type', $(this).is(':checked') ? 'text' : 'password');
      });

      $("#login").click(function(){
        window.location.replace("sign_in.php");
      });

      $('#submit2').click(function(e){
        //console.log($('#email3').val());
        //$("#submit2").attr("disabled", "disabled");
        e.preventDefault();
        var data3 = $('#inForm3').serialize();
        console.log(data3);
        $.ajax({
          type:'POST'
          ,url: 'resetPassword.php'
          ,data: data3
          ,dataType: 'json'
          ,success: function(d){
            if(d.success){
              removeError(d.message)
              $('#login').show();
            }
            else {
              applyError(d.error);
              //console.log(d.error);
            }
          }
        })
      })
    })
    function applyError(message){
      $('#message').hide();
      $('.error-password').show();
      $('.error-password').html(message);
      $("#errorPass").addClass("has-error");
      $("#errorPass").addClass("has-feedback");
      $("#errorNewPass").addClass("has-error");
      $("#errorNewPass").addClass("has-feedback");
      $("#span_error_pass").addClass("glyphicon");
      $("#span_error_pass").addClass("glyphicon-remove");
      $("#span_error_pass").addClass("form-control-feedback");
      $("#span_error_pass2").addClass("glyphicon");
      $("#span_error_pass2").addClass("glyphicon-remove");
      $("#span_error_pass2").addClass("form-control-feedback");
      $("input[type=button]").removeAttr("disabled", "disabled");
    }
    function removeError(message){
      $('#message3').show();
      $('#message3').html(message);
      $('.error-password').hide();
      $("#errorPass").removeClass("has-error");
      $("#errorPass").removeClass("has-feedback");
      $("#errorNewPass").removeClass("has-error");
      $("#errorNewPass").removeClass("has-feedback");
      $("#span_error_pass").removeClass("glyphicon");
      $("#span_error_pass").removeClass("glyphicon-remove");
      $("#span_error_pass").removeClass("form-control-feedback");
      $("#span_error_pass2").removeClass("glyphicon");
      $("#span_error_pass2").removeClass("glyphicon-remove");
      $("#span_error_pass2").removeClass("form-control-feedback");
      $("input[type=button]").attr("disabled", "disabled");
    }
  </script>
</html>
