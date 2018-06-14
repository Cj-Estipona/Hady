angular.module("hadyWebApp").controller("TodayCtrl", ["$scope", function($scope){
  $scope.message = "This is the Today Page";
  $scope.verticalSlider6 = {
  value: 6,
  options: {
    floor: 0,
    ceil: 6,
    vertical: true,
    showSelectionBar: true,
    showTicksValues: true
  }
};

}]);
