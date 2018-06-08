angular.module("hadyWebApp").controller("AccountCtrl", ["$scope","$http", function($scope, $http){
  $scope.message = "This is the Account Page";
  var postVariable = "";

  $scope.loadMethods = function(){
    $scope.getUserAvatar();
  };

  $scope.getUserAvatar = function(){
    //console.log("function call is perfect");
    postVariable = "getAvatar";
    $http.post("model/userProfile.php", {'action':postVariable})
    .then(function(response){
      $scope.imgSrc = response.data;
      //console.log(response.data);
    });
  };

  $scope.viewModalAvatar = function(){
    console.log("We will change the avatar");
    var modal_img = angular.element('#imageModal');
    modal_img.modal('show');
    postVariable = "displayImage";
    $http.post("model/userProfile.php", {'action':postVariable})
    .then(function(response){
      $scope.modalData = response.data;
      //console.log(response.data);
    });
  };


}]);
