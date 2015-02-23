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

app.controller('AppCtrl', function($scope, $timeout, $mdSidenav, $log, $mdToast, $animate) {
  $scope.toastPosition = {
    bottom: true,
    top: true,
    left: true,
    right: true
  };
  $scope.getToastPosition = function() {
    return Object.keys($scope.toastPosition)
      .filter(function(pos) { return $scope.toastPosition[pos]; })
      .join(' ');
  };
  $scope.showErrorToast = function(message) {
    $mdToast.show({
    	controller: 'ToastCtrl',
			template:'<md-toast class="md-warn"><span flex>' + message + '</span><md-button ng-click="closeToast()"><i class="mdi mdi-close"></i></md-button></md-toast>',
      hideDelay: 60000,
      position: $scope.getToastPosition()
    });
  };

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

app.controller('ToastCtrl', function($scope, $mdToast) {
  $scope.closeToast = function() {
    $mdToast.hide();
  };
});