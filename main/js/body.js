angular.module("hadyWebApp").controller("IndexCtrl", ["$scope","HadyService","$timeout","$rootScope","$http", function($scope, HadyService, $timeout, $rootScope,$http){
  $scope.loadResource = function(){
      $http.post("model/userProfile.php?action=getInfo")
      .then(function(response){
        $rootScope.Nickname = response.data.Nickname;
        HadyService.setBgName(response.data.Theme);
        $scope.getBG();
      });
      $http.post("model/userProfile.php?action=getAvatar")
      .then(function(response){
        $rootScope.avatarSrc = response.data;
      });
  };

  $scope.getBG=function(){
    console.log(HadyService.getBgName());
    $rootScope.appBodyBG = HadyService.getBgName();
  };




}]);
