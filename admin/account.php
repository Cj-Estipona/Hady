<?php include 'includes/heading.php';?>
<?php
  $adminCollege = $_SESSION['College'];
  $currentPage = 'Account';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hady - Account</title>
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
    .accountSection{
      padding-top: 50px;
      padding-left: 25px;
      padding-right: 25px;
    }
    hr {
        border: 0;
        height: 1px;
        background: #333;
        background-image: linear-gradient(to right, #ccc, #333, #ccc);
    }
    #profilePic{
      text-align: center;
    }
    #profilePic img{
      margin: 0 auto;
    }
    #imageModal img {
      margin-top: 5px;
      margin-bottom: 5px;
    }
    #btnSave{
      background-color: #56BE9F;
      color: #ffffff;
    }
    #btnSave:hover{
      background-color: #4AA48A;
      color: #ffffff;
    }
    #btnClear{
      background-color: #54a7a6;
      color: #ffffff;
    }
    #btnClear:hover{
      background-color: #478D8D;
      color: #ffffff !important;
    }
    #dangerAlert{
      display:none;
    }


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
       <div id="image_data" class="containers">
         <div class="avatarContainer">
           <div class="row">
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018001.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018001)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018002.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018002)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018003.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018003)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018004.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018004)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018005.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018005)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018006.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018006)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018007.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018007)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018008.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018008)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018009.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018009)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018010.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018010)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018011.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018011)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018012.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018012)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018013.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018013)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018014.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018014)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018015.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018015)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018016.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018016)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018017.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018017)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018018.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018018)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018019.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018019)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018020.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018020)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018021.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018021)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018022.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018022)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018023.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018023)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018024.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018024)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018025.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018025)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018026.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018026)"></center>
             </div>
             <div class="col-sm-2 col-xs-3">
               <center><img src="../avatars/2018027.png" height="60px" width="60px" class="avatarImage" onclick="updateAvatar(2018027)"></center>
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

  <body ng-app="hadyWebApp">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-lg-2">
          <?php include "includes/navbar.php"; ?>
        </div>
        <?php
          include "../db_conn.php";
          date_default_timezone_set("Asia/Manila");
          $adminCollege = $_SESSION['College'];

          $selectDetails = "SELECT tbl_user.*, tbl_preference.DateCreated, tbl_preference.Icon,tbl_avatar.* FROM tbl_user
            INNER JOIN tbl_preference ON tbl_user.UserID = tbl_preference.UserID
            INNER JOIN tbl_avatar ON tbl_preference.Icon = tbl_avatar.AvatarID
            WHERE tbl_user.UserID = '$adminID' AND access_type = '1' ";
          $detailsResult = mysqli_query($connection1, $selectDetails) or die("Failed to query database ".mysql_error());
          $rowDetails = mysqli_fetch_array($detailsResult);
        ?>


        <!--Main App-->
      <div class="col-sm-9 col-lg-10 content">
        <div class="accountSection">

          <h2>Account</h2>
          <hr>
          <div class="panel-group">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#basicInfo" id="basicLink">Basic Information<i class="fa fa-lg fa-caret-up" style="float:right;"></i></a>
                </h4>
              </div>
              <div id="basicInfo" class="panel-collapse collapse in">
                <div class="panel-body">
                  <div class="row">
                    <div class="col-md-6">
                      <br><br><br>
                      <div class="" id="profilePic">
                        <?php echo '<img src="data:image/jpeg;base64,'.base64_encode($rowDetails['AvatarName']).'" height="170px" width="170px" class="img-responsive" value='.$rowDetails['AvatarID'].'>';  ?>
                        <a href="#" id="changePic">Change Picture</a>
                      </div>
                      <br>
                      <p class="text-primary">College</p>
                      <div class="well well-sm"><?php echo $adminCollege; ?></div>

                      <p class="text-primary">Email</p>
                      <div class="well well-sm Email" style="border:none;" id="Email" data-name="Email" data-type="email" data-pk="<?php echo $rowDetails['UserID']; ?>"><?php echo $rowDetails['Email']; ?></div>
                    </div>

                    <div class="col-md-6">
                      <div class="row">
                        <div class="col-md-4">
                          <p class="text-primary">First Name</p>
                          <div class="well well-sm FName" style="border:none;" id="FName" data-name="FName" data-type="text" data-pk="<?php echo $rowDetails['UserID']; ?>"><?php echo $rowDetails['FName']; ?></div>
                        </div>
                        <div class="col-md-4">
                          <p class="text-primary">Middle Name</p>
                          <div class="well well-sm MName" style="border:none;" id="MName" data-name="MName" data-type="text" data-pk="<?php echo $rowDetails['UserID']; ?>"><?php echo $rowDetails['MName']; ?></div>
                        </div>
                        <div class="col-md-4">
                          <p class="text-primary">Last Name</p>
                          <div class="well well-sm LName" style="border:none;" id="LName" data-name="LName" data-type="text" data-pk="<?php echo $rowDetails['UserID']; ?>"><?php echo $rowDetails['LName']; ?></div>
                        </div>
                      </div>
                      <p class="text-primary">Nickname</p>
                      <div class="well well-sm Nickname" style="border:none;" id="Nickname" data-name="Nickname" data-type="text" data-pk="<?php echo $rowDetails['UserID']; ?>"><?php echo $rowDetails['Nickname']; ?></div>

                      <p class="text-primary">Gender</p>
                      <div class="well well-sm Gender" style="border:none;" id="Gender" data-name="Gender" data-type="select" data-pk="<?php echo $rowDetails['UserID']; ?>"><?php echo $rowDetails['Gender']; ?></div>

                      <p class="text-primary">Birthdate</p>
                      <div class="well well-sm BDate" style="border:none;" id="BDate" data-name="BDate" data-type="combodate" data-pk="<?php echo $rowDetails['UserID']; ?>">
                        <?php
                          $bdate = new DateTime($rowDetails['BDate']);
                          echo date_format($bdate, "F j, Y");
                        ?>
                      </div>

                      <p class="text-primary">Mobile Number</p>
                      <div class="well well-sm MNumber" style="border:none;" id="MNumber" data-name="MNumber" data-type="tel" data-pk="<?php echo $rowDetails['UserID']; ?>"><?php echo $rowDetails['MNumber']; ?></div>

                    </div>
                  </div>
                </div>

              </div>
            </div>
          </div>

          <div class="panel-group">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#changePass" id="changeLink">Change Password<i class="fa fa-lg fa-caret-down" style="float:right;"></i></a>
                </h4>
              </div>
              <div id="changePass" class="panel-collapse collapse">
                <div class="panel-body">
                  <form class="form-inline">
                    <div class="form-group" id="errorOldPass">
                      <label class="sr-only" for="oldPass">Old Password:</label>
                      <input type="password" class="form-control" id="oldPass" placeholder="Enter Old Password"  name="oldPass" required>
                    </div>
                    <div class="form-group" id="errorNewPass">
                      <label class="sr-only" for="newPass">New Password:</label>
                      <input type="password" class="form-control" id="newPass" placeholder="Enter New Password" name="newPass" required>
                    </div>
                    <div class="form-group" id="errorConfirmPass">
                      <label class="sr-only" for="confirmPass">Confirm Password:</label>
                      <input type="password" class="form-control" id="confirmPass" placeholder="Confirm New Password" name="confirmPass" required>
                    </div>
                    <div class="checkbox">
                      <label><input type="checkbox" name="showPassword" id="showPassword"> Show Password</label>
                    </div>
                </form>
                <span id="errorMsg" class="text-danger"></span>
                <span id="successMsg"></span>
                <div class='alert alert-danger alert-dismissible' id="dangerAlert">
                <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
                <strong>Please check your password.</strong>Your password must be atleast 6 or more characters and contains letters and numbers.
              </div>
                </div>
                <div class="panel-footer">
                  <button class="btn" id="btnClear">Clear</button>
                  <button class="btn" id="btnSave">Save</button>
                </div>
              </div>
            </div>
          </div>
        </div><!--uploadSection-->

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

      function updateAvatar(value){
        $.ajax({
          url:"accountUpdate.php?userID=<?php echo $adminID; ?>&iconPic="+value+"",
          method: "POST",
          dataType: "json",
          success: function(response) {
            if (response.success) {
              location.reload();
            }
          }
        });
        //hasAvatar = true;
        $('#imageModal').modal('hide');
      }

      function clearFields(){
        $("#oldPass").val('');
        $("#newPass").val('');
        $("#confirmPass").val('');
        $("#errorMsg").html('');

        $("#errorOldPass").removeClass("has-error");
        $("#errorOldPass").removeClass("has-feedback");
        $("#errorNewPass").removeClass("has-error");
        $("#errorNewPass").removeClass("has-feedback");
        $("#errorConfirmPass").removeClass("has-error");
        $("#errorConfirmPass").removeClass("has-feedback");
      }


      $(document).ready(function(){

        var ucollege = '<?php echo $adminCollege; ?>';
        fetch_data();

        $("#btnLogout").click(function(){
          logoutExecute();
        });

        function bootBoxPop(message){
          bootbox.alert(message);
        }

        $("#basicLink").click(function(){
          $(this).find('i').toggleClass('fa-caret-up fa-caret-down');

        });

        $("#changeLink").click(function(){
          $(this).find('i').toggleClass('fa-caret-down fa-caret-up');
        });
        //$.fn.editable.defaults.mode = 'inline';
        $('.Email').editable({
          container:'body',
          url:'accountUpdate.php',
          title:'Email',
          type:'POST',
          validate:function(value){
            if ($.trim(value) == '') {
              return 'Please enter your email address';
            }
            var re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if(! re.test(value)){
              return 'Invalid Email format';
            }
          }
        });

        $('.FName').editable({
          container:'body',
          url:'accountUpdate.php',
          title:'First Name',
          type:'POST',
          validate:function(value){
            if ($.trim(value) == '') {
              return 'Please enter your first name';
            }
          }
        });

        $('.MName').editable({
          container:'body',
          url:'accountUpdate.php',
          title:'Middle Name',
          type:'POST',
          validate:function(value){
            if ($.trim(value) == '') {
              return 'Please enter your middle name';
            }
          }
        });

        $('.LName').editable({
          container:'body',
          url:'accountUpdate.php',
          title:'Last Name',
          type:'POST',
          validate:function(value){
            if ($.trim(value) == '') {
              return 'Please enter your last name';
            }
          }
        });

        $('.Nickname').editable({
          container:'body',
          url:'accountUpdate.php',
          title:'Nickname',
          type:'POST',
          validate:function(value){
            if ($.trim(value) == '') {
              return 'Please enter your nickname';
            }
          }
        });

        $('.Gender').editable({
          container:'body',
          url:'accountUpdate.php',
          title:'Gender',
          type:'POST',
          source:[{value:"Male", text:"Male"},{value:"Female", text:"Female"}],
          validate:function(value){
            if ($.trim(value) == '') {
              return 'Please select your gender';
            }
          }
        });

        $('.BDate').editable({
          container:'body',
          url:'accountUpdate.php',
          title:'Birth Date',
          type:'POST',
          format: 'YYYY-MM-DD',
           viewformat: 'LL',
           template: 'D / MMMM / YYYY',
           combodate: {
                   minYear: 1958,
                   maxYear: 2000,
                   minuteStep: 1
              },
          validate:function(value){
            if ($.trim(value) == '') {
              return 'Please select your birth date';
            }
          }
        });

        $('.MNumber').editable({
          container:'body',
          url:'accountUpdate.php',
          title:'MNumber',
          type:'POST',
          validate:function(value){
            if ($.trim(value) == '') {
              return 'Please enter your mobile number';
            }

            var expression = /^[0-9]+$/;
            if (! expression.test(value)) {
              return 'Please enter valid mobile number';
            }

            if (value.length < 11 || value.length > 11) {
              return 'It must consist of 11 characters';
            }
          }
        });

        $("#changePic").click(function(){
          $('#imageModal').modal('show');
        });

        $("#showPassword").click(function(){
          $("#oldPass").attr('type', $(this).is(':checked') ? 'text' : 'password');
          $("#newPass").attr('type', $(this).is(':checked') ? 'text' : 'password');
          $("#confirmPass").attr('type', $(this).is(':checked') ? 'text' : 'password');
        });

        $("#btnClear").click(function(){
          clearFields()
        });

        $("#btnSave").click(function(){
          if (($.trim( $("#newPass").val() ) == '' || $("#newPass").val().length < 6) || ($.trim( $("#confirmPass").val() ) == '' || $("#confirmPass").val().length < 6)) {
            $('#dangerAlert').show();
          }else {
            $('#dangerAlert').hide();
            $.ajax({
              url:"passwordUpdate.php",
              method: "POST",
              data:{action:'changePass',oldPass:$("#oldPass").val(), newPass:$("#newPass").val(), confirmPass:$("#confirmPass").val(), userID:'<?php echo $adminID; ?>'},
              dataType: "json",
              success: function(response) {
                if (response.success) {
                  console.log(response.oldPass);
                  console.log(response.newPass);
                  console.log(response.confirmPass);
                  clearFields();
                  $("#successMsg").html(response.message);
                } else {
                  if (response.errorOldPass) {
                    $("#errorMsg").html(response.message);
                    $("#errorOldPass").addClass("has-error");
                    $("#errorOldPass").addClass("has-feedback");
                  }else {
                    $("#errorOldPass").removeClass("has-error");
                    $("#errorOldPass").removeClass("has-feedback");
                  }

                  if (response.errorBothPass) {
                    $("#errorMsg").html(response.message);
                    $("#errorNewPass").addClass("has-error");
                    $("#errorNewPass").addClass("has-feedback");
                    $("#errorConfirmPass").addClass("has-error");
                    $("#errorConfirmPass").addClass("has-feedback");
                  } else {
                    $("#errorNewPass").removeClass("has-error");
                    $("#errorNewPass").removeClass("has-feedback");
                    $("#errorConfirmPass").removeClass("has-error");
                    $("#errorConfirmPass").removeClass("has-feedback");
                  }

                }
              }
            });
          }

        });




      });//document Ready

    </script>

  </body>
</html>
