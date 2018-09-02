angular.module("hadyWebApp").controller("ActivitiesCtrl", ["$scope","$http","$location", function($scope,$http,$location){
  $scope.message = "ACTIVITIES";
  $scope.msgFromGCO = "";
  $scope.timeOfMeeting = "";
  $scope.hasMsg = false;

  /*$scope.activityList = [
    {"id": 8, "activityTitle": "Samsung", "activityBody": "YEYEBONEL"},
    {"id": 9, "activityTitle": "Iphone", "activityBody": "OHYEAH"},
    {"id": 10, "activityTitle": "Asus", "activityBody": "SHINGALING"},
    {"id": 11, "activityTitle": "Huawei", "activityBody": "CHONGKWAYLA"},
    {"id": 12, "activityTitle": "MyPhone", "activityBody": "ABUTCHIKIE"},
  ];*/

  $scope.activityList = [];

  $scope.getLearn = function(){
    $http.post("model/activity.php?action=getLearn")
    .then(function(response){
      console.log(response.data);
      if(response.data.success){
        $scope.activityList = response.data.dataFile;
      } else {
        console.log("ERROR");
      }
    });
  };

  $scope.getNotif = function(){
    $http.post("model/activity.php?action=getNotif")
    .then(function(response){
      console.log(response.data);
      if(response.data.success){
        $scope.hasMsg = true;
        $scope.msgFromGCO = response.data.msg;
        var start = response.data.start;
        var end = response.data.end;

        $scope.timeOfMeeting = start +" - "+ end;
      } else {
        $scope.hasMsg = false;
      }
    });
  };

}]);
