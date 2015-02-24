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

<h4>Registrar</h4>
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
	    <md-input-container flex>
 	      <label>Repita a Senha</label>
	      <input type="password" name="password" ng-model="user.passwordrepeat">
	      <div ng-messages="userForm.passwordrepeat.$error">
	        <div ng-message="required">Este campo é requerido.</div>
	      </div>
	    </md-input-container>
		</div>	    

			<md-input-container flex>
        <label>Nome</label>
        <input required name="full_name" ng-model="user.full_name">
        <div ng-messages="userForm.full_name.$error">
          <div ng-message="required">Este campo é requerido.</div>
        </div>
      </md-input-container>

			<md-input-container flex>
        <label>Aniversário</label>
        <input type="date" required name="birthdate" ng-model="user.birthdate">
        <div ng-messages="userForm.birthdate.$error">
          <div ng-message="required">Este campo é requerido.</div>
        </div>
      </md-input-container>

    <div layout>
	    <md-button class="md-raised md-primary">Entrar</md-button>
    </div>

  </form>
</md-content>

<md-content class="md-padding">
  <md-button >Salvar registro</md-button>
</md-content>

