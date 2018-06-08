var app = angular.module('hadyWebApp', ['ngRoute','ngSanitize']);


app.config(['$routeProvider','$locationProvider', function($routeProvider,$locationProvider){
  $locationProvider.hashPrefix('');

  $routeProvider
  .when('/', {
    templateUrl: 'template/today.html',
    controller: 'TodayCtrl'
  })
  .when('/moodTrack', {
    templateUrl: 'template/moodTrack.html',
    controller: 'MoodTrackCtrl'
  })
  .when('/chat', {
    templateUrl: 'template/chat.html',
    controller: 'ChatCtrl'
  })
  .when('/activities', {
    templateUrl: 'template/activities.html',
    controller: 'ActivitiesCtrl'
  })
  .when('/account', {
    templateUrl: 'template/account.html',
    controller: 'AccountCtrl'
  })
}]);
