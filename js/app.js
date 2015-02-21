var app = angular.module('JimelApp', ['ngMaterial']);

app.config(function($mdThemingProvider) {
  $mdThemingProvider.theme('default')
    .primaryPalette('blue', {
    })
    .accentPalette('lime', {
    })
    .warnPalette('red', {
    });
});

app.controller('AppCtrl', function($scope, $timeout, $mdSidenav, $log) {
  $scope.toggleSidenav = function() {
    $mdSidenav('left').toggle()
                      .then(function(){
                          $log.debug("toggle left is done");
                      });
  };
});
app.controller('LeftCtrl', function($scope, $timeout, $mdSidenav, $log) {
  $scope.close = function() {
    $mdSidenav('left').close()
                      .then(function(){
                        $log.debug("close LEFT is done");
                      });
  };
});
