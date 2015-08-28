<h5>Welcome <?php echo $SESSION['user']; ?>.</h5>
<br/>
<div class="row demo-row">
  <?php if ($SESSION['permission']=='1'): ?>
  	
	  <div class="col-xs-3">
	    <a href="\blog/articles/create" class="btn btn-block btn-lg btn-primary">New Article</a>
	  </div>
	
  <?php endif; ?>
  <div class="col-xs-3">
    <a href="\blog/users/change" class="btn btn-block btn-lg btn-default">Change Password</a>
  </div>
  <div class="col-xs-3">
    <a href="\blog/users/logout" class="btn btn-block btn-lg btn-danger">Logout</a>
  </div>
</div>
<br/>