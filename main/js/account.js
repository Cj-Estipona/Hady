angular.module("hadyWebApp").controller("AccountCtrl", ["$scope","$http","$compile","$window","$timeout","HadyService","$rootScope", function($scope, $http, $compile, $window, $timeout, HadyService,$rootScope){
  $scope.message = "ACCOUNT";
  var postId = "";
  var modal_img = angular.element('#imageModal');
  $scope.successful = false;
  $scope.toggle = {};
  $scope.userDetails ={};
  $scope.readonlyAttr = {};
  $scope.courseName = ["BSCS","BSIT","BSIS","BSEMC","ABB","ABJO","BSHRM","BSTM","BSA","BSAct","BSBA","MGE","BEC","FM","MKM","BSCE","BSCpE","BSEE","BSECE","BSME"];
  $scope.bgTheme = ["themeDefault","themeDarkSky","themeNightSky","themeHimalayas","themeMountainSky"];

  $scope.loadMethods = function(){
    $scope.getCourses();
    $scope.getUserInfo();
    $scope.getUserAvatar();
    $scope.getTextNotifStatus();
  };

  $scope.showHideAlert = function(){
    $scope.successful = false;
  };

  $scope.getTextNotifStatus = function(){
    $http.post("model/userProfile.php?action=textNotif")
    .then(function(response){
      if(response.data.textNotif == 1){
        $scope.toggle.switch = true;
      }
      else {
        $scope.toggle.switch = false;
      }

      if(response.data.allowStatus == 1){
        $scope.toggle.switch2 = true;
      }
      else {
        $scope.toggle.switch2 = false;
      }
      console.log(response.data);
    });
  };

  $scope.updateTextNotif = function(notifValue){
    $http.post("model/userProfile.php?action=updateTextNotif", {'passVar':notifValue})
    .then(function(response){
      if(response.data == "success"){
        $scope.toggle.switch = notifValue;
      } else {
        console.log("There are some errors");
      }
    });
  };

  $scope.updatePrivilage = function(allowValue){
    $http.post("model/userProfile.php?action=updatePrivilage", {'passVar':allowValue})
    .then(function(response){
      if(response.data == "success"){
        $scope.toggle.switch2 = allowValue;
      } else {
        console.log("There are some errors");
      }
    });
  };

  $scope.getUserAvatar = function(){
    //console.log("function call is perfect");
    $http.post("model/userProfile.php?action=getAvatar")
    .then(function(response){
      $scope.imgSrc = response.data;
      HadyService.setAvatarImg(response.data);
      //console.log(response.data);
    });
  };

  $scope.viewModalAvatar = function(){
    console.log("We will change the avatar");
    modal_img.modal('show');
    /*$http.post("model/userProfile.php?action=displayImage")
    .then(function(response){
      $scope.modalData = response.data;
      //console.log(response.data);
    });*/
  };

  $scope.updateAvatar = function(id){
    $http.post("model/userProfile.php?action=updateImage", {'passVar':id})
    .then(function(response){
      console.log(response.data);
      $scope.getUserAvatar();
      $scope.showAlertBox(true,"alert alert-success",response.data);
      modal_img.modal('hide');
    });
  };

  $scope.updatePassword = function(){
    $http.post("model/userProfile.php?action=updatePassword", {'passValue':$scope.updatePass})
    .then(function(response){
      //console.log(response.data);
      if(response.data != "success") {
        $scope.showAlertBox(true,"alert alert-danger",response.data);
      } else {
        $scope.showAlertBox(true,"alert alert-success","Your password was successfully updated!");
        $scope.updatePass = {};
      }
    });
  };

  $scope.getCourses = function(){
    $http.post("model/userProfile.php?action=getCourses")
    .then(function(response){
      //console.log(response.data);
      if(response.data.success) {
        $scope.courseName = response.data.courses;
      } else {
        $scope.showAlertBox(true,"alert alert-danger","Error retrieving courses.");
      }
    });
  };

  $scope.getUserInfo = function(){
    $http.post("model/userProfile.php?action=getInfo")
    .then(function(response){
      var dateCreated = new Date(response.data.DateCreated);
      var bdate = new Date(response.data.BDate);
      //console.log(response.data);
      $scope.userDetails = response.data;
      $scope.userDetails.BDate = bdate;
      $scope.dateCreated = dateCreated.toDateString();
      $scope.Nickname = response.data.Nickname;
      HadyService.setNickname(response.data.Nickname);
      $scope.Email = response.data.Email;
      $scope.FName = response.data.FName;
      $scope.MName = response.data.MName;
      $scope.LName = response.data.LName;
      $scope.BDate = bdate;
      $scope.MNumber = response.data.MNumber;
      $scope.studNumber = response.data.StudNumber;
      $scope.Course = response.data.Course;
      $scope.Theme = response.data.Theme;
      $rootScope.appBodyBG = response.data.Theme;
      $scope.fullName = $scope.FName +" "+ $scope.MName +" "+ $scope.LName;
    });
  };

  $scope.unsave = function(item){
    if(item == "fullName"){
      $scope[item] = $scope.userDetails.FName +" "+ $scope.userDetails.MName +" "+ $scope.userDetails.LName;
      $scope.FName = $scope.userDetails.FName;
      $scope.MName = $scope.userDetails.MName;
      $scope.LName = $scope.userDetails.LName;
      $scope.readonlyAttr[item] = false;
      console.log($scope[item]);
    } else {
      $scope[item] = $scope.userDetails[item];
      $scope.readonlyAttr[item] = false;
      console.log($scope[item]);
    }
  };

  $scope.updateUserInfo = function(item){
    if(item == "fullName"){
      $scope[item] = $scope.FName +" "+ $scope.MName +" "+ $scope.LName;
      //console.log($scope[item]);
      if($scope.FName == undefined || $scope.LName == undefined){
        $scope.showAlertBox(true,"alert alert-danger","Enter Value for First name and Last name.");
      } else {
        $scope.readonlyAttr[item] = false;
        console.log("Fullname", $scope[item]);
        $http.post("model/userProfile.php?action=updateUserInfoName", {'valFToUpdate':$scope.FName,'valMToUpdate':$scope.MName,'valLToUpdate':$scope.LName})
        .then(function(response){
          if(response.data=="success"){
            $scope.successful = false;
            //console.log("Val To Update", response.data);
          } else {
            $scope.showAlertBox(true,"alert alert-danger",response.data);
          }
        });
        $scope.getUserInfo();
      }
    } else if (item=="Theme") {
      $http.post("model/userProfile.php?action=updateUserTheme", {'varToUpdate':item,'valToUpdate':$scope[item]})
      .then(function(response){
        if(response.data=="success"){
          $scope.showAlertBox(true,"alert alert-success","You have successfully changed your theme.");
        } else {
          $scope.showAlertBox(true,"alert alert-danger",response.data);
        }
      });
      $scope.getUserInfo();
    } else {
      if($scope[item] == ""){
        $scope.showAlertBox(true,"alert alert-danger","Please enter a valid value.");
      } else if ($scope[item]==undefined) {
        $scope.showAlertBox(true,"alert alert-danger","Please check your input.");
      }  else {
        $http.post("model/userProfile.php?action=updateUserInfo", {'varToUpdate':item,'valToUpdate':$scope[item]})
        .then(function(response){
          if(response.data=="success"){
            $scope.successful = false;
            console.log("Val To Update", response.data);
          } else {
            $scope.showAlertBox(true,"alert alert-danger",response.data);
          }
        });
        $scope.getUserInfo();
      }
    }
    $scope.readonlyAttr[item] = false;
  };

  $scope.deleteAccount = function(){
    bootbox.confirm({
        title: "<b>DELETE ACCOUNT</b>",
        size: "small",
        message: "Confirm deletion of your account. This action cannot be undone. ",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Cancel',
                className: 'btn btn-default'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Delete',
                className: 'btn btn-danger'
            }
        },
        callback: function (result) {
            if(result){
              $http.post("model/deleteAccount.php")
              .then(function(response){
                if(response.data == "success" || typeof response.data == 'undefined'){
                  console.log(response.data);
                  $window.location.href = '../';
                } else {
                  console.log(response.data);
                  $scope.showAlertBox(true,"alert alert-danger",response.data);
                }
              });
            }else {
              console.log("cancel Delete");
            }
        }
    });
  };

  $scope.logout = function(){
    bootbox.confirm({
        title: "<b>Logout</b>",
        size: "small",
        message: "Are you sure you want to logout? ",
        buttons: {
            cancel: {
                label: '<i class="fa fa-times"></i> Cancel',
                className: 'btn btn-danger'
            },
            confirm: {
                label: '<i class="fa fa-check"></i> Accept',
                className: 'btn btn-info'
            }
        },
        callback: function (result) {
            if(result){
              $http.post("model/destroy.php")
              .then(function(response){
                if(response.data == "success" || typeof response.data == 'undefined'){
                  console.log(response.data);
                  $window.location.href = '../sign_in.php';
                } else {
                  console.log(response.data);
                  $scope.showAlertBox(true,"alert alert-danger",response.data);
                }
              });
            }else {
              console.log("cancel logout");
            }
        }
    });
  };

  $scope.showAlertBox = function(alertBool, alertClass, alertMessage) {
    $scope.successful = alertBool;
    $scope.alertClass = alertClass;
    $scope.alertMessage = alertMessage;
    $timeout(function () {
          $scope.successful = false;
      }, 7000);
  };

}]);

//for compiling ng-bind-html
angular.module('hadyWebApp').directive('compile', ['$compile', function ($compile) {
      return function(scope, element, attrs) {
          scope.$watch(
            function(scope) {
               // watch the 'compile' expression for changes
              return scope.$eval(attrs.compile);
            },
            function(value) {
              // when the 'compile' expression changes
              // assign it into the current DOM
              element.html(value);

              // compile the new DOM and link it to the current
              // scope.
              // NOTE: we only compile .childNodes so that
              // we don't get into infinite loop compiling ourselves
              $compile(element.contents())(scope);
            }
        );
    };
}]);

//for focusing into input fields
angular.module('hadyWebApp').directive('focusMe', ['$timeout', '$parse', function ($timeout, $parse) {
    return {
        //scope: true,   // optionally create a child scope
        link: function (scope, element, attrs) {
            var model = $parse(attrs.focusMe);
            scope.$watch(model, function (value) {
                //console.log('value=', value);
                if (value === true) {
                    $timeout(function () {
                        element[0].focus();
                    });
                }
            });
            // to address @blesh's comment, set attribute value to 'false'
            // on blur event:
            element.bind('blur', function () {
                //console.log('blur');
                scope.$apply(model.assign(scope, false));
            });
        }
    };
}]);
