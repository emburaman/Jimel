<?php
$err = false;
$errmsg = "";

if (isset($_POST) && !empty($_POST)) {
	if ($_POST['userid'] == "" || $_POST['password'] == "" || $_POST['passwordrepeat'] =="" || $_POST['email'] =="" || $_POST['full_name'] =="") {
		$err = true;
		$errmsg = "Preencha os campos corretamente.";
	}

  if ($_POST['password'] != $_POST['passwordrepeat']) {
    $err = true;
    $errmsg = "Preencha os campos corretamente.";
  }

  if ($err == false) {
    $userid     = $_POST['userid'];
    $password   = sha1($_POST['password']);
    $full_name  = $_POST['full_name'];
    $email      = $_POST['email'];
    $birthdate  = $_POST['birthdate'];

    if (!empty($_FILES)) {
      include_once('file_uploader.php');
      $photo_path = '/img/'. $_POST['filespath'] . '/' . $_FILES['file']['name'];

      // include_once('class/img.class.php');
      // $img = new Image();
      // $img->file = $_FILES;
      // $img->path = '/img/'. $_POST['filespath'] . '/' . $img->file['name'];
      // $img->imgUpload();
    }

    include_once('class/db.class.php');

    $db = new DB();
    $db->query('INSERT INTO tb_users (userid, password, email, full_name, photo_path, birthdate) VALUES (:userid, :password, :email, :full_name, :photo_path, :birthdate)');
    $db->bind(':userid', $userid);
    $db->bind(':password', $password);
    $db->bind(':email', $email);
    $db->bind(':full_name', $full_name);
    $db->bind(':photo_path', $photo_path);
    $db->bind(':birthdate', $birthdate);
    $db->execute();

    // if ($db->rowCount() == 1) {
    //   $_SESSION['jimel']['userid'] = $row['userid'];
    //   $_SESSION['jimel']['full_name'] = $row['full_name'];
    //   $_SESSION['jimel']['profile'] = $row['profile'];
    //   $_SESSION['jimel']['photo_path'] = $row['photo_path'];

    //   header("Location: /");
    //   die();
  } else {
    $err = true;
    $errmsg = "Não foi possível registrar. Certifique-se de que os dados informados estão corretos.";
  }
}
?>

<h4>Registrar</h4>
<md-content class="md-padding md-form">
  <form enctype="multipart/form-data" 
        novalidate 
        name="userForm" 
        method="POST" 
        action="/registrar" 
        <?php if ($err == true) { echo 'ng-init="showErrorToast(\'' . $errmsg . '\')"'; } ?> >

    <input type="hidden" name="filespath" value="profile">
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
	      <input type="password" name="passwordrepeat" ng-model="user.passwordrepeat">
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
        <label>Email</label>
        <input required name="email" ng-model="user.email">
        <div ng-messages="userForm.email.$error">
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

      <md-input-container flex>
        <label>Foto</label>
        <input type="file" name="file" ng-model="user.file">
      </md-input-container>

    <div layout>
	    <md-button class="md-raised md-primary">Registrar</md-button>
    </div>

  </form>
</md-content>

<md-content class="md-padding">
  <md-button >Salvar registro</md-button>
</md-content>

