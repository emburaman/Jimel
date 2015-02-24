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



// // "myAwesomeDropzone" is the camelized version of the HTML element's ID
// Dropzone.options.profilePicture = {
//   paramName: "file", // The name that will be used to transfer the file
//   maxFilesize: 0.256, // MB
//   maxFiles: 1,
// 	addRemoveLinks: true,
//   // removedfile: function(file) {
//   //   deletefile(file.name);
//   // },

//   accept: function(file, done) {
//     if (file.name == "justinbieber.jpg") {
//       done("Naha, you don't.");
//     }
//     else { done(); }
//   },

//   init: function() {
//     this.filespath.removeAttribute('multiple');
//     this.on("success", function(file, response) {
//       file.serverId = response; 

      
//     });
//     this.on("removedfile", function(file) {
//       deletefile(file.name);
//     });
//     this.on("maxfilesexceeded", function(file){
//         alert("No more files please!");
//     });
//   }  
// };

// // Function to call delete.php file  - Added by InfoTuts.com
// function deletefile(value) {
//   var xmlhttp;
//   if (window.XMLHttpRequest) {// code for IE7+, Firefox, Chrome, Opera, Safari
//     xmlhttp=new XMLHttpRequest();
//   } else {// code for IE6, IE5
//     xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
//   }

//   xmlhttp.onreadystatechange=function() {
//     if (xmlhttp.readyState==4 && xmlhttp.status==200) {
//       //alert(xmlhttp.responseText);
//     }
//   }

//   xmlhttp.open("GET","file_delete.php?filename="+value,true);
//   xmlhttp.send();
// }