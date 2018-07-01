angular.module("hadyWebApp").controller("MoodTrackCtrl", ["$scope","$http", function($scope,$http){
  $scope.defaultClass = true;
  $scope.activeView = 'Weekly';
  $scope.weekAdd = 0;
  $scope.labels = [];
  $scope.data = [
    /*[40, 80, 80, 60, 20, 100, 20],
    [20, 60, 40, 100, 60, 40, 60],
    [60, 20, 0, 40, 0,  20, 80],
    [0, 100, 0, 0, 0,  60, 0],
    [0, 0, 0, 0, 0, 20, 0]*/
  ];
  $scope.date = [
    /*['12:30','9:15','14:02','16:12','6:36','7:21','8:16'],
    ['15:00','12:45','17:05','18:03','8:23','10:11','11:43'],
    ['20:16','16:05','','20:13','','13:56','15:08'],
    ['','21:45','','','','18:29',''],
    ['','','','','','22:49','']*/
  ];
  $scope.journalData = {
    model: [],
    availableOptions: ''
   };
  $scope.toolTipArray = [];
  $scope.averageWeek = 0;
  $scope.bestDay = "None";
  $scope.worstDay = "None";
  $scope.topMood = "";
  $scope.loadingIcon = true;

  $scope.selectJournal = function () {
    $scope.journalDate = JSON.parse($scope.journalData.model).MoodDate;
    var entryDate = new Date($scope.journalDate);
    $scope.journalEntryDate = entryDate.toLocaleString();
    $scope.journalBody = JSON.parse($scope.journalData.model).MoodJournal;
    //console.log((JSON.parse($scope.journalData.model)).MoodJournal);
  };

  $scope.loadMethods = function(){
    $scope.weeklyView();
  };
  $scope.leftRightDate = function(choice) {
    $scope.journalEntryDate = "";
    $scope.journalBody = "";
    if (choice == 'add') {
      $scope.weekAdd += 7;
    } else {
      $scope.weekAdd -= 7;
    }
    $scope.weeklyView();
    console.log($scope.weekAdd);
  };



  $scope.weeklyView = function () {
    var curr = new Date(); // get current date
    curr.setDate(curr.getDate()-$scope.weekAdd);
    curr.setHours(0,0,0,0);
    console.log(curr);
    var first = curr.getDate() - curr.getDay(); // First day is the day of the month - the day of the week
    var last = first + 7; // last day is the first day + 6

    var firstday = new Date(curr.setDate(first)).toDateString();
    var lastday = new Date(curr.setDate(last)).toDateString();

    //FOR JUST THE LABEL OF LAST DAY OF THE WEEK
    var latest = new Date();
    latest.setDate(latest.getDate()-$scope.weekAdd);
    latest.setHours(0,0,0,0);
    var firstLatest = latest.getDate() - latest.getDay(); // First day is the day of the month - the day of the week
    var lastlatest = firstLatest + 6; // last day is the first day + 6
    var labelLastDay = new Date(latest.setDate(lastlatest)).toDateString();

    $scope.labels = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];

    console.log("First", firstday);
    console.log("Last",lastday);
    $http.post("model/trackMood.php?action=getCurrMood",{'passFirstday':firstday,'passLastday':lastday})
    .then(function successCallback(response){
      console.log("New Array", response.data.firstday);
      console.log("CATS", response.data.lastday);
      $scope.data = response.data.moodData;
      $scope.date = response.data.moodDate;
      $scope.journalData.availableOptions = response.data.journalData;
      $scope.toolTipArray = response.data.daysOfWeek;
      $scope.averageWeek = response.data.weekAverage;
      if (!response.data.topMood.length) {
        var obj = response.data.topMood;
        var result = Object.keys(obj).map(function(key) {
          return [obj[key]];
        });
        $scope.topMood = result.toString();
      } else {
        $scope.topMood = response.data.topMood.join(', ');
      }



      if (response.data.bestDay.length == 0) {
        $scope.bestDay = "None";
      } else {
        if(response.data.bestDay.length > 1){
          $scope.bestDay = $scope.labels[response.data.bestDay[0]];
          for (var k = 1; k < response.data.bestDay.length; k++) {
            $scope.bestDay = $scope.bestDay.concat(", " + $scope.labels[response.data.bestDay[k]]);
          }
        } else {
          $scope.bestDay = $scope.labels[response.data.bestDay[0]];
        }
      }

      if (response.data.worstDay == 0) {
        $scope.worstDay = $scope.bestDay;
      } else {
        if (response.data.worstDay.length > 1) {
          $scope.worstDay = $scope.labels[response.data.worstDay[0]];
          for (var j = 1; j < response.data.worstDay.length; j++) {
            $scope.worstDay = $scope.worstDay.concat(", " + $scope.labels[response.data.worstDay[j]]);
          }
        } else {
          $scope.worstDay = $scope.labels[response.data.worstDay[0]];
        }
      }

      $scope.chartTitle = firstday.substring(3) + " - " + labelLastDay.substring(3);
      $scope.loadingIcon = false;
      console.log($scope.data.length);
      $scope.options = {
            title: {
              display: true,
              text: $scope.chartTitle,
              fontSize: 18,
              fontColor: '#EFEEF1'
            },
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero:true,
                        max: 100,
                        stepSize: 20,
                        fontColor: '#EFEEF1',
                        fontSize: 14
                    }
                }],
                xAxes: [{
                    ticks: {
                        fontColor: '#EFEEF1',
                        fontSize: 14
                    }
                }]
            },
            tooltips: {
              mode: 'single',
              callbacks: {
                label: function(tooltipItem, data) {
                  var dataset = data.datasets[tooltipItem.datasetIndex];
                  var index = tooltipItem.index;
                  var labelMood = "";
                  switch (dataset.data[index]) {
                    case 20:
                      labelMood="Very Low";
                      break;
                    case 40:
                      labelMood="Low";
                      break;
                    case 60:
                      labelMood="Neutral";
                      break;
                    case 80:
                      labelMood="High";
                      break;
                    case 100:
                      labelMood="Very High";
                      break;
                    default:
                      labelMood = "";
                  }
                  return dataset.label[index] + ': ' + labelMood;
                },
                title: function(tooltipItem, data) {
                  var toolTipTitle = '';
                  if (tooltipItem[0].xLabel == 'Sunday') {
                    toolTipTitle = new Date($scope.toolTipArray[0]).toDateString();
                  } else if (tooltipItem[0].xLabel == 'Monday') {
                    toolTipTitle = new Date($scope.toolTipArray[1]).toDateString();
                  } else if (tooltipItem[0].xLabel == 'Tuesday') {
                    toolTipTitle = new Date($scope.toolTipArray[2]).toDateString();
                  } else if (tooltipItem[0].xLabel == 'Wednesday') {
                    toolTipTitle =  new Date($scope.toolTipArray[3]).toDateString();
                  } else if (tooltipItem[0].xLabel == 'Thursday') {
                    toolTipTitle = new Date($scope.toolTipArray[4]).toDateString();
                  } else if (tooltipItem[0].xLabel == 'Friday') {
                    toolTipTitle =  new Date($scope.toolTipArray[5]).toDateString();
                  } else {
                    toolTipTitle =  new Date($scope.toolTipArray[6]).toDateString();
                  }
                  return toolTipTitle;
                }
              }
            }
        };

      $scope.dataOverride = [];
      console.log($scope.dataOverride[0]);

      //setting the override
      for (var x = 0; x < $scope.data.length; x++){
        $scope.dataOverride.push({label:[],backgroundColor:[],borderColor:[],borderWidth:1});
      }
      for (var z = 0; z < $scope.data.length; z++){
        var colorFillBar = '';
        var borderFillBar ='';
        for(var i = 0; i < $scope.data[z].length; i++) {
          //console.log("inner loop", $scope.data[x][i]);
          if($scope.data[z][i] == 20){
            colorFillBar = 'rgba(255, 63, 61, 0.5)';
            borderFillBar = 'rgba(255, 63, 61, 1)';
          } else if ($scope.data[z][i] == 40) {
            colorFillBar = 'rgba(255, 106, 55, 0.5)';
            borderFillBar = 'rgba(255, 106, 55, 1)';
          } else if ($scope.data[z][i] == 60) {
            colorFillBar = 'rgba(255, 148, 62, 0.5)';
            borderFillBar = 'rgba(255, 148, 62, 1)';
          } else if ($scope.data[z][i] == 80) {
            colorFillBar = 'rgba(208, 255, 68, 0.5)';
            borderFillBar = 'rgba(208, 255, 68, 1)';
          } else if ($scope.data[z][i] == 100) {
            colorFillBar = 'rgba(102, 255, 102, 0.5)';
            borderFillBar = 'rgba(102, 255, 102, 1)';
          } else {
            colorFillBar = 'rgba(0, 0, 0, 0.8)';
            borderFillBar = 'rgba(0, 0, 0, 1)';
          }
          $scope.dataOverride[z].label.push($scope.date[z][i]);
          $scope.dataOverride[z].backgroundColor.push(colorFillBar);
          $scope.dataOverride[z].borderColor.push(borderFillBar);
        }
      }
      console.log("New Over", $scope.dataOverride);
      if ($scope.averageWeek >= 0 && $scope.averageWeek <= 20 ) {
        $scope.emotionFace = "../resources/redFace.png";
      } else if ($scope.averageWeek >= 21 && $scope.averageWeek <= 40 ) {
        $scope.emotionFace = "../resources/orangeFace.png";
      } else if ($scope.averageWeek >= 41 && $scope.averageWeek <= 60 ) {
        $scope.emotionFace = "../resources/lightorangeFace.png";
      } else if ($scope.averageWeek >= 61 && $scope.averageWeek <= 80 ) {
        $scope.emotionFace = "../resources/lightgreenFace.png";
      } else {
        $scope.emotionFace = "../resources/greenFace.png";
      }
    });
  }; //weeklyView function


}]);
//20,40,60,80,100,0
