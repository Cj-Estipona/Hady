
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.6.0/Chart.min.js"></script>

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

  </style>

  <body>
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
			       <canvas id="mycanvas"></canvas>
        </div>
      </div>
    </div>


    <script>
      $(document).ready(function(){
        fetch_data();
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
        var id = getUrlParameter('id');

        function getUrlParameter(sParam) {
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

      	console.log("MY ID",id);

        $.ajax({
      		url:"data.php",
      		method: "POST",
          data:{data:id},
      		success: function(data) {
      			console.log(data);
      			var user = [];
      			var mood = [];

      			for(var i in data){
      				user.push("USERID "+ data[i].UserID);
      				mood.push(data[i].Moods)
      			}

      			var chartdata = {
      				labels: user,
      				datasets: [
      					{
      						label: "Moods",
      							backgroundColor: 'rgba(0,200,200,0.75)',
      							borderColor: 'rgba(0,200,200,0.75)',
      							hoverBackgroundColor: 'rgba(0,200,200,1)',
      							hoverBorderColor: 'rgba(0,200,200,1)',
      							data: mood
      					}
      				]
      			};

      			var ctx = $("#mycanvas");

      			var barGraph = new Chart(ctx, {
      				type: 'horizontalBar',
      				data: chartdata
      			});
      			var data = JSON.parse(data);
      		},
      		error: function(data){
      			console.log(data);
      		}
      	});

      });
    </script>

  </body>
</html>
