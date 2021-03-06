
<?php
include '../db_conn.php';
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
    <title>Hady - Moods</title>
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
                         <li><a href="index.php"><i class="fa fa-home"></i><span class="textLink">Home</span></a></li>
                        <li><a href="users.php" class="active"><i class="fa fa-comments-o"></i><span class="textLink">Students</span></a></li>
                        <li><a href="#"><i class="fa fa-lightbulb-o"></i><span class="textLink">Activities</span></a></li>
                        <li><a href="#"><i class="fa fa-cog"></i><span class="textLink">Account</span></a></li>
						<li><a href="logout.php" onclick="return confirm('Are you sure?');" ><i class="fa fa-power-off"></i><span class="textLink">Logout</span></a>
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
				<?php
					$userid = trim(@$_GET['id']);
					include '../db_conn.php';

					if ($connection1 == false)
				{
					echo 'Unable to connect to Database server!<br>';
					if (DB_SHOWERROR)
						echo 'ERROR DETAILS:', mysqli_connect_error(), '<br>';

				}
				 else
				{

					$sql = "SELECT tbl_question.Question, tbl_score.Score,  max( tbl_score.Date )
							FROM tbl_question
							INNER JOIN tbl_score ON tbl_question.QuestionID = tbl_score.QuestionID
							Where tbl_score.UserID = '$userid'
                            AND tbl_score.Date = (
                                    SELECT max(Date) FROM tbl_score
									Where tbl_score.UserID = '$userid'
                            )
                            GROUP BY tbl_score.QuestionID
							
							";

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
						$totalscore = 0;
						echo '<table class = "listest">';
						echo '<tr><th>No</th><th>Questions</th><th>Answers </th></tr>';
						while($record = mysqli_fetch_array($results, MYSQLI_ASSOC))
						{
							if($record['Question']=='Have you thought that you would be better off dead or of hurting yourself in some ways?'&&$record['Score'] > 0){
								echo '<tr style="background-color:#FF0000; color: white;">';
								echo '<td>',++$linenumber,'</td>';
								echo '<td>',$record['Question'],'</td>';
								if($record['Score'] == 0){
									echo '<td>Not at all</td>';
								}
								else if($record['Score'] == 1){
									echo '<td>Several days</td>';
								}
								else if($record['Score'] == 2){
									echo '<td>More than half the days</td>';
								}
								else{
									echo '<td>Nearly everyday</td>';
								}
								echo '</tr>';
								$totalscore += $record['Score'];
								}
							else if ($record['Question']=='How difficult have these problems made it for you to do your work, take care of things at home, or get along with other people?'&&$record['Score'] > 0){
								echo '<tr style="background-color:#FF0000; color: white;">';
								echo '<td>',++$linenumber,'</td>';
								echo '<td>',$record['Question'],'</td>';
								if($record['Score'] == 0){
									echo '<td>Not difficult at all</td>';
								}
								else if($record['Score'] == 1){
									echo '<td>Somewhat difficult</td>';
								}
								else if($record['Score'] == 2){
									echo '<td>Very difficult</td>';
								}
								else{
									echo '<td>Extremely difficult</td>';
								}
								echo '</tr>';
							}
							else{
								echo '<tr>';
								echo '<td>',++$linenumber,'</td>';
								echo '<td>',$record['Question'],'</td>';
								if($record['Score'] == 0){
									echo '<td>Not at all</td>';
								}
								else if($record['Score'] == 1){
									echo '<td>Several days</td>';
								}
								else if($record['Score'] == 2){
									echo '<td>More than half the days</td>';
								}
								else{
									echo '<td>Nearly everyday</td>';
								}
								echo '</tr>';
								$totalscore += $record['Score'];
							}
							
						}
						echo '<tr><th colspan="2">Total Score</th><th>', $totalscore ,' </th></tr>';
						echo '</table>';
						@mysqli_free_result($results);
					}

				}
						
				?>   
				
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
      		url:"data/usermood.php?id="+id+"",
      		method: "POST",
          data:{data:id},
      		success: function(data) {
      			console.log(data.data);
      			var user = [];
      			var mood = [];
      			user.push("DATE");
      			mood.push(0);

      			for(var i in data){
      				user.push("Date: " + data[i].MoodDate);
      				if(data[i].MoodLvl == "Very Low"){
      					mood.push(20);
      				} else if (data[i].MoodLvl == "Low"){
      					mood.push(40);
      				} else if (data[i].MoodLvl == "Neutral"){
      					mood.push(60);
      				} else if (data[i].MoodLvl == "High"){
      					mood.push(80);
      				} else{
      					mood.push(100);
      				}
      			}
      			var labelx = "Mood Levels of "+ data[0].LName +", " +data[0].FName;
      			var chartdata = {
      				labels: user,
      				datasets: [
      					{
      						label: labelx,
      						backgroundColor: 'rgba(200,200,200,100)',
      						borderColor: 'rgba(200,200,200,100)',
      						hoverBackgroundColor: 'rgba(200,200,200,1)',
      						hoverBorderColor: 'rgba(200,200,200,1)',
      						data: mood
      					}
      				],
              options: {
                    title: {
                      display: true,
                      text: "HAHA",
                      fontSize: 18,
                      fontColor: '#EFEEF1'
                    },
                    scales: {
                        xAxes: [{
                            ticks: {
                                beginAtZero:true,
                                max: 100,
                                stepSize: 20,
                                fontColor: '#EFEEF1',
                                fontSize: 14
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                fontColor: '#EFEEF1',
                                fontSize: 14
                            }
                        }]
                    }
                  }
      			};

      			var ctx = $("#mycanvas");

      			var barGraph = new Chart(ctx, {
      				type: 'line',
      				data: chartdata
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
