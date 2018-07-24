angular.module("hadyWebApp").controller("ChatCtrl", ["$scope","$http","$timeout", function($scope,$http,$timeout){
  $scope.updates = ["Hi there,","I'm Hady"];
  //$scope.getStarted = true;

  $http.post("model/chatHady.php?action=checkChat")
  .then(function(response){
    if (response.data.successCheck) {
      console.log(response.data.chatUse);
      if (response.data.chatUse % 2 == 0) {
        $scope.getStarted = true;
        $timeout(function () {
                $scope.typedjs('typedHeaders');
          }, 500);
      } else {
        $scope.getStarted = false;
      }
    } else {
      $scope.errorMsg = "There was some error checking the chat.";
    }
  });

  $scope.setChat = function(){
    $http.post("model/chatHady.php?action=setChat")
    .then(function(response){
      if (response.data.success) {
        $scope.getStarted = false;
      } else {
        console.log("THERE IS AN ERROR SETTING CHAT");
      }
    });
  };


$scope.typedjs = function(loc){
  //typed.js function
  var typed = new Typed('#'+loc,{
    strings: $scope.updates,
    backSpeed: 40,
    typeSpeed: 60,
    backDelay: 1500,
  });
};
}]);
