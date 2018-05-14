<!DOCTYPE html>
<html>
  <head>
    <title>Hady - Home</title>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="font-awesome-4.7.0\font-awesome-4.7.0\css\font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootbox.min.js"></script>
    <script src="js/typed.js"></script>
    <script src="js/scrollreveal.min.js"></script>
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
    position: relative;

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
      padding-left: :0;
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
   .navbar-nav li.active a {
      color: #ffffff !important;
      background: #77DFF0 !important;
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
  #header .row .left-content img{
    position: absolute;
    max-width: 100%;
    z-index: 0;
  }
  #features{
    position: static;
    z-index: 1;
    width:100%;
    margin-left: 0;
    margin-right: 0;
    background-color: #DEDDE0;
    font-family: 'Ubuntu', sans-serif;

  }
  #features .row{
    padding-top: 30px;
  }
  #features .container .row .col-md-4 .list-group .list-group-item{
    background-color: #DEDDE0;
    margin-top: 25px;
    margin-bottom: 25px;
    font-size: 18px;
  }
  #features .container .row .col-md-4 .list-group{
    background-color: #DEDDE0;
    border-width:0px !important;
    box-shadow: none !important;
  }
  .fa{
    color: #54a7a6;
  }
  .titleLine{
    display:block;
    width:75px;/*or whatever width you want the effect of <hr>*/
    border-top: 4px solid #54a7a6;
    border-radius:25px;
    margin-bottom: 20px;
  }
  #moodChart{
    position: static;
    z-index: 1;
    width:100%;
    min-height: 100px;
    margin-left: 0;
    margin-right: 0;
    background-color: #FDFBFF;
    font-family: 'Ubuntu', sans-serif;
  }
  #moodChart .container .row{
    padding-top: 80px;
    padding-bottom: 80px;
    margin-bottom: 60px;
  }
  #moodChart .container .row .right-content{
    padding-top: 25px;
    padding-left: 35px;
  }
  #moodChart .container .row .left-content{
    padding-top: 70px;
  }
  #moodChart .container .row .col-md-6 h3{
    font-weight: bold;
    font-size: 25px;
    color: #51B47B;
  }
  #moodChart .container .row .col-md-6 p{
    font-size: 18px;
  }
  #activities{
    position: static;
    z-index: 1;
    width:100%;
    min-height: 100px;
    margin-left: 0;
    margin-right: 0;
    background-color: #DEDDE0;
    font-family: 'Ubuntu', sans-serif;
  }
  #activities .container .row{
    padding-top: 80px;
    padding-bottom: 80px;
    margin-bottom: 60px;
  }
  #activities .container .row .left-content{
    padding-top: 25px;
  }
  #activities .container .row .right-content{
    padding-top: 90px;
    padding-left: 35px;
    text-align: center;
  }
  #activities .container .row .col-md-6 h3{
    font-weight: bold;
    font-size: 25px;
    color: #51B47B;
  }
  #activities .container .row .col-md-6 p{
    font-size: 18px;
  }
  #activities .container .row .col-md-6 .list-group .list-group-item{
    background-color: #DEDDE0;
    padding-top: 0;
    padding-bottom: 0;
  }
  #activities .container .row .col-md-6 .list-group{
    background-color: #DEDDE0;
    border-width:0px !important;
    box-shadow: none !important;
  }

  #science{
    position: static;
    z-index: 998;
    width:100%;
    min-height: 100px;
    margin-left: 0;
    margin-right: 0;
    background-color: #DEDDE0;
    font-family: 'Ubuntu', sans-serif;
  }
  #science .container{
    padding: 0;
    margin: 0;
    width: 100%;
  }
  #science .container .carousel-inner .item .carousel-caption h3{
    color: #51B47B;
    font-weight: bold;
    font-size: 40px;
    margin 20px;
  }
  #science .container .carousel-inner .item .carousel-caption p{
    font-size: 20px;
  }
  #science .container .carousel-inner .item .carousel-caption a{
    color: #51B47B;
  }

  #science .carousel .carousel-caption {
    top: 50%;
    bottom: auto;
    -webkit-transform: translate(0, -50%);
    -ms-transform: translate(0, -50%);
    transform: translate(0, -50%);
    text-shadow: 2px 2px #00000;
  }
  #science .carousel-fade .carousel-inner .item {
    -webkit-transition-property: opacity;
    transition-property: opacity;
  }
  #science .carousel-fade .carousel-inner .item,
  #science .carousel-fade .carousel-inner .active.left,
  #science .carousel-fade .carousel-inner .active.right {
      opacity: 0;
  }
  #science .carousel-fade .carousel-inner .active,
  #science .carousel-fade .carousel-inner .next.left,
  #science .carousel-fade .carousel-inner .prev.right {
      opacity: 1;
  }
  #science .carousel-fade .carousel-inner .next,
  #science .carousel-fade .carousel-inner .prev,
  #science .carousel-fade .carousel-inner .active.left,
  #science .carousel-fade .carousel-inner .active.right {
      left: 0;
      -webkit-transform: translate3d(0, 0, 0);
      transform: translate3d(0, 0, 0);
  }
  #science .carousel-fade .carousel-control {
      z-index: 0;
  }
  #science .carousel-fade .carousel-indicators {
      z-index: 1;
  }
  #science .carousel-fade .carousel-inner .item .overlay {
    position: absolute;
    width: 100%;
    height: 100%;
    background: #000;
    opacity: 0.3;
    transition: all 0.2s ease-out;
  }
  #faq{
    position: static;
    z-index: 1;
    width:100%;
    min-height: 100px;
    margin-left: 0;
    margin-right: 0;
    background: rgba(0,0,0,0)!important;
    font-family: 'Ubuntu', sans-serif;
    color: #DEDDE0;
  }
  #faq .container .row{
    padding-top: 80px;
    padding-bottom: 80px;
    margin-bottom: 60px;
  }
  #faq .container .col-md-6 a{
    font-size: 18px;
  }
  .panel{
    border: 0 none !important;
  }
  #faq .left-content{
    padding-top: 20px;
    padding-left: 100px;
  }
  #faq .right-content{
    padding-top: 20px;
  }
  .panel-transparent {
      box-shadow: none;
      background: none;
  }
  .panel-transparent .panel-heading{
      background: rgba(0,0,0,0)!important;
      border: 0 none !important;
      color: #DEDDE0;
  }
  .panel-transparent .panel-body{
      background: rgba(0,0,0,0)!important;
      border: 0 none !important;
  }
  #faq i{
    margin-right: 10px;
  }
  #footer{
    position: static;
    z-index: 998;
    width:100%;
    min-height: 100px;
    margin-left: 0;
    margin-right: 0;
    background-color: #333333;
    font-family: 'Ubuntu', sans-serif;
    color:   #FDFBFF;
  }
  #footer .row{
    padding-top: 60px;
    margin-left: 50px;
    margin-right: 50px;
    text-align: center;
  }
  #footer .list-group .list-group-item{
    background-color: #333333;
    font-size: 18px;
  }
  #footer .list-group{
    background-color: #333333;
    border-width:0px !important;
    box-shadow: none !important;
  }
  #footer .socialMedia{
    padding-left: 20px;
    padding-right: 20px;
  }
  #footer .list-group-item a{
    text-decoration: none;
    color:   #FDFBFF;
  }
  #footer .list-group-item a:hover{
    color:   #77DFF0;
  }
  #footer h3{
    color: #56A4BE;
  }
  #below{
    margin-top: 20px;
    padding-top: 60px;
  }

  a i.fa-facebook  { color: #3B5998; }
  a i.fa-google-plus { color: #d34836; }
  a i.fa-twitter { color: #4099FF; }



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
  #typedFeatures, #typedMood, #typedActivities, #typedFaq{
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
        height: 900px;
      }
      #header .row .right-content{
        padding-top: 0;
      }
      #features .container .row .col-md-4 .list-group .list-group-item{
        margin-top: 10px;
        margin-bottom: 10px;
      }
      #moodChart .container .row{
        margin-bottom: 0px;
      }
      #moodChart .container .row .right-content{
        padding-left: 15px;
      }
      #moodChart .container .row .left-content{
        padding-top: 25px;
      }
      #activities .container .row{
        margin-bottom: 0px;
      }
      #activities .container .row .right-content{
        padding-top: 50px;
        padding-left: 15px;
      }
      #science .container .carousel-inner .item img{
        height: 400px;
      }
      #science .container .carousel-inner .item .carousel-caption h3{
        font-size: 24px;
        font-weight: normal;
        margin: 10px;
      }
      #science .container .carousel-inner .item .carousel-caption p{
        font-size: 14px;
      }
      #faq .left-content{
        padding-left: 15px;
      }
      #faq .left-content .panel-group{
        margin-bottom: 0;
      }
      #faq .right-content{
        padding-top: 10px;
      }
      #footer .row{
        padding-top: 40px;
        padding-bottom: 30px;
        margin-bottom: 10px;
        margin-left: 5px;
        margin-right: 5px;
      }

  }
  @media only screen and (min-width:767px) {
    .content{
      margin-top: 20px;
    }
  }

  /*.slideanim {visibility:hidden;}
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
  }*/

  </style>

  <body id="myPage" data-spy="scroll" data-target=".navbar" data-offset="60">
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
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#moodChart">Mood Chart</a></li>
                    <li><a href="#activities">Activities</a></li>
                    <li><a href="#science">Studies</a></li>
                    <li><a href="#faq">FAQ</a></li>
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
          <div class="col col-sm-6 left-content">
            <img src="resources/LogoChatPNG.png" class="img-responsive" alt="Hady Logo" id="headerLogo">
          </div>

        </div>
      </div><!--HEADER END-->

          <!--FEATURES-->

      <div class="containerFeatures" id="features">
        <div class="container">
          <div class="row">
            <center>
              <h2 id="typedFeatures" class="typed"></h2>
              <span class="titleLine"></span>
            </center>
            <div class="col-md-4">
              <ul class="list-group" id="lg1">
                <li class="list-group-item" style="border: 0 none">
                  <h3>Track Your Mood</h3>
                  <i class="fa fa-bar-chart fa-4x fa-pull-right slideanim-left"></i>
                  <p>Each week I’ll show you how your mood changes on a graph so you can see what is your progress.</p>
                </li>
                <li class="list-group-item" style="border: 0 none">
                  <h3>Help you feel better</h3>
                  <i class="fa fa-thumbs-o-up fa-4x fa-pull-right slideanim-left"></i>
                  <p>I will always make sure that you will feel better everytime you talk to me.</p>
                </li>
                <li class="list-group-item" style="border: 0 none">
                  <h3>Always there 24/7</h3>
                  <i class="fa fa-clock-o fa-4x fa-pull-right slideanim-left"></i>
                  <p>I don’t actually sleep ever so I'm always here whenever you need me.</p>
                </li>
              </ul>
            </div>
            <div class="col-md-4"><img class="sampleApp img-responsive" src="resources\SampleAppPSD.png" alt="Sample of AICCo."></div>
            <div class="col-md-4">
              <ul class="list-group" id="lg2">
                <li class="list-group-item" style="border: 0 none">
                  <h3 style="margin-left:50px">Very Responsive</h3>
                  <i class="fa fa-tablet fa-4x fa-pull-left slideanim-right"></i>
                  <p>Do you have multiple devices? No worries because you can access me on any device (desktops, tablets, and phones). </p>
                </li>
                <li class="list-group-item" style="border: 0 none">
                  <h3 style="margin-left:70px">Gives Activities</h3>
                  <i class="fa fa-files-o fa-4x fa-pull-left slideanim-right"></i>
                  <p>I will also give you activities that can help you throughout your sessions. </p>
                </li>
                <li class="list-group-item" style="border: 0 none">
                  <h3 style="margin-left:80px">Teach you stuff</h3>
                  <i class="fa fa-heart-o fa-4x fa-pull-left slideanim-right"></i>
                  <p>I’ve got lots of techniques from Cognitive Behavioral Therapy that I can share with you.</p>
                </li>
              </ul>
            </div>

          </div><!--row-->
        </div> <!--container-->
      </div><!--features end-->

      <div class="containerMood" id="moodChart">
        <div class="container">
          <div class="row">
            <center>
              <h2 id="typedMood" class="typed"></h2>
              <span class="titleLine"></span>
            </center>

            <div class="col-md-6 left-content">
              <img src="resources/Mood.png" class="img-responsive" alt="Mood Chart" id="screenshotMood">
            </div>
            <div class="col-md-6 right-content">
              <h3>Track your Mood with Hady's Mood Chart</h3>
              <p>
                When it comes to personal well-being, one’s mood plays an important role in determining
                energy levels, where the attention is focused, and the actions taken.
              </p>
              <br><br>
              <p>
                <b>Hady's mood chart</b> is a type of journal or diary used to track fluctuations in your
                moods and anxiety levels over time. We will provide an interactive tool for you to
                track your mood in a <i>daily</i> or <i>weekly</i> view. The information also can be use to help you
                and your mental health provider in further understanding patterns in your mood, and other symptoms.
              </p>
            </div>
          </div><!--row-->
        </div><!--container-->
      </div><!--mood chart-->

      <div class="containerActivities" id="activities">
        <div class="container">
          <div class="row">
            <center>
              <h2 id="typedActivities" class="typed"></h2>
              <span class="titleLine"></span>
            </center>

            <div class="col-md-6 left-content">
              <h3>Be Relieve with Hady's Mental Health Actitivities</h3>
              <p>
                We all feel low sometimes - sadness and suffering are a normal part of life.
                It is normal to feel sad if we get bad news, or if we lose something or someone.
                However, sometimes we feel empty for no reason if we are just doing nothing.
              </p>
              <p>
                With the help of <b>Hady</b>, we will provide different mental health activities just for you.
                These activities are focused on the following:
              </p>
              <ul class="list-group">
                <li class="list-group-item" style="border: 0 none">
                  <i class="fa fa-caret-right fa-2x fa-pull-left"></i>
                  <p>Comforting</p>
                </li>
                <li class="list-group-item" style="border: 0 none">
                  <i class="fa fa-caret-right fa-2x fa-pull-left"></i>
                  <p>Distracting</p>
                </li>
                <li class="list-group-item" style="border: 0 none">
                  <i class="fa fa-caret-right fa-2x fa-pull-left"></i>
                  <p>Expressing Yourself</p>
                </li>
                <li class="list-group-item" style="border: 0 none">
                  <i class="fa fa-caret-right fa-2x fa-pull-left"></i>
                  <p>Releasing</p>
                </li>
                <li class="list-group-item" style="border: 0 none">
                  <i class="fa fa-caret-right fa-2x fa-pull-left"></i>
                  <p>Breathing</p>
                </li>
              </ul>
              <br>
              <p>
                We want to keep your mind healthy. Good mental health helps you
                enjoy life and cope with problems. It offers a feeling of well-being and inner strength.
              </p>
            </div>

            <div class="col-md-6 right-content">
              <img src="resources/Activities.png" class="img-responsive" alt="Mental Health Activities" id="screenshotActivities">
            </div>
          </div><!--row-->
        </div><!--container-->
      </div><!--activities end-->

      <div class="containerScience" id="science">
        <div class="container">
          <div id="myCarousel" class="carousel slide carousel-fade" data-ride="carousel">
            <!-- Indicators -->
            <ol class="carousel-indicators">
              <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
              <li data-target="#myCarousel" data-slide-to="1"></li>
              <li data-target="#myCarousel" data-slide-to="2"></li>
            </ol>

            <!-- Wrapper for slides -->
            <div class="carousel-inner">
              <div class="item active">
                <img src="resources/landscape-1500062475-cognitive-behavioral-therapy.jpg" alt="Cognitive Behavioral Therapy" style="width:100%;">
                <div class="overlay"></div>
                 <div class="carousel-caption">
                     <h3 id="science1">Cognitive Behavioral Therapy</h3>
                     <p id="science1a">CBT is one of the cognitive strategies or techniques that aim to test
                       and portray the negative thoughts of a patient. This technique is developed
                       to teach the patient how to monitor their thoughts, to know the connections
                       between cognition and behavior, to examine the evidence of the distorted behavior,
                       to alter dysfunctional beliefs and to give more reality-based interpretations instead of biased cognition
                       <a href="#"><sup>[1]</sup></a>.
                     </p>
                 </div>
              </div>

              <div class="item">
                <img src="resources/phone_in_hand.jpg" alt="CCBT" style="width:100%;">
                <div class="overlay"></div>
                 <div class="carousel-caption">
                     <h3 id="science2">Computerized CBT</h3>
                     <p id="science2a">
                       Previous study about web-based intervention programs for depression
                       show that the use of web-based psychotherapy can break language barriers,
                       reducing the cost and overcome the limitation of traditional one-on-one counselling
                       <a href="#"><sup>[2]</sup></a>.
                       Computerized-cognitive behavioral therapy approach is more time-efficient and more
                       effective than the usual treatment of face-to-face counselling<a href="#"><sup>[3]</sup></a>.
                     </p>
                 </div>
              </div>

              <div class="item">
                <img src="resources/0_M_bgVlN0kdww9Evy.png" alt="Sunset" style="width:100%;">
                <div class="overlay"></div>
                 <div class="carousel-caption">
                     <h3 id="science3">Chatbots</h3>
                     <p id="science3a">
                       A chatbot is a software which makes use of artificial intelligence to imitate human communication<a href="#"><sup>[4]</sup></a>.
                       Nowadays, chatbots are being utilized as a means of providing relevant
                       information<a href="#"><sup>[5]</sup></a>. Through the use of chatbots,
                       persons with mental health issues who are frightened to seek medical personnel
                       can relay their insights through texts<a href="#"><sup>[6]</sup></a>.
                       However, designing computer systems to artificially take care of people, through listening,
                       empathizing, and being pleased, isn't always regarded as an alternative for human care but as a useful resource<a href="#"><sup>[7]</sup></a>.
                     </p>
                 </div>
              </div>
            </div>

            <!-- Left and right controls -->
            <a class="left carousel-control" href="#myCarousel" data-slide="prev">
              <span class="glyphicon glyphicon-chevron-left"></span>
              <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#myCarousel" data-slide="next">
              <span class="glyphicon glyphicon-chevron-right"></span>
              <span class="sr-only">Next</span>
            </a>
          </div><!--carousel-->
        </div><!--container-->
      </div><!--science end-->

      <div class="containerFaq" id="faq">
        <div class="container">
          <div class="row">
            <center>
              <h2 id="typedFaq" class="typed"></h2>
              <span class="titleLine"></span>
            </center>

            <div class="col-md-6 left-content">
              <div class="panel-group" id="accordion">
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>What/Who is Hady?</a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>How does Hady work?</a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>Who's it for?</a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>How long can I use it?</a>
                    </h4>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>Are you trying to replace therapist?</a>
                    </h4>
                  </div>
                  <div id="collapse5" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                  </div>
                </div>
              </div><!--accordian1-->
            </div><!--col left content-->
            <div class="col-md-6 right-content panel-transparent">
              <div class="panel-group" id="accordion">
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse1"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>Is Hady free to use?</a>
                    </h4>
                  </div>
                  <div id="collapse1" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>Can I contact a real Psychologist/Counsellor using Hady?</a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>Can other people see that I'm using Hady or What I'm saying?</a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>Who can see my personal data?</a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>Does Hady speak another languages other than English?</a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">Lorem ipsum dolor sit amet, consectetur adipisicing elit,
                    sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
                    quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</div>
                  </div>
                </div>
              </div><!--accordion-->
          </div><!--col right content-->
          </div><!--row-->
        </div><!--container-->
      </div><!--mood chart-->


        <!--FOOTER-->
      <div class="container" id="footer">
        <div class="row">
          <div class="col-md-4">
            <h3>Connect With Us</h3>
            <ul class="list-group">
              <li class="list-group-item" style="border: 0 none;">
                <i class='fa fa-phone fa-lg fa-pull-left'></i>
                <p style="margin-bottom:0;">+63 9975683458</p>
              </li>
              <li class="list-group-item" style="border: 0 none;">
                <i class='fa fa-envelope fa-lg fa-pull-left'></i>
                <a href="mailto:hadysupport@gmail.com">hadysupport@gmail.com</a>
              </li>
              <li class="list-group-item" style="border: 0 none;">
                <i class='fa fa-map-marker fa-lg fa-pull-left'></i>
                <p> 2219 C. M. Recto Avenue, Barangay 404, Zone 41, Sampaloc 1008 Manila, Philippines</p>
              </li>
            </ul>
            <a href="https://twitter.com/?lang=en" class="socialMedia"><i class='fa fa-twitter fa-2x'></i></a>
            <a href="https://www.facebook.com/" class="socialMedia"><i class='fa fa-facebook fa-2x'></i></a>
            <a href="https://plus.google.com" class="socialMedia"><i class='fa fa-google-plus fa-2x'></i></a>
          </div>
          <div class="col-md-4">
            <h3>Get Started</h3>
            <ul class="list-group">
              <li class="list-group-item" style="border: 0 none;">
                <a href="sign_in.php">Sign In</a>
              </li>
              <li class="list-group-item" style="border: 0 none;">
                <a href="sign_up.php">Sign Up</a>
              </li>
            </ul>
            <h3>Legal</h3>
            <ul class="list-group">
              <li class="list-group-item" style="border: 0 none;">
                <a href="#" id="termsConditions">Terms and Conditions</a>
              </li>
            </ul>
          </div>
          <div class="col-md-4">
            <h3>Menu</h3>
            <ul class="list-group">
              <li class="list-group-item" style="border: 0 none;"><a href="index.php">Home</a></li>
              <li class="list-group-item" style="border: 0 none;"><a href="#moodChart">Mood Chart</a></li>
              <li class="list-group-item" style="border: 0 none;"><a href="#activities">Activities</a></li>
              <li class="list-group-item" style="border: 0 none;"><a href="#science">Studies</a></li>
              <li class="list-group-item" style="border: 0 none;"><a href="#faq">FAQ</a></li>
            <ul>
          </div>
        </div>
        <div class="row" id="below">
          <center>
            <p><i>Hady is not a substitute for professional treatment.<i></p>
            <p><i class='fa fa-copyright fa-md'></i>Hady 2018. All Rights Reserved.</p>
          </center>
        </div>
      </div>



    </div> <!--content-->







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

        // Add smooth scrolling to all links in navbar + footer link
        $(".navbar a, footer a[href='#myPage']").on('click', function(event) {
          // Make sure this.hash has a value before overriding default behavior
          if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (900) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 900, function(){

              // Add hash (#) to URL when done scrolling (default click behavior)
              window.location.hash = hash;
            });
          } // End if
        });

        $('#myCarousel').carousel({
          pause: true,
          interval: false
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

        var type2 = new Typed('#typedMood',{
          strings:["MOOD CHART"],
          typeSpeed:60,
          backSpeed:40,
          backDelay:2500,
          loop:true
        });

        var type3 = new Typed('#typedActivities',{
          strings:["ACTIVITIES"],
          typeSpeed:60,
          backSpeed:40,
          backDelay:2500,
          loop:true
        });

        var type4 = new Typed('#typedFaq',{
          strings:["FAQs"],
          typeSpeed:60,
          backSpeed:40,
          backDelay:2500,
          loop:true
        });


        window.sr = ScrollReveal();
        sr.reveal('.navbar',{
          duration: 2000,
          origin:'bottom'
        });
        sr.reveal('#headerLogo',{
          duration: 2000,
          origin: 'bottom'
        });
        sr.reveal('.slideanim-left',{
          duration: 2000,
          origin: 'right',
          distance: '300px'
        });
        sr.reveal('.slideanim-right',{
          duration: 2000,
          origin: 'left',
          distance: '200px'
        });
        sr.reveal('#screenshotMood',{
          duration: 2000,
          origin: 'top',
          distance: '300px'
        });
        sr.reveal('#screenshotActivities',{
          duration: 2000,
          origin: 'right',
          distance: '200px'
        });
        sr.reveal('#science1',{
          duration: 2000,
          origin: 'bottom',
          distance: '200px'
        });
        sr.reveal('#science1a',{
          duration: 2000,
          delay: 1000,
          origin: 'bottom',
          distance: '200px'
        });
        $("#myCarousel").on('slide.bs.carousel', function () {
          sr.reveal('#science2',{
            duration: 2000,
            origin: 'bottom',
            distance: '200px'
          });
          sr.reveal('#science2a',{
            duration: 2000,
            delay: 1000,
            origin: 'bottom',
            distance: '200px'
          });
          sr.reveal('#science3',{
            duration: 2000,
            origin: 'bottom',
            distance: '200px'
          });
          sr.reveal('#science3a',{
            duration: 2000,
            delay: 1000,
            origin: 'bottom',
            distance: '200px'
          });
        });

        sr.reveal('.panel-heading',{
          duration: 2000,
          origin: 'bottom',
          distance: '200px'
        });
        sr.reveal('.more-less',{
          duration: 2000,
          delay: 1000,
          origin: 'top',
          distance: '300px'
        });
        sr.reveal('#footer .fa-twitter',{
          duration: 2000,
          origin: 'right',
          distance: '300px'
        });
        sr.reveal('#footer .fa-facebook',{
          duration: 2000,
          origin: 'bottom',
          distance: '300px'
        });
        sr.reveal('#footer .fa-google-plus',{
          duration: 2000,
          origin: 'left',
          distance: '300px'
        });

        $("#signIn-btn").click(function(){
          window.location.assign("sign_in.php");
        });

        function toggleIcon(e) {
            $(e.target)
                .prev('.panel-heading')
                .find(".more-less")
                .toggleClass('fa-plus-circle fa-minus-circle');
        }
        $('.panel-group').on('hidden.bs.collapse', toggleIcon);
        $('.panel-group').on('shown.bs.collapse', toggleIcon);

        $("#termsConditions").click(function(){
          bootbox.alert({
            size: "large",
            title: "<b>Terms and Conditions</b>",
            message: "Data Privacy Act of 2012.....",
            callback: function(){ /* your callback code */ }
          });
        });

      }); //ready function end
    </script>

  </body>
</html>
