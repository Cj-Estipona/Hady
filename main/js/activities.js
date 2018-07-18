angular.module("hadyWebApp").controller("ActivitiesCtrl", ["$scope","$http","$location", function($scope,$http,$location){
  $scope.message = "ACTIVITIES";

  $scope.activityList = [
    {"id": 8, "activityTitle": "Samsung", "activityBody": "YEYEBONEL"},
    {"id": 9, "activityTitle": "Iphone", "activityBody": "OHYEAH"},
    {"id": 10, "activityTitle": "Asus", "activityBody": "SHINGALING"},
    {"id": 11, "activityTitle": "Huawei", "activityBody": "CHONGKWAYLA"},
    {"id": 12, "activityTitle": "MyPhone", "activityBody": "ABUTCHIKIE"},
  ];

}]);
