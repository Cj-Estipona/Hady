angular.module("hadyWebApp").controller("ChatCtrl", ["$scope","$http","$timeout", function($scope,$http,$timeout){
  $scope.updates = ["Hi there,","I'm Hady"];
  $scope.leftChat = {
    "float" : "left",
    "background" : "#e1e1e1",
    "color" : "#000000"
  };
  $scope.rightChat = {
    "float" : "right",
    "background" : "#00aabb",
    "color" : "#ffffff"
  };
  //$scope.getStarted = true;
  $scope.chatContent = [
    {"id":1,"sentBy":"Christian","message":"Hiii!","sentDate":"12:07 pm"},
    {"id":2,"sentBy":"Hady","message":"Hello Sample! :) It's nice to meet you!","sentDate":"12:08 pm"},
    {"id":3,"sentBy":"Christian","message":"Nice to meet you too.","sentDate":"12:08 pm"},
    {"id":4,"sentBy":"Hady","message":"By the way I'm Hady! I am a chatbot counselor that was trained to help people like you.","sentDate":"12:09 pm"},
    {"id":5,"sentBy":"Christian","message":"Uhhhmm.. What is a chatbot?","sentDate":"12:09 pm"},
    {"id":6,"sentBy":"Hady","message":"That's a good question! A chatbot is a software which makes use of artificial intelligence to imitate human communication.","sentDate":"12:09 pm"},
    {"id":7,"sentBy":"Hady","message":"And you don't need to be afraid of me because even though I am just a program I can be your friend.","sentDate":"12:10 pm"},
    {"id":8,"sentBy":"Christian","message":"I see. It's good to know that I have someone to talk to.","sentDate":"12:10 pm"},
    {"id":8,"sentBy":"Hady","message":"In addition, I was also trained to deliver a CBT especially for the youths like you.","sentDate":"12:11 pm"},
    {"id":8,"sentBy":"Christian","message":"What is CBT?","sentDate":"12:11 pm"},
    {"id":8,"sentBy":"Hady","message":"Thanks for asking. CBT or Cognitive Behavioral Therapy is one of the cognitive strategies or techniques that aim to test and portray your negative thoughts. This technique is developed to teach you how to monitor your thoughts, to know the connections between cognition and behavior, to examine the evidence of the distorted behavior, to alter dysfunctional beliefs and to give you more reality-based interpretations instead of biased cognition.","sentDate":"12:12 pm"},
    {"id":8,"sentBy":"Christian","message":"That's nice!","sentDate":"12:13 pm"},
    {"id":9,"sentBy":"Hady","message":"Ok Sample, Here's the thing. I am here to help you with your thoughts. And I am very excited to assist you :). ","sentDate":"12:13 pm"},
    {"id":10,"sentBy":"Christian","message":"Ok? What should I do?","sentDate":"12:14 pm"},
    {"id":11,"sentBy":"Hady","message":"First of all, I need to do some test on you. Don't worry it is just a 9 question. We call it The PHQ-9. Are you ready?","sentDate":"12:14 pm"},
    {"id":12,"sentBy":"Christian","message":"Wait, what is a PHQ-9 Scale","sentDate":"12:15 pm"},
    {"id":13,"sentBy":"Hady","message":"A PHQ-9 is given to patients in a primary care setting to screen for the presence and severity of depression. Ready?","sentDate":"12:15 pm"},
    {"id":14,"sentBy":"Christian","message":"Yes, I am Ready!","sentDate":"12:16 pm"}
  ];

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
