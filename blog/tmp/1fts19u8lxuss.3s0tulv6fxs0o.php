<form role="form" action="\blog/users/create_save" method="POST" id="submit_login">
  <div class="login-form">
     <div class="form-group">
       <label for="recent"><b>Username</b></label>
       <input type="text" class="form-control login-field" value="" placeholder="Username" id="username" name="user">
     </div>
     <div class="form-group">
       <label for="password_1"><b>New Password</b></label>
       <input type="password" class="form-control login-field" value="" placeholder="Password" id="password_1"
       name=" password_1">
     </div>
     <div class="form-group">
       <label for="password_2"><b>Repeat New Password</b></label>
       <input type="password" class="form-control login-field" value="" placeholder="Password" id="password_2"
       name=" password_2">
     </div>
     <div class="form-group">
       <label class="checkbox" for="checkbox1">
            <input type="checkbox" value="1" id="checkbox1" data-toggle="checkbox" class="custom-checkbox" name="author"><span class="icons"><span class="icon-unchecked"></span><span class="icon-checked"></span></span>
            Author (Demo purposes)
          </label>
     </div>
     <button class="btn btn-primary btn-lg btn-block" type="submit">Create</button>
  </div>
  <br/>
</form>