<?php
$err = false;
$errmsg = "";

if (isset($_POST['userid']) || isset($_POST['password'])) {
	if ($_POST['userid'] == "" || $_POST['password'] == "") {
		$err = true;
		$errmsg = "Preencha os campos corretamente.";
	}
}
?>

<h4>Login</h4>
<md-content class="md-padding md-form">
  <form novalidate name="userForm" method="POST" action="/login" <?php if ($err == true) { echo 'ng-init="showErrorToast(\'' . $errmsg . '\')"'; } ?> >
    <div layout layout-sm="column">
			<md-input-container flex>
        <label>Usuário</label>
        <input required name="userid" ng-model="user.userid">
        <div ng-messages="userForm.userid.$error">
          <div ng-message="required">Este campo é requerido.</div>
        </div>
      </md-input-container>

	    <md-input-container flex>
	      <label>Senha</label>
	      <input type="password" name="password" ng-model="user.password">
	      <div ng-messages="userForm.password.$error">
	        <div ng-message="required">Este campo é requerido.</div>
	      </div>
	    </md-input-container>
		</div>	    

    <div layout>
	    <md-button class="md-raised md-primary">Entrar</md-button>
    </div>

  </form>
</md-content>

<md-content class="md-padding">
	<md-button><i class="mdi mdi-facebook-box"></i> Entrar com Facebook</md-button>
  <md-button><i class="mdi mdi-google-plus"></i> Entrar com sua conta Google</md-button>
</md-content>

<md-content class="md-padding">
  <md-button >Registrar</md-button>
</md-content>
