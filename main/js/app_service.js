angular.module("hadyWebApp").service('HadyService', function($http, $rootScope){
  this.bgName = "";


  this.getBgName = function(){
    return this.bgName;
  };

  this.setBgName = function(data) {
    this.bgName = data;
  };

  this.setAvatarImg = function(data) {
    $rootScope.avatarSrc = data;
  };

  this.setNickname = function(data) {
    $rootScope.Nickname = data;
  };


});
