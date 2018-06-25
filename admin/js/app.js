$(document).ready(function(){
	$.ajax({
		url:"data.php",
		method: "GET",
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
			console.log("There is an error in app.js");
		}
	});
});
