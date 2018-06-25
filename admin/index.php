
<?php
  session_start();
  if(!$_SESSION['admin']){
		$_SESSION['isLogin'] = false;
  }
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
    <link rel="stylesheet" href="../font-awesome-4.7.0\font-awesome-4.7.0\css\font-awesome.min.css">
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>-->
    <script src="../js/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/bootbox.min.js"></script>
    <script src="../js/typed.js"></script>
    <script src="../js/scrollreveal.min.js"></script>
	  <script src="lib/Chart.min.js"></script>
	<!--<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>-->
	  <!--<script type ="text/javascript" src="js/app.js?newversion"></script>-->
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">

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
			.listest {
    font-family: "Trebuchet MS", Arial, Helvetica, sans-serif;
    border-collapse: collapse;
    width: 100%;

	}

	.listest td, .listest th {
		border: 1px solid #ddd;
		padding: 8px;
	}

	.listest tr:nth-child(even){background-color: #f2f2f2;}

	.listest tr:hover {background-color: #ddd;}

	.listest th {
		padding-top: 12px;
		padding-bottom: 12px;
		text-align: left;
		background-color: #0045b5;
		color: white;
	}



	.link:hover, .link:active {
		background-color: #011a42;
	}

  </style>

  <body ng-app="hadyWebApp">
    <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3 col-lg-2">
          <nav class="navbar navbar-default navbar-fixed-side">
            <div class="container-fluid navForeground">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <a class="navbar-brand" id="UserAvatar">

                    </a>
                    <div class="welcomeUser">
                      <h4>Welcome,</h4>
                      <h3><?php echo $_SESSION['nickname']?></h3>
                    </div>
                </div>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="navbar-main" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php" class="active"><i class="fa fa-home"></i><span class="textLink">Engagement</span></a></li>
                        <li><a href=""><i class="fa fa-bar-chart"></i><span class="textLink">Mood Tracking</span></a></li>
                        <li><a href="users.php"><i class="fa fa-comments-o"></i><span class="textLink">Users</span></a></li>
                        <li><a href="#"><i class="fa fa-lightbulb-o"></i><span class="textLink">Activities</span></a></li>
                        <li><a href="#"><i class="fa fa-cog"></i><span class="textLink">Account</span></a></li>
                    </ul>
                </div>
                <div class="navbar-footer">
                  <img src="../resources/LogoNamePNG.png" alt="Hady Logo" class="img-responsive">
                </div>
            </div>
          </nav>
        </div>

        <!--Main App-->
        <div class="col-sm-9 col-lg-10 content">
			<div class="col-sm-9 col-lg-10 content">
			<?php
				include 'db_conn.php';

				if ($connection1 == false)
			{
				echo 'Unable to connect to Database server!<br>';
				if (DB_SHOWERROR)
					echo 'ERROR DETAILS:', mysqli_connect_error(), '<br>';

			}
			 else
			{

				$sql = "SELECT UserID,
						FName,
						LName,
						Course
						FROM tbl_user
						ORDER BY LName";

				$results = mysqli_query($connection1, $sql);

				if($results == false)
				{
					echo 'Unable to perform database query<br>';
					if (DB_SHOWERROR)
						echo 'ERROR DETAILS:' , mysqli_error($connection1),'<br>';
				}
				else
				{
					$linenumber=0;
					echo '<table class = "listest">';
					echo '<tr><th>No</th><th>Last Name</th><th>First Name </th><th>Course</th><th>Links</th></tr>';
					while($record = mysqli_fetch_array($results, MYSQLI_ASSOC))
					{
						echo '<tr>';
						echo '<td>',++$linenumber,'</td>';
						echo '<td>',$record['LName'],'</td>';
						echo '<td>',$record['FName'],'</td>';
						echo '<td>',$record['Course'],'</td>';

						$viewlink = "viewmood.php?id=".$record['UserID'] . "";
						echo "<td>";
						echo "<a href='$viewlink'>View Mood Chart </a>";
						echo "</td>";
						echo '</tr>';
					}
					echo '</table>';
					echo 'Total records found: ', mysqli_num_rows($results) , '<br>';

					@mysqli_free_result($results);
				}

			}

			?>
			<button id='hellos'>HAHAHHA</button>
        </div>
      </div>
    </div>


    <script>
      $(document).ready(function(){
        fetch_data();
        //addRemove_active();
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

		/*function viewmood (userID) {
			var action = "HAHA";
			console.log(action);
			$.ajax({
				url:"data.php",
				method: "POST",
				data:action,
				success:function(data){
					windows.location.href = 'viewmood.php'
				}
			})
			alert(userID);
		}*/
		$('#hellos').click(function(){
			console.log("Working");
		});
		/*$('#hello').click(function(){
			console.log("Workingggg");
		});*/
      });
    </script>
  </body>
</html>
