angular.module("hadyWebApp").controller("IndexCtrl", ["$scope","HadyService","$timeout","$rootScope","$http", function($scope, HadyService, $timeout, $rootScope,$http){
  $scope.loadBG = function(){
      $http.post("model/userProfile.php?action=getInfo")
      .then(function(response){
        HadyService.setBgName(response.data.Theme);
        $scope.getBG();
      });
  };

  $scope.getBG=function(){
    console.log(HadyService.getBgName());
    $rootScope.appBodyBG = HadyService.getBgName();
  };


}]);
