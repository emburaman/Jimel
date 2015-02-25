<?php
$err = false;
$errmsg = "";


if (isset($_POST['userid']) || isset($_POST['password'])) {
	if ($_POST['userid'] == "" || $_POST['password'] == "") {
		$err = true;
		$errmsg = "Preencha os campos corretamente.";
	}

  if ($_POST['userid'] != "" || $_POST['password'] != "") {
    
    include_once('class/db.class.php');

    $db = new DB();
    $db->query('SELECT * FROM tb_users WHERE userid = :userid AND password = :password');
    $db->bind(':userid', $_POST['userid']);
    $db->bind(':password', sha1($_POST['password']));
    $row = $db->single();

    if ($db->rowCount() == 1) {
      $_SESSION['jimel']['userid'] = $row['userid'];
      $_SESSION['jimel']['full_name'] = $row['full_name'];
      $_SESSION['jimel']['profile'] = $row['profile'];
      $_SESSION['jimel']['photo_path'] = $row['photo_path'];

      header("Location: /");
      die();
    }
    else {
      $err = true;
      $errmsg = "Não foi possível fazer login. Certifique-se de que os dados informados estão corretos.";
    }
  }
}
?>

<h4>Login</h4>
<md-content class="md-padding md-form">
  <form novalidate name="userForm" method="POST" action="/entrar" <?php if ($err == true) { echo 'ng-init="showErrorToast(\'' . $errmsg . '\')"'; } ?> >
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

<md-content class="md-padding" layout layout-sm="column">
  <md-button class="md-raised" ng-href="/registrar">Registrar</md-button>
</md-content>
