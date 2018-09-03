angular.module("hadyWebApp").controller("ChatCtrl", ["$scope","$http","$timeout","$rootScope","HadyService", function($scope,$http,$timeout,$rootScope,HadyService){
  var accessToken = "665ec95a9fea48ce920cc60b2ff924c1",
    baseUrl = "https://api.dialogflow.com/v1/",
    $speechInput,
    $recBtn,
    recognition,
    messageRecording = "Recording...",
    messageCouldntHear = "I couldn't hear you, could you say that again?",
    messageInternalError = "Oh no, there has been an internal server error",
    messageSorry = "I'm sorry, I don't have the answer to that yet.";
  $scope.quickReplies = [];
  $scope.loadingChat = false;
  $scope.userIDsession = "";
  $scope.phqActions = ['phqQuestion-2', 'phqQuestion-3', 'phqQuestion-4', 'phqQuestion-5', 'phqQuestion-6', 'phqQuestion-7', 'phqQuestion-8', 'phqQuestion-9', 'phqQuestion-Thanks', 'phqQuestionDifficulties'];
  /*for (var i = 0; i < 5; i++) {
    $scope.quickReplies[i] = "Button " + i;
  }*/
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
  $scope.leftDp = {
    "float" : "left",
    "width" : "32px",
    "height" : "32px",
    "margin" : "8px 5px 8px 5px"
  };
  $scope.rightDp = {
    "float" : "right",
    "width" : "32px",
    "height" : "32px",
    "margin" : "8px 5px 8px 5px"
  };
  //$scope.getStarted = true;
  $scope.chatContent = [];

  //get the text from speech or type and send it
  $scope.SetText = function(text) {
    $scope.userMessage = text;
    $scope.Send();
  };

  //Load The Whole Chat
  $scope.LoadChat = function(){
    $http.post("model/chatHady.php?action=loadMessages")
    .then(function(response){
      $scope.chatContent = response.data.chat;
    });
  };

  //Send To Database
  $scope.ToDB = function(message, who){
    $http.post("model/chatHady.php?action=sendMessage",  {'passMessage':message,'passWho':who})
    .then(function(response){
      if (response.data.success) {
        $scope.LoadChat();
        $scope.userMessage = "";
      }
    });
  };

  $scope.PrepareResponse = function(val) {
    console.log(val);
    var indexSpeech;
    var indexPayload;
    var indexContexts;
    var spokenResponse = "";
    var debugJSON = JSON.stringify(val, undefined, 2);
    if (val.status.code != 200) {
      bootbox.alert({
          title: "<b>Sorry!</b>",
          size: "small",
          message: "Hi " + $scope.nickname + "! I am sorry but there seems to be a problem with our Internal server. ",
          closeButton: false,
          callback: function () {
          var sendData = {event:{name:'PHQQUESTIONREADY' /*data:{name:$scope.nickname}*/}, contexts:[{name:'MainPHQ-9-followup',lifespan:5}], lang: 'en', sessionId: $scope.userIDsession};
            $scope.queryData(sendData);
          }
      });
    }

    //indexing the messages and payload
    for (var i = 0; i < val.result.fulfillment.messages.length; i++) {
      if (val.result.fulfillment.messages[i].type == 0) {
        indexSpeech = i;
      } else if (val.result.fulfillment.messages[i].type == 4) {
        indexPayload = i;
      }
    }

    //PHQ Additional
    if (val.result.action == 'toDoMenu1') {
      $http.post("model/chatHady.php?action=setScore")
      .then(function(response){
        if (response.data.success) {
          console.log('SUCESSFUL SET SCORE');
        }else {
          console.log('NOT SUCCESSFUL SET');
        }
      });
    }

    //check if it is phq
    for (var z = 0; z < $scope.phqActions.length; z++) {
      if (val.result.action == $scope.phqActions[z]) {
        if (val.result.action != 'phqQuestionDifficulties') {
          console.log("ACTION",val.result.action);
          console.log("SCORE",val.result.parameters.PhqScore);
          $scope.StoreScore(val.result.action, val.result.parameters.PhqScore);
          break;
        } else {
          console.log("ACTION",val.result.action);
          console.log("SCORE",val.result.parameters.PhqConfirmation);
          $scope.StoreScore(val.result.action, val.result.parameters.PhqConfirmation);
          //indexing for contexts
          for (var j = 0; j < val.result.contexts.length; j++) {
            if (val.result.contexts[j].name == "suicidalSevere") {
              $scope.counselling();
              break;
            }
          }
          break;
        }
      }
    }


    //pass the response
    spokenResponse = val.result.fulfillment.messages[indexSpeech].speech;

    //setting the payload
    if (indexPayload > -1) {
      console.log(val.result.fulfillment.messages[indexPayload].payload.replies);
      for (var k = 0; k < val.result.fulfillment.messages[indexPayload].payload.replies.length; k++) {
        $scope.quickReplies[k] = val.result.fulfillment.messages[indexPayload].payload.replies[k];
      }
    } else {
      $scope.quickReplies = [];
    }


    console.log(val.result.fulfillment.messages.length);

    //You display each message via respond() and debugRespond()
    $scope.ToDB(spokenResponse, 'bot');
    //$scope.Respond(spokenResponse);
    //$scope.DebugRespond(debugJSON);
  };

  $scope.DebugRespond = function(val){

  };

  $scope.Respond = function(val){

  };

  $scope.StoreScore = function(action, actionValue){
    $http.post("model/chatHady.php?action=storeScore", {'action':action,'actionValue':actionValue})
    .then(function(response){
      if (response.data.success) {
        console.log("RECORDED");
      } else {
        console.log("NOT RECORDED");
      }
    });
  };

  //method for sending the text in dialogflow
  $scope.Send = function(){
    console.log($scope.userMessage);
    var text = $scope.userMessage;
    $scope.quickReplies = [];
    //var sendData = {event:{name:'PHQQUESTION-2'}, contexts:[{name:'PHQ-9Main-followup',lifespan:5}], lang: 'en', sessionId: 'yaydevdiners'};
    if ($.trim(text)) {
      var sendData = {query: text, lang: 'en', sessionId: $scope.userIDsession};
      $scope.queryData(sendData);
      //sendToDB(text, "user");
      //$('#messageFrm').submit();
      $scope.ToDB(text, 'user');
    }
  };

  //end chat from prototype


  $http.post("model/chatHady.php?action=checkChat")
  .then(function(response){
    if (response.data.successCheck) {
      $scope.talkThe = response.data.talkThe;
      console.log("talkThe", response.data.talkThe);
      $scope.userIDsession = response.data.userIDsession;
      console.log(response.data.chatUse);
      $scope.nickname = response.data.nickname;
      $scope.userName = response.data.userName;
      if (response.data.chatUse % 2 == 0) {
        $scope.getStarted = true;
        $timeout(function () {
                $scope.typedjs('typedHeaders');
          }, 500);
      } else {
        $scope.LoadChat();
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
        $.ajax({
          type: "POST",
          url: baseUrl + "query?v=20170712",
          contentType: "application/json; charset=utf-8",
          dataType: "json",
          headers: {
            "Authorization": "Bearer " + accessToken
          },
          data: JSON.stringify({query: $scope.userName, lang: "en", sessionId: $scope.userIDsession}),

          //When you receive a response, you run prepareResponse()
          success: function(data) {
            $scope.PrepareResponse(data);
          },
          error: function() {
            $scope.Respond(messageInternalError);
          }
        });
        //$scope.LoadChat();
        $scope.getStarted = false;
      } else {
        console.log("THERE IS AN ERROR SETTING CHAT");
      }
    });
  };

  $scope.queryData = function(dataSent){
    $scope.loadingChat = true;
    $.ajax({
      type: "POST",
      url: baseUrl + "query?v=20170712",
      contentType: "application/json; charset=utf-8",
      dataType: "json",
      headers: {
        "Authorization": "Bearer " + accessToken
      },
      data: JSON.stringify(dataSent),

      //When you receive a response, you run prepareResponse()
      success: function(data) {
        //2 seconds delay
        $timeout( function(){
            $scope.PrepareResponse(data);
            $scope.loadingChat = false;
        }, 1500 );

      },
      error: function() {
        $scope.loadingChat = false;
        $scope.Respond(messageInternalError);
      }
    });
  };

  $scope.Trial = function(){
    $http.post("model/chatHady.php?action=trial")
    .then(function(response){
      if (response.data.success) {
        console.log(response.data.part);
        console.log("TOTAL SCORE",response.data.totalScore);
        console.log("STATUS",response.data.depressionStatus);
      } else {
        console.log("NOT RECORDED");
      }
    });
  };

  $scope.counselling = function(){
    $http.post("model/chatHady.php?action=counselling")
    .then(function(response){
      if (response.data.success) {
        $scope.talkThe = true;
      } else {
        $scope.talkThe = false;
        console.log("DATABASE ERROR");
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
