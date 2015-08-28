<form role="form" action="\blog/users" method="POST" id="submit_login">
  <div class="login-form">
     <div class="form-group">
       <input type="text" class="form-control login-field" value="" placeholder="Enter your name" id="username" name="username">
       <label class="login-field-icon fui-user" for="username"></label>
     </div>
     <div class="form-group">
       <input type="password" class="form-control login-field" value="" placeholder="Password" id="password"
       name=" password">
       <label class="login-field-icon fui-lock" for="password"></label>
     </div>
     <button class="btn btn-primary btn-lg btn-block" type="submit">Log in</button>
     <a class="login-link" href="\blog/users/create">New User?</a>
  </div>
  <br/>
</form>