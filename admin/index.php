
<?php
  session_start();
  if(!$_SESSION['admin']){
		$_SESSION['isLogin'] = false;
  }
  if (!$_SESSION['isLogin']) {
    header("Location: ../sign_in.php");
  }
  debug_to_console($_SESSION['userId']);

  $college = $_SESSION['College'];
  $adminID = $_SESSION['userId'];
  
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
	<link rel="icon" href="../resources/iconLogo.png">
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
                        <li><a href="index.php" class="active"><i class="fa fa-home"></i><span class="textLink">Home</span></a></li>
                        <li><a href="users.php"><i class="fa fa-comments-o"></i><span class="textLink">Students</span></a></li>
                        <li><a href="#"><i class="fa fa-lightbulb-o"></i><span class="textLink">Activities</span></a></li>
                        <li><a href="#"><i class="fa fa-cog"></i><span class="textLink">Account</span></a></li>
						<li><a href="logout.php" onclick="return confirm('Are you sure?');" ><i class="fa fa-power-off"></i><span class="textLink">Logout</span></a></li>
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
      });
    </script>
	
		<script>

        var ucollege = '<?php echo $college; ?>';
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

        $.ajax({
      		url:"data/phqview.php",
      		method: "POST",
      		success: function(data) {
      			console.log(data.data);
				var q = 0;
				var w = 0;
				var e = 0;
				var r = 0;
				var t = 0;
				var ids= '';
      			var scores = [];
      			var mood = [];
				ids = data[0].UserID;		
				
      		for(var i in data){			
				if(ids == data[i].UserID)
				{
					t += parseInt(data[i].Score);
				} else {
					if(t <9){
						q++;
					} else if(t>=9 && t<14){
						w++;
					} else if(t>=15 && t<20) {
						e++;
					} else {
						r++;
					}
					t = parseInt(data[i].Score);
					ids = data[i].UserID;
				}
      		}
			if(t <9){
						q++;
					} else if(t>=9 && t<14){
						w++;
					} else if(t>=15 && t<20) {
						e++;
					} else {
						r++;
					}
			scores.push("Minimal Symptoms");
			mood.push(q);
			scores.push("Minor depression");
			mood.push(w);
			scores.push("Moderately Severe");
			mood.push(e);
			scores.push("Severe");
			mood.push(r);
			
      		var labelx = "Provisional Diagnosis of PHQ-9 in the college of " + ucollege + "";
      		var ctx = $("#mycanvas");
      		var barGraph = new Chart(ctx, {
      			type: 'bar',
      			data:{
						labels: scores,
						datasets: [
						{
							label: labelx,
							backgroundColor: 'rgba(200,200,200,.75)',
							borderColor: 'rgba(200,200,200,.75)',
							hoverBackgroundColor: 'rgba(200,200,200,1)',
							hoverBorderColor: 'rgba(200,200,200,1)',
							data: mood
						}
					]},
				options: {
                    scales: {
                        yAxes: [{
                            ticks: {
                                beginAtZero:true,
                                fontSize: 14
                            }
                        }],
                        xAxes: [{
                            ticks: {
                                fontSize: 14
                            }
                        }]
                    }
                  }
			});
      			//var data = JSON.parse(data);
      		},
      		error: function(data){
      			console.log(data);
      			console.log("There is an error in app.js");
      		}
      	});
      });

    </script>
	
  </body>
</html>
