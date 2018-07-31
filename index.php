<!DOCTYPE html>
<html>
  <head>
    <title>Hady - Home</title>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <link rel="icon" type="image/png" href="resources/iconLogo.png" >
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
    <link rel="stylesheet" href="css/indexCSS.css">
    <!--<script>
    <src="https://code.jquery.com/jquery-3.3.1.min.js"
    integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
    crossorigin="anonymous"></script>-->
  </head>

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
            <img src="resources/1530340779585_COUNSELOR CLIEN.png" class="img-responsive" alt="Hady Logo" id="headerLogo">
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
                    <div class="panel-body">Hady is a chatbot and at the same time a self help tool application that will assist you whenever you are feeling down. Hady will guide you on how to reframe your negative thinking patterns into positive thoughts.</div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse2"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>How does Hady work?</a>
                    </h4>
                  </div>
                  <div id="collapse2" class="panel-collapse collapse">
                    <div class="panel-body">Hady will use Cognitive Behavioral Therapy technique to help you to alter you negative thoughts into a positive one. She will also make use of the PHQ-9 for a better diagnostic that will help you and the Guidance Counselor. </div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse3"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>Who's it for?</a>
                    </h4>
                  </div>
                  <div id="collapse3" class="panel-collapse collapse">
                    <div class="panel-body">Hady is for everyone and not only for people with mental health problems. You can use Hady to unwind and free yourself from stress.</div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse4"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>How long can I use it?</a>
                    </h4>
                  </div>
                  <div id="collapse4" class="panel-collapse collapse">
                    <div class="panel-body">You can use Hady for as long as you want because Hady offers variety of activities that you can use anytime and journalling that will keep track of your day.</div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion" href="#collapse5"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>Are you trying to replace therapist?</a>
                    </h4>
                  </div>
                  <div id="collapse5" class="panel-collapse collapse">
                    <div class="panel-body">No! Hady is not a replacement to the professionals it is only a self help tool that you can use whenever you cannot go to a real counselor.</div>
                  </div>
                </div>
              </div><!--accordian1-->
            </div><!--col left content-->
            <div class="col-md-6 right-content">
              <div class="panel-group" id="accordion2">
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion2" href="#collapse6"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>Is Hady free to use?</a>
                    </h4>
                  </div>
                  <div id="collapse6" class="panel-collapse collapse">
                    <div class="panel-body">Definetely Yes! Hady is free and available all the time just for you.</div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion2" href="#collapse7"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>Can I contact a real Psychologist/Counsellor using Hady?</a>
                    </h4>
                  </div>
                  <div id="collapse7" class="panel-collapse collapse">
                    <div class="panel-body">Yes, there are list of registered psychologist that you can see in the contact address page of the application.</div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion2" href="#collapse8"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>Can other people see that I'm using Hady or What I'm saying?</a>
                    </h4>
                  </div>
                  <div id="collapse8" class="panel-collapse collapse">
                    <div class="panel-body">Only you can see what you're saying during your conversation with Hady.</div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion2" href="#collapse9"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>Who can see my personal data?</a>
                    </h4>
                  </div>
                  <div id="collapse9" class="panel-collapse collapse">
                    <div class="panel-body">Because we value your privacy, only when you give your approval that's the time when the guidance counselor can see your personal data (chat, moods, journal and preference). However, your basic personal information (name, birthdate, email, course, etc., ) can be seen by your guidance counselor.<i>*Please refer to our Terms and Conditions.</i></div>
                  </div>
                </div>
                <div class="panel panel-default panel-transparent">
                  <div class="panel-heading">
                    <h4 class="panel-title">
                      <a data-toggle="collapse" data-parent="#accordion2" href="#collapse10"><i class='more-less fa fa-plus-circle fa-lg fa-pull-left'></i>Does Hady speak another languages other than English?</a>
                    </h4>
                  </div>
                  <div id="collapse10" class="panel-collapse collapse">
                    <div class="panel-body">As of now Hady can only understand the English language but we're trying our best to make Hady understand other languages especially Tagalog.</div>
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
                <p style="margin-bottom:0;">+63 9975683459</p>
              </li>
              <li class="list-group-item" style="border: 0 none;">
                <i class='fa fa-envelope fa-lg fa-pull-left'></i>
                <a href="mailto:hadysupport@gmail.com">counselorhady@gmail.com</a>
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
        /*sr.reveal('#footer .fa-twitter',{
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
        });*/

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
