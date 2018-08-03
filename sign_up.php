<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="icon" href="resources/iconLogo.png">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/bootstrap-theme.min.css">
  <link rel="stylesheet" href="font-awesome-4.7.0\font-awesome-4.7.0\css\font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
  <script src="js/jquery.min.js"></script>
  <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>-->
  <script src="js/bootstrap.min.js"></script>
  <script src="js/bootbox.min.js"></script>
  <title>Hady - Sign Up</title>
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
  .btnReg{
    width: 50%;
  }
  .wholeForm{
    margin-top: 20px;
    font-family: 'Ubuntu', sans-serif;
  }
  #signUpTitle{
    color: #54a7a6;
  }
  hr{
    background-color: #51B47B;
    height: 1px;
    border: 0;
  }
  .panel{
      border: 0 none !important;
  }
  .panel-heading{
    font-size: 20px;
    background: #54a7a6 !important;
    color: #f0f0f0 !important;
  }
  .error_message{
    display: none;
    color: red;
    font-family: 'Ubuntu', sans-serif;
  }
  #image_data{
    width: inherit;
  }
  .avatarImage{
    margin-bottom: 10px;
  }
  .avatarForms{
    padding-left: inherit;
  }
  .btnAvatar{
    background-color: #51B47B !important;
    border-color: #51B47B !important;
    color: #ffffff;
    margin-bottom: 5px;
  }
  .btnAvatar:hover{
    background-color: #56BE9F !important;
    border-color: #56BE9F !important;
    color: #ffffff;
  }



</style>

<!--modal for the avatars-->
<div id="imageModal" class="modal fade" role="dialog">
 <div class="modal-dialog">
  <div class="modal-content">
   <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal">&times;</button>
    <h4 class="modal-title"><b>Select your Avatar</b></h4>
   </div>
   <div class="modal-body">
    <!--<form id="image_form" method="post" enctype="multipart/form-data">
     <p><label>Select Image</label>
     <input type="file" name="image" id="image" /></p><br />
     <input type="hidden" name="action" id="action" value="insert" />
     <input type="hidden" name="image_id" id="image_id" />
     <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-info" />

   </form>-->
     <div id="image_data" class="container">
       <div class="avatarContainer">
         <div class="row">
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/753631_character_512x512.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018001)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/813782_people_512x512.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018002)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/813784_people_512x512.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018003)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/825219_people_512x512.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018004)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/Astronaut_Character-256.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018005)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/825154_knight_512x512.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018006)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/people_character_avatar_smile_glyph_2-04-256.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018007)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/avatar_beanie_girl-256.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018008)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/cat.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018009)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/fire.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018010)"</center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/flower.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018011)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/hat.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018012)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/hold.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018013)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/meteor.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018014)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/moon.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018015)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/music.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018016)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/paw.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018017)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/queen.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018018)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/sun.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018019)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/fox.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018020)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/hamster.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018021)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/owl.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018022)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/panda.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018023)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/man1.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018024)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/woman1.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018025)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/man2.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018026)"></center>
           </div>
           <div class="col-sm-2 col-xs-3">
             <center><img src="avatars/woman2.png" height="60px" width="60px" class="avatarImage" onclick="fetchAvatarID(2018027)"></center>
           </div>
         </div>
       </div>
     </div>
   </div>
   <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
   </div>
  </div>
 </div>
</div>

