<!DOCTYPE html>
<html>
  <head>
    <title>Hady - Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0\font-awesome-4.7.0\css\font-awesome.min.css">
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/typed.js"></script>
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
    <!--<script>
    <src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>-->
  </head>

  <style>
  body{
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6)), url(resources/hope.jpg) no-repeat center center fixed;
    -webkit-background-size: cover;
    -moz-background-size: cover;
    -o-background-size: cover;
    background-size: cover;
    padding-top: 70px; /* Required padding for .navbar-fixed-top. Change if height of navigation changes. */
    margin: 0;

  }
  #nav.shrink {
    height: 80px;
    z-index: 1;
    background: linear-gradient(rgba(0, 0, 0, 1), rgba(0, 0, 0, 1));
    transition: all ease .5s;
  }
  .navForeground{
    z-index: 999;
  }
  .navbar-fixed-top .nav {
      padding-top: 15px;
      padding-bottom: 15px;
      padding-left: 0;
      padding-right: 0;
      transition: all ease .5s;
  }

  .navbar-fixed-top .navbar-brand {
      padding-top: 4px;
      padding-right:15px;
      padding-left: :15px;
      padding-bottom: : 4px;
  }
  .navbar-brand img{
    width: 185px;
    height: 70px;
  }
  .navbar-default .navbar-toggle .icon-bar{
    background-color: #ffffff;
  }
  .navbar-default .navbar-header .toggle-button:active,   .navbar-default .navbar-header .toggle-button:focus{
    background-color: #51B47B;
  }
  .toggle-button{
    height: 50px;
    margin-top: 15px;
    border: none;
    outline: none;
  }
  .navbar-nav li, .navbar-btn{
    font-size: 16px;
  }
  .navbar-btn{
    padding-top:2px;
    padding-left: 8px;
    padding-bottom: 4px;
    padding-right: 8px;
    background-color: #51B47B;
    border-color: #51B47B;
    color: #ffffff;
    margin-left: 10px;
  }
  .navbar-btn:hover, .navbar-btn:focus, .navbar-btn:active{
    color: #ffffff;
    background-color: #77DFF0;
    border-color: #77DFF0;
  }
  .navbar-default .navbar-nav > li > a {
    color: #56A4BE; /*Change active text color here*/
  }
  /*.nav>li>a:focus, .nav>li>a:hover {
        text-decoration: none;
        background-color: transparent !important;
  }*/
  .navbar-default {
    background-color:transparent;
    background-image: none;
    background-repeat: no-repeat;
    border-color: transparent;
  }
  nav ul li a,
  nav ul li a:after,
  nav ul li a:before {
    transition: all .5s;
  }
  nav.navbar ul li a {
    position:relative;
    z-index: 1;
    font-family: 'Ubuntu', sans-serif;
    font-size: 17px;
  }
  .navbar-default .navbar-nav > li > a:hover, .navbar-default .navbar-nav > li > a:focus {
    color: #ffffff; /*Sets the text hover color on navbar*/
  }
  nav.navbar ul li a:after {
    display: block;
    position: absolute;
    top: 0;
    left: 0;
    bottom: 0;
    right: 0;
    margin: auto;
    width: 100%;
    height: 1px;
    content: '.';
    color: transparent;
    background: #77DFF0;
    visibility: none;
    opacity: 0;
    z-index: -1;
  }
  nav.navbar ul li a:hover:after {
    opacity: 1;
    visibility: visible;
    height: 100%;
  }

  #header{
    height:700px;
    padding: 20px;
    font-family: 'Ubuntu', sans-serif;
    color: #DEDDE0;
  }
  #header .row{
    padding-top: 30px;
    padding-left: 20px;
    padding-right: 20px;
    padding-bottom: 30px;
    height: 100%;
  }
  #header .row p{
    font-size: 20px;
  }
  #header .row .right-content{
    padding-top: 70px;
  }
  #header .row .right-content .signUp-btn{
    padding-top: 15px;
    padding-bottom: 15px;
    padding-left: 30px;
    padding-right: 30px;
    background-color: #51B47B;
    border-color: #51B47B;
    color: #ffffff;
  }
  #header .row .right-content .signUp-btn:hover, .signUp-btn:focus, .signUp-btn:active{
    color: #ffffff;
    background-color: #56BE9F;
    border-color: #56BE9F;
  }
  #header .row .lef-content img{
    max-width: 100%;
  }
  #features{
    position: absolute;
    width:100%;
    margin-left: 0;
    margin-right: 0;
    background-color: #DEDDE0;
    font-family: 'Ubuntu', sans-serif;
    z-index: 0;
  }
  #features .row{
    padding-top: 30px;
  }
  #features .container .row .col-md-4 .list-group .list-group-item{
    background-color: #DEDDE0;
  }
  #features .container .row .col-md-4 .list-group{
    background-color: #DEDDE0;
    border-width:0px !important;
    box-shadow: none !important;
  }
  .fa{
    color: #54a7a6;
  }

  /*For blinking cursor*/
  .typed-cursor {
    font-size: 45px;
    opacity: 1;
    -webkit-animation: blink 0.7s infinite;
    -moz-animation: blink 0.7s infinite;
    animation: blink 0.7s infinite;
  }
  @keyframes blink {
      0% { opacity: 1; }
      50% { opacity: 0; }
      100% { opacity: 1; }
  }
  @-webkit-keyframes blink {
      0% { opacity: 1; }
      50% { opacity: 0; }
      100% { opacity: 1; }
  }
  @-moz-keyframes blink {
      0% { opacity: 1; }
      50% { opacity: 0; }
      100% { opacity: 1; }
  }
  .typed{
    display: inline;
  }
  #typedHeader{
    font-size: 50px;
  }
  #typedFeatures{
    font-size: 40px;
  }

  @media only screen and (max-width:767px) {
      body {
          padding-top: 100px; /* Required padding for .navbar-fixed-top. Change if height of navigation changes. */
      }
      .navbar-header{
        height: 80px;
      }
      .navbar-fixed-top >.nav {
          padding: 30px 0;
      }
      .navbar-fixed-top .navbar-brand {
        padding-top: 3px;
        padding-right:15px;
        padding-left:15px;
        padding-bottom: 3px;
      }
      .toggle-button{
        margin-left: 30px;
        border: none;
        outline: none;
      }
      #bs-example-navbar-collapse-1{
        border: none;
        outline: none;
        background: linear-gradient(rgba(0, 0, 0, 0.9), rgba(0, 0, 0, 0.9));
        transition: all ease .5s;
      }
      #header{
        text-align: center;
        height: 800px;
      }
      #header .row .right-content{
        padding-top: 0;
      }
  }
  @media only screen and (min-width:767px) {
    .content{
      margin-top: 20px;
    }
  }

  .slideanim {visibility:hidden;}
  .slide {
      animation-name: slide;
      -webkit-animation-name: slide;
      animation-duration: 1s;
      -webkit-animation-duration: 1s;
      visibility: visible;
  }
  @keyframes slide {
    0% {
      opacity: 0;
      transform: translateY(70%);
    }
    100% {
      opacity: 1;
      transform: translateY(0%);
    }
  }
  @-webkit-keyframes slide {
    0% {
      opacity: 0;
      -webkit-transform: translateY(70%);
    }
    100% {
      opacity: 1;
      -webkit-transform: translateY(0%);
    }
  }

  </style>

  <body>
      <!--Navigation Bar-->
    <nav class="navbar navbar-default navbar-fixed-top" id="nav" role="navigation">
        <div class="container navForeground">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle toggle-button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="resources/LogoNamePNG.png" alt="Hady Logo with Text">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Activities</a></li>
                    <li><a href="#">Mood Chart</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Science</a></li>
                    <li><button class="btn navbar-btn" id="signIn-btn">Sign In</button></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

      <!--End Navigation Bar-->


    <div class="content" id="content" style="margin:0;">

        <!--Header-->
      <div class="container" id="header">
        <div class="row">
          <div class="col col-sm-6 right-content">
            <h1 id="typedHeader" class="typed"></h1>
            <br>
            <p>
              I am your Friend, Assistant, Life Coach, and your
              Personal Mental Health Companion that will always be here for you
              whenever and wherever you are.
            </p>
            <br><br>
            <p>Sign up now and start improving your mental health.</p>
            <a class="btn btn-lg signUp-btn" href="sign_up.php">Sign Up for Free</a>
          </div>
          <div class="col col-sm-6 lef-content">
            <img src="resources/LogoChatPNG.png" class="img-responsive" alt="Hady Logo" id="headerLogo">
          </div>

        </div>
      </div><!--HEADER END-->

          <!--FEATURES-->
      <div class="container-fluid" id="features">
        <div class="container">
          <div class="row">
            <center><h2 id="typedFeatures" class="typed"></h2></center>
            <div class="col-md-4">
              <ul class="list-group" id="lg1">
                <li class="list-group-item" style="border: 0 none">
                  <h3>Track Your Mood</h3>
                  <i class="fa fa-bar-chart fa-4x fa-pull-right slideanim"></i>
                  <p>Each week I’ll show you how your mood changes on a graph so you can see what is your progress.</p>
                </li>
                <li class="list-group-item" style="border: 0 none">
                  <h3>Help you feel better</h3>
                  <i class="fa fa-thumbs-o-up fa-4x fa-pull-right slideanim"></i>
                  <p>I will always make sure that you will feel better everytime you talk to me.</p>
                </li>
                <li class="list-group-item" style="border: 0 none">
                  <h3>Always there 24/7</h3>
                  <i class="fa fa-clock-o fa-4x fa-pull-right slideanim"></i>
                  <p>I don’t actually sleep ever so I'm always here whenever you need me.</p>
                </li>
              </ul>
            </div>
            <div class="col-md-4"><img class="sampleApp img-responsive" src="resources\SampleAppPSD.png" alt="Sample of AICCo."></div>
            <div class="col-md-4">
              <ul class="list-group" id="lg2">
                <li class="list-group-item" style="border: 0 none">
                  <h3 style="margin-left:50px">Very Responsive</h3>
                  <i class="fa fa-tablet fa-4x fa-pull-left slideanim"></i>
                  <p>Do you have multiple devices? No worries because you can access me on any device (desktops, tablets, and phones). </p>
                </li>
                <li class="list-group-item" style="border: 0 none">
                  <h3 style="margin-left:70px">Gives Activities</h3>
                  <i class="fa fa-files-o fa-4x fa-pull-left slideanim"></i>
                  <p>I will also give you activities that can help you throughout your sessions. </p>
                </li>
                <li class="list-group-item" style="border: 0 none">
                  <h3 style="margin-left:80px">Teach you stuff</h3>
                  <i class="fa fa-heart-o fa-4x fa-pull-left slideanim"></i>
                  <p>I’ve got lots of techniques from Cognitive Behavioral Therapy that I can share with you.</p>
                </li>
              </ul>
            </div>

          </div><!--row-->
        </div> <!--container-->
      </div><!--features end-->



    </div> <!--content-->



    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
    <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>




    <script>
    $(document).ready(function() {
        $(window).scroll(function() {
          if($(document).scrollTop() > 10) {
            $('#nav').addClass('shrink');
          }
          else {
          $('#nav').removeClass('shrink');
          }
        });

        var typed = new Typed('#typedHeader',{
          strings: ["Hi there,","I'm Hady!"],
          backSpeed: 40,
          typeSpeed: 60,
          backDelay: 1500,
        });

        var type1 = new Typed('#typedFeatures',{
          strings:["FEATURES"],
          typeSpeed:60,
          backSpeed:40,
          backDelay:2500,
          loop:true
        });

        $("#signIn-btn").click(function(){
          window.location.assign("sign_in.php");
        });

        $(window).scroll(function() {
          $(".slideanim").each(function(){
            var pos = $(this).offset().top;

            var winTop = $(window).scrollTop();
              if (pos < winTop + 600) {
                $(this).addClass("slide");
              }
          });
        });

      }); //ready function end
    </script>

  </body>
</html>
