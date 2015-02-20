<!DOCTYPE html>
<html lang="en" ng-app="JimelApp">
  <head>
		<title></title>
		<meta charset="UTF-8">

    <link rel="stylesheet" href="//ajax.googleapis.com/ajax/libs/angular_material/0.7.1/angular-material.min.css">
		<link rel="stylesheet" href="css/materialdesignicons.css">
		<link rel="stylesheet" href="css/style.css">
  </head>
  <body layout="column" ng-controller="AppCtrl">
  	<!-- Top Header -->
    <md-toolbar layout="row">
      <button ng-click="toggleSidenav('left')" hide-gt-sm class="menuBtn">
        <span class="visually-hidden">Menu</span>
      </button>
      <h1>Jimel</h1>
    </md-toolbar>

    <div layout="row" flex>
    	<!-- Side Navigation -->
      <md-sidenav layout="column" class="md-sidenav-left md-whiteframe-z2" md-component-id="left" md-is-locked-open="$media('gt-sm')">
        
      </md-sidenav>

      <!-- Main Content Area -->
      <div layout="column" flex id="content">
        <md-content layout="column" flex class="md-padding">
          



<i class="mdi mdi-account"></i>  <!-- bell -->





        </md-content>
        <!-- End of Main Content -->

      </div>
    </div>
    <!-- Angular Material Dependencies -->
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.6/angular.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.6/angular-animate.min.js"></script>
    <script src="//ajax.googleapis.com/ajax/libs/angularjs/1.3.6/angular-aria.min.js"></script>

    <script src="//ajax.googleapis.com/ajax/libs/angular_material/0.7.1/angular-material.min.js"></script>
    <script src="js/app.js"></script>
  </body>
</html>