<body>
  <div class="carousel slide carousel-fade" data-ride="carousel">
  <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">
      <div class="item active"></div>
      <div class="item"></div>
      <div class="item"></div>
      <div class="item"></div>
      <div class="item"></div>
    </div>
  </div>

  <div class="container wholeForm">
    <h2 id="signUpTitle">Create Your Account</h2>
    <hr>
    <form action="" method="POST" id="signUpForm">
      <div class="form-row">
        <div class="col-md-6">
          <div class="panel panel-info">
            <div class="panel-heading">Personal Information</div>
            <div class="panel-body">
              <div class="form-group" id="FName-error">
                <label for="firstname">First Name:</label>
                <input type="text" class="form-control" id="FName" name="FName" placeholder="Enter First Name">
                <span id="FName-span_error"></span>
                <span id="FName-error_message" class="error_message"></span>
              </div>
              <div class="form-group" id="MName-error">
                <label for="Middle Name">Middle Name:</label>
                <input type="text" class="form-control" id="MName" name="MName" placeholder="Enter Middle Name">
                <span id="MName-span_error"></span>
                <span id="MName-error_message" class="error_message"></span>
              </div>
              <div class="form-group" id="LName-error">
                <label for="Last Name">Last Name:</label>
                <input type="text" class="form-control" id="LName" name="LName" placeholder="Enter Last Name">
                <span id="LName-span_error"></span>
                <span id="LName-error_message" class="error_message"></span>
              </div>
              <div class="form-group" id="BDate-error">
                <label for="Birthdate">Birthdate:</label>
                <input type="date" class="form-control" id="BDate" name="BDate">
                <span id="BDate-span_error"></span>
                <span id="BDate-error_message" class="error_message"></span>
              </div>
              <div class="form-group" id="MNumber-error">
                <label for="Mobile Number">Mobile Number:</label>
                <input type="tel" class="form-control" id="MNumber" name="MNumber" maxlength="11" placeholder="Enter Mobile Number (Format:09XXXXXXXXX)">
                <span id="MNumber-span_error"></span>
                <span id="MNumber-error_message" class="error_message"></span>
              </div>
              <div class="form-group" id="optradio-error">
                <label for="Gender">Gender:</label>
                <div class="row">
                  <div class="form-check form-check-inline col-sm-4">
                  <!--  <input class="form-check-input" type="radio" name="optradio" id="optradio" value="Male">Male
                    <label class="form-check-label" for="Male">Male</label>-->
                    <label class="radio-inline">
                      <input checked type="radio" name="optradio" id="optradio1" value="Male">Male
                    </label>
                  </div>
                  <div class="form-check form-check-inline col-sm-4">
                    <!--<input class="form-check-input" type="radio" name="optradio" id="optradio" value="Female">Female
                    <label class="form-check-label" for="Female">Female</label>-->
                    <label class="radio-inline">
                      <input type="radio" name="optradio" id="optradio2" value="Female">Female
                    </label>
                  </div>
                  <span id="optradio-span_error"></span>
                </div>
              </div>
              <div class="col-md-6" style="padding-left:0px;">
                <div class="form-group" id="college-error">
                  <label for="College">College:</label>
                    <select class="form-control" id="college" name="college">
                      <option value="CCSS">CCSS</option>
                      <option value="CAS">CAS</option>
                      <option value="CBA">CBA</option>
                      <option value="CEng">CEng</option>
                      <option value="CEduc">CEduc</option>
                      <option value="CDent">CDent</option>
                    </select>
                    <span id="college-span_error"></span>
                </div>
              </div>
              <div class="col-md-6" style="padding-right:0px;">
                <div class="form-group" id="course-error">
                  <label for="Course">Course:</label>
                    <select class="form-control" id="course" name="course">
                    </select>
                    <span id="course-span_error"></span>
                </div>
              </div>


            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="panel panel-info">
            <div class="panel-heading">Account Confirmation</div>
            <div class="panel-body">
              <div class="form-group" id="email-error">
                <label for="Email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Enter Email Address">
                <span id="email-span_error"></span>
                <span id="email-error_message" class="error_message"></span>
              </div>
              <div class="form-group" id="password-error">
                <label for="Password">Password:</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
                <span id="password-span_error"></span>
                <span id="password-error_message" class="error_message"></span>
              </div>
              <div class="form-group" id="confirmPass-error">
                <label for="Confirm Password">Confirm Password:</label>
                <input type="password" class="form-control" id="confirmPass" name="confirmPass" placeholder="Confirm Password">
                <span id="confirmPass-span_error"></span>
                <span id="confirmPass-error_message" class="error_message"></span>
              </div>
              <div class="checkbox">
                <label><input type="checkbox" value="Show Password" name="showPassword" id="showPassword">Show Password</label>
              </div>
              <br>

              <div class="row avatarForms">
                <input type="button" class="btnAvatar col-sm-4 btn btn-md" id="btnavatar" value="Select an avatar">
                <div class="col-sm-8 disabledinput">
                  <input class="form-control" id="disabledInput" name="disabledInput" type="text" placeholder="Select your avatar.." value"" readonly>
                </div>
              </div>
              <br>
              <div class="form-group" id="optAllow-error">
                <label for="Gender">Allow guidance counsellor to view your log data (Mood Levels and Journals)</label>
                <div class="row">
                  <div class="form-check form-check-inline col-sm-4">
                    <label class="radio-inline">
                      <input checked type="radio" name="optAllow" id="optAllow1" value=1>Yes
                    </label>
                  </div>
                  <div class="form-check form-check-inline col-sm-4">
                    <label class="radio-inline">
                      <input type="radio" name="optAllow" id="optAllow2" value=0>No
                    </label>
                  </div>
                  <span id="optAllow-span_error"></span>
                </div>
              </div>

              <div class="checkbox">
                <label><input type="checkbox" value="Agreement" name="agreement" id="agreement" disabled>I accept the <a href="#" id="acceptAgreement">terms and conditions.</a> </label>
              </div>
              <center>
                <input type="button" class="btnReg btn btn-warning btn-lg" id="btnregister" value="Register">
              </center>
            </div>
          </div>
        </div>
      </div>
    </form>
  </div>



  <script>
    var FName, MName, LName, BDate, MNumber, gender, course, email, emailCheck, emailString, password, confirmPass, inputLen, passShow, boolCheck=true;
    var errFName, errMName, errLName, errBDate, errMNumber, errEmail, errPassword, errConfirmPass, hasInputErr, hasAvatar=false, checkClick=false;
    var today = new Date();
    var yyyy = today.getFullYear();
    var hasNumber = /\d/;


    function getID(x){
      return document.getElementById(x);
    }

    function validateInput(inputID){
      if($("#"+inputID).val() == null || $("#"+inputID).val() == "" || $("#"+inputID).val().length <= 1 ){
        addError(inputID);
        hasInputErr = true;
        return false;
      }
      else {
        if(inputID=="email" && boolCheck==false){
          addError(inputID);
          return false;
        }
        removeError(inputID);
        hasInputErr = false;
        return true;
      }

    }

    function addError(inputID){
      var div = $("#"+inputID+"-error");
      var span = $("#"+inputID+"-span_error");
      div.addClass("has-error");
      div.addClass("has-feedback");
      span.addClass("glyphicon");
      span.addClass("glyphicon-remove");
      span.addClass("form-control-feedback");
    }

    function removeError(elementActive){
      var div = $("#"+elementActive+"-error");
      var span = $("#"+elementActive+"-span_error");
      div.removeClass("has-error");
      div.removeClass("has-feedback");
      span.removeClass("glyphicon");
      span.removeClass("glyphicon-remove");
      span.removeClass("form-control-feedback");
    }

    function validateEmail(email) {
      var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
      return re.test(email);
    }

    function fetch_data()
     {
      var action = "fetch";
      $.ajax({
       url:"select_avatar.php",
       method:"POST",
       data:{action:action},
       success:function(data)
       {
        $('#image_data').html(data);
       }
      })
     }

    function fetchAvatarID(data){
      //console.log(data);
      $("#disabledInput").val(data);
      hasAvatar = true;
      $('#imageModal').modal('hide');
      //bootbox.alert("You selected " + avaID);
    }

    function resetForm($form){
      $form.find('input:text, input:password, input[type=email], input[type=date]').val("");
      $form.find('input[type=date]').val("mm/dd/yyyy");
    }

    function runCourses(){
      collegeVal = $('#college').val();
      $.ajax({
        method: 'POST',
        url: 'validator_courses.php',
        data: {keywordCollege: collegeVal},
        dataType: 'json',
        success: function(response){
          if (response.success) {
            //console.log("Successful Course");
            var optionsAsString = "";
            for(var i = 0; i < response.output.length; i++) {
                optionsAsString += "<option value='" + response.output[i] + "'>" + response.output[i] + "</option>";
            }
            $('select[name="course"]').append( optionsAsString );
          }
        }
      });
    }


    $(document).ready(function(){
      runCourses();
      $( "#college" ).change(function() {
        runCourses();
        $('select[name="course"]').children('option').remove();
      });

      //button register
      $("#btnregister").click(function(){
        FName = getID("FName").value;
        MName = getID("MName").value;
        LName = getID("LName").value;
        BDate = getID("BDate").value;
        MNumber = getID("MNumber").value;
        //gender = getID("optradio").value;
        course = getID("course").value;
        email = getID("email").value;
        password = getID("password").value;
        confirmPass = getID("confirmPass").value;

        validateInput("FName");
        validateInput("MName");
        validateInput("LName");
        validateInput("BDate");
        validateInput("MNumber");
        //validateInput("optradio");
        validateInput("email");
        validateInput("password");
        validateInput("confirmPass");

        if(!getID("BDate").value){
          $("#BDate-error_message").html("Please enter your birthdate");
          $("#BDate-error_message").show();
          addError("BDate");
          errBDate = true;
        }

        if(errFName || errMName || errLName || errBDate || errMNumber || errEmail || errPassword || errConfirmPass || hasInputErr || !hasAvatar){
          var dialog = bootbox.dialog({
              title: '<b>Reminders</b>',
              message: '<p class="text-center" style="color:red;">Please complete all the fields.</p><p class="text-center" style="color:red;">Enter valid data.</p><p class="text-center" style="color:red;">Please select an avatar.</p><p class="text-center" style="color:red;">Read and Accept our terms and conditions.</p>',
              closeButton: true
          });
        }else if(!$('#agreement').is(":checked") || !checkClick) {
          bootbox.alert("You need to read and accept the terms and conditions to continue. ");
        }else {
          var dataForm = $('#signUpForm').serialize();
          console.log(dataForm);
          $.ajax({
            type: 'POST',
            url: 'validator_signup.php',
            data: dataForm,
            dataType: 'json',
            success: function(response){
              console.log(response.query1);
              console.log(response.query2);
              console.log(response.query3);
              if(response.query1 && response.query2 && response.query3){
                //bootbox.alert("You are now registered!");
                bootbox.alert({
                    title: "<b>Registration</b>",
                    message: "You are now registered!",
                    callback: function () {
                        //console.log('This was logged in the callback: ');
                        resetForm($("#signUpForm"));
                        window.location.replace("sign_in.php");
                    }
                });
              }
            }
          });

        }
      });

      //Validation Focus Out
      $("#FName").focusout(function(){
        if(getID("FName").value.length <= 1 || hasNumber.test(getID("FName").value)==true){
          $("#FName-error_message").html("Please enter a valid name");
          $("#FName-error_message").show();
          addError("FName");
          errFName = true;
        }
        else {
          $("#FName-error_message").hide();
          removeError("FName");
          errFName = false;
        }
      });

      $("#MName").focusout(function(){
        if(getID("MName").value.length <= 1){
          $("#MName-error_message").html("Please enter a valid middle name");
          $("#MName-error_message").show();
          addError("MName");
          errMName = true;
        }
        else {
          $("#MName-error_message").hide();
          removeError("MName");
          errMName = false;
        }
      });

      $("#LName").focusout(function(){
        if(getID("LName").value.length <= 1){
          $("#LName-error_message").html("Please enter a valid last name");
          $("#LName-error_message").show();
          addError("LName");
          errLName = true;
        }
        else {
          $("#LName-error_message").hide();
          removeError("LName");
          errLName = false;
        }
      });

      $("#BDate").focusout(function(){
        if(parseInt(getID("BDate").value.substring(0,4)) > parseInt(yyyy)-15){
          $("#BDate-error_message").html("You must be 15 years old or above");
          $("#BDate-error_message").show();
          addError("BDate");
          errBDate = true;
          console.log(getID("BDate").value);
        } else {
          $("#BDate-error_message").hide();
          removeError("BDate");
          errBDate = false;
        }
      });

      $("#MNumber").focusout(function(){
        if(getID("MNumber").value.length < 11 || isNaN(getID("MNumber").value) ){
          $("#MNumber-error_message").html("Please enter a valid mobile number");
          $("#MNumber-error_message").show();
          addError("MNumber");
          errMNumber = true;
        }
        else {
          $("#MNumber-error_message").hide();
          removeError("MNumber");
          errMNumber = false;
        }
      });

      $("#email").focusout(function(){
        if(validateEmail(getID("email").value)==false){
          $("#email-error_message").html("Please enter a valid email address");
          $("#email-error_message").show();
          addError("email");
          boolCheck = false;
          errEmail = true;
        }
        else if(emailString == "Email already taken") {
          addError("email");
          boolCheck = false;
          errEmail = true;
        }
        else {
          $("#email-error_message").hide();
          removeError("email");
          boolCheck = true;
          errEmail = false;
        }
      });
      $("#email").keyup(function(e){
        e.preventDefault();
        emailCheck = $(this).val();
        $.ajax({
    			method: 'POST',
    			url: 'validator_email.php',
    			data: {keywordEmail: emailCheck},
    			dataType: 'json',
    			success: function(response){
            console.log(response);
    				$('#email-error_message').show().html(response);
            emailString = response;
    			}
    		});
      });

      $("#password").focusout(function(){
        if(getID("password").value.length <= 5 ){
          $("#password-error_message").html("Please enter more than 5 characters.");
          $("#password-error_message").show();
          addError("password");
          errPassword = true;
        }
        else if(getID("password").value.indexOf(' ') >= 0){
          $("#password-error_message").html("White space is not valid for password.");
          $("#password-error_message").show();
          addError("password");
          errPassword = true;
        }
        else {
          $("#password-error_message").hide();
          removeError("password");
          errPassword = false;
        }
      });

      $("#confirmPass").focusout(function(){
        if(getID("confirmPass").value != getID("password").value ){
          $("#confirmPass-error_message").html("Please enter the same password.");
          $("#confirmPass-error_message").show();
          addError("confirmPass");
          errConfirmPass = true;
        }
        else {
          $("#confirmPass-error_message").hide();
          removeError("confirmPass");
          errConfirmPass = false;
        }
      });

      $("#showPassword").click(function(){
        $("#password").attr('type', $(this).is(':checked') ? 'text' : 'password');
        $("#confirmPass").attr('type', $(this).is(':checked') ? 'text' : 'password');
      });

      $("#acceptAgreement").click(function(){
        checkClick = true;
        bootbox.confirm({
            title: "<b>Terms and Conditions</b>",
            message: "Data Privacy Act of 2012..... ",
            buttons: {
                cancel: {
                    label: '<i class="fa fa-times"></i> Cancel',
                    className: 'btn btn-secondary'
                },
                confirm: {
                    label: '<i class="fa fa-check"></i> Accept',
                    className: 'btn btn-info'
                }
            },
            callback: function (result) {
                console.log('This was logged in the callback: ' + result);
                if(result){
                  $("#agreement").prop('checked', true);
                }else {
                  $("#agreement").prop('checked', false);
                }
            }
        });
      });

      $("#btnavatar").click(function(){
        $('#imageModal').modal('show');
        //fetch_data();
        /*$('#image_form')[0].reset();
        $('.modal-title').text("Add Image");
        $('#image_id').val('');
        $('#action').val('insert');
        $('#insert').val("Insert");*/
      });

    });




      //bootbox.alert("You are " + inputs[0]);


  </script>


</body>
</html>
