<!-- 
<div class="containers" layout="row" layout-margin>
  <div flex flex-order="1">
  </div>
  <div flex flex-order="2">
  </div>
</div>
 -->

<h4>Login</h4>

<md-content class="md-padding">
  <form name="userForm">
    <div layout layout-sm="column">
      <md-input-container flex>
        <label>Usuário</label>
        <input ng-model="user.userid" placeholder="">
      </md-input-container>
    </div>
    <md-input-container flex>
      <label>Senha</label>
      <input type="password" ng-model="user.password">
    </md-input-container>

    <md-button class="md-raised md-primary">Primary</md-button>


    <md-button/>
  </form>
</md-content>