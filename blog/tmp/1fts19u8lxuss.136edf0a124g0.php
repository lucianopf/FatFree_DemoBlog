<form role="form" action="\blog/articles/edit_save/<?php echo $a_id; ?>" method="POST" id="submit_article">
  <div class="login-form">
     <div class="form-group">
       <label for="recent"><h6>Title: *</h6></label>
       <input type="text" class="form-control login-field" value="<?php echo $a_title; ?>" placeholder="Title" id="title" name="title">
     </div>
     <div class="form-group">
       <label for="password_1"><h6>Content: </h6></label>
       <textarea rows="10"  class="form-control login-field" value="" id="content"
       name=" content"><?php echo $a_content; ?></textarea>
     </div>
     <button class="btn btn-primary btn-lg btn-block" type="submit">Save</button>
  </div>
  <br/>
</form>