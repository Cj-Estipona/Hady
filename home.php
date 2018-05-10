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
    background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6));
    transition: all ease .5s;
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
        background: linear-gradient(rgba(0, 0, 0, 0.6), rgba(0, 0, 0, 0.6));
        transition: all ease .5s;
      }

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
  .content{
    background-color: #ffffff;
  }
  @media only screen and (min-width:767px) {
    .content{
      margin-top: 20px;
    }
  }
  </style>

  <body>
      <!--Navigation Bar-->
    <nav class="navbar navbar-default navbar-fixed-top" id="nav" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle toggle-button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">
                    <img src="resources/LogoNamePNG.png" alt="">
                </a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Activities</a></li>
                    <li><a href="#">Mood Chart</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><button class="btn navbar-btn">Sign In</button></li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

      <!--End Navigation Bar-->

    <div class="container content">

      <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean nec quam et augue facilisis sollicitudin eget ut risus. Vestibulum eu fermentum dolor. Nam at posuere felis. Integer varius nulla quam, id pretium lacus pulvinar sit amet. Mauris turpis purus, consequat sed justo a, blandit interdum tellus. In facilisis semper enim, vitae semper purus laoreet consectetur. Nullam bibendum diam eget felis tristique venenatis. Donec sodales nisl elit, et mattis odio fermentum venenatis.</p>
    </div>

    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/><br/>
    <p>Testing 1 2</p>


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
      });
    </script>

  </body>
</html>
