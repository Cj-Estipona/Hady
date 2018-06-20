angular.module("hadyWebApp").controller("MoodTrackCtrl", ["$scope", function($scope){
  $scope.message = "This is the Mood Tracking Page";
  $scope.labels = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
  $scope.data = [
    [40, 80, 80, 60, 20, 100, 20],
    [20, 60, 40, 100, 60, 40, 60],
    [60, 20, 0, 40, 0,  20, 80],
    [0, 100, 0, 0, 0,  60, 0],
    [0, 0, 0, 0, 0, 20, 0]
  ];
  $scope.options = {
        scales: {
            yAxes: [{
                ticks: {
                    beginAtZero:true
                }
            }]
        },
        tooltips: {
          callbacks: {
                        label: function(tooltipItem, data) {
                            return "Daily Ticket Sales: $ " + tooltipItem.yLabel;
                        },
                    }
            }
    };

  $scope.dataOverride = [];
  console.log($scope.dataOverride[0]);

  //setting the override
  for (var x = 0; x < $scope.data.length; x++){
    $scope.dataOverride.push({backgroundColor:[],borderColor:[],borderWidth:1});
  }
  for (var z = 0; z < $scope.data.length; z++){
    var colorFillBar = '';
    var borderFillBar ='';
    for(var i = 0; i < $scope.data[z].length; i++) {
      //console.log("inner loop", $scope.data[x][i]);
      if($scope.data[z][i] == 20){
        colorFillBar = 'rgba(255, 63, 61, 0.8)';
        borderFillBar = 'rgba(255, 63, 61, 1)';
      } else if ($scope.data[z][i] == 40) {
        colorFillBar = 'rgba(255, 106, 55, 0.8)';
        borderFillBar = 'rgba(255, 106, 55, 1)';
      } else if ($scope.data[z][i] == 60) {
        colorFillBar = 'rgba(255, 148, 62, 0.8)';
        borderFillBar = 'rgba(255, 148, 62, 1)';
      } else if ($scope.data[z][i] == 80) {
        colorFillBar = 'rgba(208, 255, 68, 0.8)';
        borderFillBar = 'rgba(208, 255, 68, 1)';
      } else if ($scope.data[z][i] == 100) {
        colorFillBar = 'rgba(102, 255, 102, 0.8)';
        borderFillBar = 'rgba(102, 255, 102, 1)';
      } else {
        colorFillBar = 'rgba(0, 0, 0, 0.8)';
        borderFillBar = 'rgba(0, 0, 0, 1)';
      }
      $scope.dataOverride[z].backgroundColor.push(colorFillBar);
      $scope.dataOverride[z].borderColor.push(borderFillBar);
    }
  }
  console.log("New Over", $scope.dataOverride);

  //$scope.dataOverride[0].backgroundColor.push('rgba(255, 206, 86, 0.2)');
  //$scope.dataOverride[0].borderColor.push('rgba(255, 206, 86, 1)');
}]);
//20,40,60,80,100,0
