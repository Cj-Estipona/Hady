angular.module("hadyWebApp").controller("ContactCtrl", ["$scope","$timeout","$interval","$http", function($scope,$timeout,$interval,$http){
  $scope.message = "PSCAP DIRECTORY FELLOWS";
  $scope.first = true;
  $scope.second = false;
  $scope.third = false;
  $scope.activeView = 1;
  $scope.directories1 = [];
  $scope.directories2 = [];
  $scope.directories3 = [];
  $scope.directories4 = [];
  $scope.directories5 = [];

  $http.get("model/directory.json")
  .then(function(response){
      //$scope.directories = response.data;
      for (var i = 0; i < response.data.length; i++) {
        if (i<5) {
          $scope.directories1.push(response.data[i]);
        } else if (i>=5 && i<10) {
          $scope.directories2.push(response.data[i]);
        } else if (i>=10 && i<15) {
          $scope.directories3.push(response.data[i]);
        } else if (i>=15 && i<20) {
          $scope.directories4.push(response.data[i]);
        } else {
          $scope.directories5.push(response.data[i]);
        }

      }
      //console.log(response.data);

      $scope.setActivePage = function(pageView){
        if (pageView == 1) {
          $scope.first = true;
          $scope.second = false;
          $scope.third = false;
          $scope.activeView = pageView;
        } else if (pageView == 2) {
          $scope.first = false;
          $scope.second = true;
          $scope.third = false;
          $scope.activeView = pageView;
        } else {
          $scope.first = false;
          $scope.second = false;
          $scope.third = true;
          $scope.activeView = pageView;
        }
      };

      $scope.next = function(){
        var currentPage = $scope.activeView;
        currentPage++;
        if (currentPage > 3) {
          $scope.setActivePage(3);
        } else {
          $scope.setActivePage(currentPage);
        }
      };
      $scope.previous = function(){
        var currentPage = $scope.activeView;
        currentPage--;
        if (currentPage < 1) {
          $scope.setActivePage(1);
        } else {
          $scope.setActivePage(currentPage);
        }
      };
  });


}]);
