<?php include 'includes/heading.php';?>
<?php
  $adminCollege = $_SESSION['College'];
  $currentPage = 'Uploads';
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Hady - Uploads</title>
    <meta charset="utf-8">
    <!--<meta name="viewport" content="width=device-width, initial-scale=1">-->
  	<?php include 'includes/imports.php'; ?>
    <script>
    function deleteDataRow(id){
      bootbox.confirm({
          message: "Are you sure you want to delete this file?",
          buttons: {
              confirm: {
                  label: 'Yes',
                  className: 'btn-success'
              },
              cancel: {
                  label: 'No',
                  className: 'btn-danger'
              }
          },
          callback: function (result) {
              if (result) {
                window.location.href="model/deleteFile.php?actID=" + id;
                return true;
              }
          }
      });
    }
    </script>
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
    .uploadSection{
      padding-top: 50px;
      padding-left: 25px;
      padding-right: 25px;
    }
    .error{
      color: #E53F22;
    }
    .btnActions{
      text-align:center;
    }
    .btnActions a{
      margin-left: 5px;
      margin-right: 5px;
      margin-top: 8px;
    }

	}
  </style>

  <body ng-app="hadyWebApp">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-lg-2">
          <?php include "includes/navbar.php"; ?>
        </div>

        <?php
          include '../db_conn.php';

          $fileError = $titleError = $descError = "";
          $titleBooleanError = $descBooleanError = false;

          $allowedFile = array('application/pdf', 'application/msword', 'application/vnd.ms-powerpoint', 'application/vnd.ms-excel');

          if (isset($_POST['submitFile'])) {
            $activityTitle = "";
            $activityDesc = "";
            $fileName = "";
            $fileType = "";
            $fileData = "";

            if($_FILES['myfile']['size'] > 10485760) { //10 MB (size is also in bytes)
              $fileError = "You have exceeded the maximum size of file.";
            } else if (!in_array($_FILES['myfile']['type'], $allowedFile)) {
              $fileError = 'Only pdf, msword, msppt and msexcel are allowed.';
            }else {
              $fileError = "";

              if (strlen($_POST['activityName']) > 0 && strlen(trim($_POST['activityName'])) == 0) {
                $titleError = "Please Enter a valid value for Activity title";
                $titleBooleanError = true;
              }
              if (strlen($_POST['activityDescription']) > 0 && strlen(trim($_POST['activityDescription'])) == 0) {
                $descError = "Please Enter a valid value for Activity description";
                $descBooleanError = true;
              }

              if (!$descBooleanError && !$titleBooleanError) {
                $titleError = $descError = "";
                $activityTitle = $_POST['activityName'];
                $activityDesc = $_POST['activityDescription'];
                $uploadTo = $_POST['uploadTo'];
                $fileName = $_FILES['myfile']['name'];
                $fileType = $_FILES['myfile']['type'];
                $fileData = addslashes(file_get_contents($_FILES['myfile']['tmp_name']));

                $queryInsert = "INSERT INTO tbl_activity(`ActivityName`, `ActivityDesc`, `ActivityFilename`, `ActivityMime`, `ActivityData`, `UploadedBy`, `UploadTo`)
                VALUES('".$activityTitle."','".$activityDesc."','".$fileName."','".$fileType."','".$fileData."','".$adminCollege."','".$uploadTo."') ";
                $resultInsert = mysqli_query($connection1, $queryInsert) or die("Failed to query the query1 ".mysqli_error($connection1));

                if ($resultInsert) {
                  echo "<script>bootbox.alert('File successfuly uploaded');</script>";
                  $_POST['activityName'] = $_POST['activityDescription'] = "";
                } else {
                  echo "<script>bootbox.alert('File error');</script>";
                }
              }//if true

            }// else
          }//btnSubmit
        ?>

        <!--Main App-->
      <div class="col-sm-9 col-lg-10 content">
        <div class="uploadSection">

          <h2>Uploads</h2>
          <hr>
          <div class="panel-group">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h4 class="panel-title">Upload Resources</h4>
              </div>
              <div id="collapse1" class="panel-collapse">
                <div class="panel-body">
                  <form class="form-horizontal" action="uploads.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                      <label class="col-sm-1 control-label">File Title</label>
                      <div class="col-sm-11">
                        <input class="form-control" id="activityName" type="text" name="activityName" placeholder="Enter File Title" value="<?= isset($_POST['activityName']) ? $_POST['activityName'] : ''; ?>" required>
                        <span class="error"><?php echo $titleError;  ?></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-1 control-label">File Description</label>
                      <div class="col-sm-11">
                        <textarea class="form-control" id="activityDescription" name="activityDescription" type="text" placeholder="Write file description.." value="<?= isset($_POST['activityDescription']) ? $_POST['activityDescription'] : ''; ?>" required></textarea>
                        <span class="error"><?php echo $descError;  ?></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <label class="col-sm-1 control-label">Upload To</label>
                      <div class="col-sm-11">
                        <select class="form-control" id="uploadTo" name="uploadTo">
                          <option value="ALL">ALL</option>
                          <?php
                            $optionsSelect = "";
                            $queryOption = "SELECT * FROM tbl_college WHERE CollegeDept='$adminCollege'";
                            $resultOption = mysqli_query($connection1, $queryOption) or die("Failed to query the query1 ".mysqli_error($connection1));
                            while ($rowOption = mysqli_fetch_array($resultOption)) {
                              $optionsSelect .= " <option value='".$rowOption['CourseName']."'>".$rowOption['CourseName']."</option>";
                            }
                            echo $optionsSelect;
                          ?>
                        </select>
                        <span class="error"><?php //echo $uploadToError;  ?></span>
                      </div>
                    </div>

                    <div class="form-group">
                      <center>
                        <input type="file" name="myfile"/ required>
                        <br>
                        <p><i>Note: File must not be larger than 10MB</i></p>
                      <center>
                    </div>

                    <center><button name="submitFile">Upload File</button></center>
                    <span class="error"><?php echo $fileError;  ?></span>
                  </form>
                </div>
              </div>
              <?php
               $selectQueryFiles = "SELECT * FROM `tbl_activity` WHERE UploadedBy = '$adminCollege' OR UploadedBy = 'MAINADMIN' ORDER BY ActID DESC";
               $resultSelectFile = $resultInsert = mysqli_query($connection1, $selectQueryFiles) or die("Failed to query the query1 ".mysqli_error($connection1));
              ?>
              <!-- Advanced Tables -->
              <div class="panel panel-default">
                  <div class="panel-body">
                      <div class="table-responsive">
                          <table class="table table-striped table-bordered table-hover" id="dataTables-files">
                              <thead>
                                  <tr>
                                      <th>#</th>
                                      <th>Title</th>
                                      <th>Description</th>
                                      <th>FileName</th>
                                      <th>Uploaded To</th>
                                      <th>Actions</th>
                                  </tr>
                              </thead>
                              <tbody>
                                <?php
                                  $count = 1;
                                  while($row = mysqli_fetch_array($resultSelectFile))
                                  {
                                      echo"<tr class='filesList'>

                                          <td>".$count."</td>
                                          <td class='col-md-2'>".$row['ActivityName']."</td>
                                          <td class='col-md-4'>".$row['ActivityDesc']."</td>
                                          <td class='col-md-2'>".$row['ActivityFilename']."</td>
                                          <td class='col-md-1'>".$row['UploadTo']."</td>
                                          <td class='col-md-3 btnActions'>
                                            <a target='_blank' href='model/viewFile.php?idAction=".$row['ActID'] ."'> <button class='btn btn-info'> <i class='fa fa-eye' ></i> View</button></a>
                                            <a href='#'> <button onClick=deleteDataRow(".$row['ActID'].") class='btn btn-danger' id='btnDelete' name='action' value='Delete'> <i class='fa fa-times' ></i> Delete</button></a>
                                          </td>

                                      </tr>";
                                    $count++;
                                  }
                                ?>
                              </tbody>
                          </table>
                      </div>
                  </div>
              </div>
              <!--End Advanced Tables -->
            </div><!--panelInfor-->

            <!--<div class="panel panel-info">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#collapse2">Post Announcements / Messages</a>
                </h4>
              </div>
              <div id="collapse2" class="panel-collapse collapse">
                <div class="panel-body">Panel Body</div>
              </div>
            </div>-->
          </div><!--Panel Group-->


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

      function updateFile(fileID){
        bootbox.alert(fileID);
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

        $('#dataTables-files').DataTable();



      });//document Ready

    </script>

  </body>
</html>
