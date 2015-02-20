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
      <md-input-container style="width:80%">
          <label>Company (Disabled)</label>
          <input ng-model="user.company" disabled>
        </md-input-container>
      <md-input-container flex>
        <label>Submission Date</label>
        <input type="date" ng-model="user.submissionDate">
      </md-input-container>
    </div>
    <div layout layout-sm="column">
      <md-input-container flex>
        <label>First Name</label>
        <input ng-model="user.firstName" placeholder="Placeholder text">
      </md-input-container>
      <md-input-container flex>
        <label>Last Name</label>
        <input ng-model="theMax">
      </md-input-container>
    </div>
    <md-input-container flex>
      <label>Address</label>
      <input ng-model="user.address">
    </md-input-container>
    <div layout layout-sm="column">
      <md-input-container flex>
        <label>City</label>
        <input ng-model="user.city">
      </md-input-container>
      <md-input-container flex>
        <label>State</label>
        <input ng-model="user.state">
      </md-input-container>
      <md-input-container flex>
        <label>Postal Code</label>
        <input ng-model="user.postalCode">
      </md-input-container>
    </div>
    <md-input-container flex>
      <label>Biography</label>
      <textarea ng-model="user.biography" columns="1" md-maxlength="150"></textarea>
    </md-input-container>
  </form>
</md-content>