angular.module("hadyWebApp").controller("BreatheCtrl", ["$scope","$timeout","$interval", function($scope,$timeout,$interval){
  $scope.message = "BREATHE";
  $scope.loadingIcon = true;
  $scope.starter = true;
  $scope.finish = false;
  $scope.counter = 120;
  var mytimeout;

  $scope.instructionList = [
    {'instructionID':1,'instructionMsg':'Welcome to your breathing exercise. I am here to tell you what needs to be done.'},
    {'instructionID':2,'instructionMsg':'First, you need to sit upright in a comfortable position, with your hands on your knees and your shoulders relaxed.'},
    {'instructionID':3,'instructionMsg':'Second, Exhale completely. Your lungs first need to be empty in order to allow you to inhale fully and deeply.'},
    {'instructionID':4,'instructionMsg':'Next, Slowly breathe in through your nose for a count of five. Breathe deeply into your lower abdomen. Then slowly exhale the air out through your nose while counting to five.'},
    {'instructionID':5,'instructionMsg':'And we will repeat this deep breathing exercise for 2 minutes.'},
    {'instructionID':6,'instructionMsg':'If you are ready just click me anytime.'}
  ];

  $scope.startBreathing = function(num){
    $timeout.cancel(mytimeout);
    $scope.display = "INHALE";
    $scope.counter = 120;
    $scope.starter = false;

    $scope.onTimeout = function(){
        if ($scope.counter > 0){
        	if($scope.counter%10==5){
          	$scope.display = "EXHALE";
          }
          if($scope.counter%10==0){
          	$scope.display = "INHALE";
          }
        	$scope.counter--;

        } else{
        	$scope.finish = true;
          $scope.starter = $scope.finish;
        }
        mytimeout = $timeout(function(){$scope.onTimeout();},num);
    };
    mytimeout = $timeout(function(){$scope.onTimeout();},num);

  };

  $scope.delayMessage = function(){
    $timeout(function () {
          $scope.loadingIcon = false;
      }, 4000);
  };

}]);

angular.module("hadyWebApp").filter('secondsToDateTime', [function() {
    return function(seconds) {
        return new Date(1970, 0, 1).setSeconds(seconds);
    };
}]);
