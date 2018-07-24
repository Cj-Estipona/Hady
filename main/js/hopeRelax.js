angular.module("hadyWebApp").controller("HopeCtrl", ["$scope","$timeout","$interval","$http", function($scope,$timeout,$interval,$http){
  $scope.finish = false;
  $scope.counter = 90;
  var mytimeout;
  $scope.missesAllowed = 6;
  $scope.numMisses = 0;
  $scope.initiate = false;

  var words = {};
  $http.get("model/quotesData.json")
  .then(function(response){
      words = response.data;
      console.log("NICEESuUU");
      $scope.initiate = true;
      //appRun();
      var getRandomWord = function() {
        var index = Math.floor(Math.random() * words.length);
        return words[index].quote;
      };

      var makeLetters = function(word) {
        return _.map(word.split(''), function(character) {
          return { name: character, chosen: false };
        });
      };

      var revealSecret = function() {
        _.each($scope.secretWord, function(letter) {
          letter.chosen = true;
        });
      };

      var checkForEndOfGame = function() {
        $scope.win = _.reduce($scope.secretWord, function(acc, letter) {
          return acc && letter.chosen;
        }, true);

        if (!$scope.win && $scope.numMisses === $scope.missesAllowed) {
          $scope.lost = true;
          $timeout.cancel(mytimeout);
          revealSecret();
        }
      };

      var timerCheck = function(){
        if ($scope.win) {
          $timeout.cancel(mytimeout);
        }
      };

      $scope.try = function(guess) {
        guess.chosen = true;
        var found = false;
        _.each($scope.secretWord,
               function(letter) {
                 if (guess.name.toUpperCase() === letter.name.toUpperCase()) {
                   letter.chosen = true;
                   found = true;
                 }
               });
        if (!found) {
          $scope.numMisses++;
        }
        checkForEndOfGame();
        timerCheck();
      };

      $scope.letters = makeLetters("abcdefghijklmnopqrstuvwxyz,. ");


      $scope.reset = function(check) {
        _.each($scope.letters, function(letter) {
          letter.chosen = false;
        });
        $scope.secretWord = makeLetters(getRandomWord());
        $scope.numMisses = 0;
        $scope.win = false;
        $scope.lost = false;
        $scope.counts = [false,false,false];
        if ($scope.secretWord.indexOf(',')) {
          $scope.counts[0] = true;
        }
        if ($scope.secretWord.indexOf('.')) {
          $scope.counts[1] = true;
        }
        if ($scope.secretWord.indexOf(' ')){
          console.log("HAHAHAH");
          $scope.counts[2] = true;
        }

        for (var i = 0; i < $scope.counts.length; i++) {
          if ($scope.counts[i]) {
            $scope.try($scope.letters[26+i]);
          }
        }

        if (check) {
          $scope.startTimer(1000);
        }

      };

      $scope.reset(false);
  });


  $scope.startTimer = function(num){
    $timeout.cancel(mytimeout);
    $scope.counter = 90;
    $scope.starter = false;

    $scope.onTimeout = function(){
        if ($scope.counter > 0){
          $scope.counter--;
        } else{
          $scope.finish = true;
          $scope.lost = true;
          revealSecret();
        }
        mytimeout = $timeout(function(){$scope.onTimeout();},num);
    };
    mytimeout = $timeout(function(){$scope.onTimeout();},num);

  };


  var revealSecret = function() {
    _.each($scope.secretWord, function(letter) {
      letter.chosen = true;
    });
  };

  var dialog = bootbox.dialog({
    title: 'How to Play?',
    message: "<div class='col-sm-5'><div class='speech-bubble'><p>This is a quick and easy activity. All you need to do is try to guess the phrase by asking what letters it contains.</p></div><div class='speech-bubble'><p>If you are ready please press the \"Start\" button</p></div></div><div clas='col-sm-7'><img src='../resources/1530340779585_COUNSELOR CLIEN.png' class='img-responsive' alt='Hady Logo' id='HadyAvatar' style='height:300px;width:100%px;'></div>",
    buttons: {
        ok: {
            label: "Start",
            className: 'btn-info',
            callback: function(){
                //Example.show('Custom OK clicked');
                //$scope.try($scope.letters[26]);
                $scope.startTimer(1000);
            }
        }
    }
  });


}]);

angular.module("hadyWebApp").filter('secondsToDateTime', [function() {
    return function(seconds) {
        return new Date(1970, 0, 1).setSeconds(seconds);
    };
}]);
