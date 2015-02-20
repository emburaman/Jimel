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
      <p class="toolbar-title">Jimel</p>

      <!-- Login/Logout User Bar -->
      <div class="account-box">
        <?php 
        if (isset($_SESSION['jimel']['session-id'])) {
        ?>
        <div class="logged-out">
          <button><i class="mdi mdi-login"></i> Login</button>
          <button><i class="mdi mdi-account-plus"></i> Registrar</button>
        </div>

        <?php } else { ?>
        <div class="logged-in">
          <a href="/account"><img class="account-img" src="img/account.jpg" /> Lincoln Souza</span></a>
          <button><i class="mdi mdi-logout"></i></button>
        </div>
        <?php } ?>
      </div>
    </md-toolbar>

    <div layout="row" flex>
    	<!-- Side Navigation -->
      <md-sidenav layout="column" class="md-sidenav-left md-whiteframe-z2" md-component-id="left" md-is-locked-open="$media('gt-sm')">
      </md-sidenav>

      <!-- Main Content Area -->
      <div layout="column" flex id="content">
        <md-content layout="column" flex class="md-padding">
