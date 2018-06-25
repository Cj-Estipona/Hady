angular.module("hadyWebApp").controller("TodayCtrl", ["$scope","$http","$timeout", function($scope,$http,$timeout){
  $scope.message = "";
  $scope.journal = "";
  $scope.journalTitle = "";
  $scope.successful = false;
  $scope.emotionFace = "../resources/greenFace.png";
  $scope.faceMood = "sliderDiv5";
  var moodLabelArray = ["Very Low", "Low", "Neutral", "High", "Very High"];
  $scope.moodLabel =  moodLabelArray[4];
  $scope.moodArray = ['Amused','Blissful','Calm','Cheerful','Content','Dreamy','Ecstatic','Energetic','Excited','Flirty','Giddy','Good','Happy','Joyful','Loving','Mellow','Optimistic','Peaceful','Relaxed','Silly','Sympathetic',
'Angry','Annoyed','Apathetic','Bad','Cranky','Depressed','Envious','Frustrated','Gloomy','Grumpy','Guilty','Indifferent','Irritated','Lonely','Melancholy','Pessimistic','Rejected','Restless','Sad','Stressed','Weird'];
  var triviaArray = ["Logging your mood and having a journal allows you to connect your feelings to what happened during the day.","Tracking your mood can help your physician, therapist, or psychiatrist give you a more accurate diagnosis.",
"Charting your mood allows you to see patterns in your life.","Logging of mood and writing journals allows you to better understand your triggers.","Keeping track of your moods can tell you a lot about the timing of your different mood states."];
  $scope.trivia = triviaArray[Math.floor(Math.random() * triviaArray.length)];
  $scope.models = {
    selected: null,
    lists: {"A": [], "B": []}
  };

  $scope.loadMethods = function() {
    $scope.checkMood();
  };

  // Generate initial model
  for (var i = 0; i < $scope.moodArray.length; ++i) {
    $scope.models.lists.A.push({label: $scope.moodArray[i]});
  }

  $scope.removedItem = function(item, listName) {
    if(listName == 'A'){
      $scope.models.lists.A.splice($scope.models.lists.A.indexOf(item),1);
    } else {
      $scope.models.lists.B.splice($scope.models.lists.B.indexOf(item),1);
    }
  };
  $scope.moveRemove = function(item,listName) {
    if(listName == 'A'){
      //var dataPush = $scope.models.lists.A.indexOf(item);
      $scope.models.lists.B.push(item);
      $scope.models.lists.A.splice($scope.models.lists.A.indexOf(item),1);
    } else {
      //var dataPush2 = $scope.models.lists.B.indexOf(item);
      $scope.models.lists.A.push(item);
      $scope.models.lists.B.splice($scope.models.lists.B.indexOf(item),1);
    }
  };

  /*$scope.logNow = function(){
    var object = $scope.models.lists.B;
    var result = object.map(a => a.label);
    console.log("String Array", result.toString());
  };*/

  $scope.checkMood = function(){
    $http.post("model/logMood.php?action=checkMood")
    .then(function(response){
      console.log(response.data);
      if(response.data == "error"){
        $scope.showAlertBox(true,"alert alert-danger","There was some problem with the database.");
      } else {
        if (response.data>=5) {
          $scope.submitLimit = true;
          $scope.showAlertBox(true,"alert alert-danger","You have exceed the limit of Mood Submission for today.");
        } else {
          $scope.submitLimit = false;
        }
      }
    });
  };

  $scope.submitMood = function(){
    var object = $scope.models.lists.B;
    var result = object.map(a => a.label);
    console.log("String Array", result.toString());
    $http.post("model/logMood.php?action=submitMood",  {'passMood':$scope.moodLabel,'passMoodArr':result.toString(),'passTitle':$scope.journalTitle,'passJournal':$scope.journal})
    .then(function(response){
      if (response.data=="success") {
        //console.log("Data inserted to database");
        $scope.showAlertBox(true,"alert alert-success","Your daily mood bas been recorded.");
        $scope.checkMood();
        $scope.resetMood();
      } else {
        console.log("error");
      }
    });
  };

  $scope.resetMood = function() {
    $scope.emotionFace = "../resources/greenFace.png";
    $scope.faceMood = "sliderDiv5";
    $scope.moodLabel =  moodLabelArray[4];
    $scope.journal = "";
    $scope.journalTitle = "";
    $scope.models.lists.B = [];
    $scope.searchText = "";
    $scope.slider.value = 5;
  };

  $scope.slider = {
    value: 5,
    options: {
      id: 'slider-id',
      floor: 1,
      ceil: 5,
      step: 1,
      minLimit: 1,
      maxLimit: 5,
      //showTicks: true,
      showSelectionBarFromValue: 0,
      showOuterSelectionBars: true,
      hideLimitLabels: true,
      onChange: function(id) {
            //console.log('on change ' + $scope.slider.value); // logs 'on change slider-id'
            switch ($scope.slider.value) {
              case 1:
                $scope.emotionFace = "../resources/redFace.png";
                $scope.faceMood = "sliderDiv";
                $scope.moodLabel = moodLabelArray[0];
                break;
              case 2:
                $scope.emotionFace = "../resources/orangeFace.png";
                $scope.faceMood = "sliderDiv2";
                $scope.moodLabel = moodLabelArray[1];
                break;
              case 3:
                $scope.emotionFace = "../resources/lightorangeFace.png";
                $scope.faceMood = "sliderDiv3";
                $scope.moodLabel = moodLabelArray[2];
                break;
              case 4:
                $scope.emotionFace = "../resources/lightgreenFace.png";
                $scope.faceMood = "sliderDiv4";
                $scope.moodLabel = moodLabelArray[3];
                break;
              default:
                $scope.emotionFace = "../resources/greenFace.png";
                $scope.faceMood = "sliderDiv5";
                $scope.moodLabel = moodLabelArray[4];
                break;
            }
        },
      getSelectionBarColor: function(value) {
            if (value == 1)
                return '#FF3F3D';
            if (value == 2)
                return '#FF6A37';
            if (value == 3)
                return '#FF943E';
            if (value == 4)
                return '#D0FF44';
            return '#66FF66';
        }
    }
};

$scope.showAlertBox = function(alertBool, alertClass, alertMessage) {
  $scope.successful = alertBool;
  $scope.alertClass = alertClass;
  $scope.alertMessage = alertMessage;
  $timeout(function () {
        $scope.successful = false;
    }, 10000);
};


}]);
