<?php
class Users{
    function get($f3) {
    }
    function post($f3) {
      $username = $f3->get('POST.username');
      $password = $f3->get('POST.password');
      $db=new DB\SQL('mysql:host=mysql.hostinger.com.br;port=3306;dbname=u681614486_blog','u681614486_xepad','aamine111');
      $user=new DB\SQL\Mapper($db,'users');
      $auth = new \Auth($user, array('id'=>'user_id', 'pw'=>'password'));
      $login_result = $auth->login($username,$password); 
      if($login_result){
        $f3->set('SESSION.user',$username);
        $user->load(array('user_id=?',$username));
        $f3->set('SESSION.permission',$user->permission);
      }
      $f3->reroute('/users/login'); 
    }
    function login($f3){
        $f3->set('title','Login');
        if($f3->get('SESSION.user')==NULL){
          $f3->set('content','./views/blocks/login_form.htm');
        }else{
          $f3->set('content','./views/blocks/login_welcome.htm');
        }
        $template=new Template;
        echo $template->render($f3->get('views_path').'home.htm');
    }
    function logout($f3){
      $f3->set('SESSION.user',NULL);
      $f3->set('SESSION.permission',NULL);
      $f3->reroute('/users/login');
    }
    function change($f3){
      $f3->set('title','Change Password');
      $f3->set('content','./views/blocks/change_pw.htm');
      $template=new Template;
      echo $template->render($f3->get('views_path').'home.htm');
    }
    function changepw($f3) {
      $f3->set('title','Login');
      $recent = $f3->get('POST.recent');
      $password_1 = $f3->get('POST.password_1');
      $password_2 = $f3->get('POST.password_2');
      if($password_1==$password_2){
        if(strlen($password_1)>=4){
          $db=new DB\SQL('mysql:host=mysql.hostinger.com.br;port=3306;dbname=u681614486_blog','u681614486_xepad','aamine111');
          $user=new DB\SQL\Mapper($db,'users');
          $user->load(array('user_id=?',$f3->get('SESSION.user')));
          if($recent == $user->password){
            $user->password = $password_2;
            $user->save();
            $f3->set('console_success','Password successfully changed.');
            $f3->set('content','./views/blocks/login_welcome.htm');
          }else{
            $f3->set('console_error','Incorrect password.');
            $f3->set('title','Change Password');
            $f3->set('content','./views/blocks/change_pw.htm');
          }
        }
        else{
          $f3->set('console_error','The new password must contain at least 4 charecters.');
          $f3->set('title','Change Password');
          $f3->set('content','./views/blocks/change_pw.htm');
        }
      }else{
        $f3->set('console_error','The password fields must be the equal.');
        $f3->set('title','Change Password');
        $f3->set('content','./views/blocks/change_pw.htm');
      }
      // Redireciona para users/login
      // $f3->reroute('/users/login'); 
      $template=new Template;
      echo $template->render($f3->get('views_path').'home.htm');
    }

    function create($f3){
      $f3->set('title','New Account');
      $f3->set('content','./views/blocks/new_user.htm');
      $template=new Template;
      echo $template->render($f3->get('views_path').'home.htm');
    }
    function create_save($f3){
      $username = $f3->get('POST.user');
      $password_1 = $f3->get('POST.password_1');
      $password_2 = $f3->get('POST.password_2');
      $author = $f3->get('POST.author');
      if($password_1==$password_2){
        if(strlen($password_1)>=4 && strlen($username)>=4){
          $db=new DB\SQL('mysql:host=mysql.hostinger.com.br;port=3306;dbname=u681614486_blog','u681614486_xepad','aamine111');
          $verify=new DB\SQL\Mapper($db,'users');
          $verify->load(array('user_id=?', $username));
          if(count($verify->password)==0){
            $user=new DB\SQL\Mapper($db,'users');
            $user->password = $password_2;
            $user->user_id = $username;
            if($author == NULL){
              $user->permission = 0;
            }else{
              $user->permission = $author;
            }
            $user->save();
            $f3->set('console_success','New user created.');
            $f3->set('content','./views/blocks/login_form.htm');
          }else{
            $f3->set('console_error','This username already exists.',10);
            $f3->set('title','New Account');
            $f3->set('content','./views/blocks/new_user.htm');
          }
        }
        else{
          $f3->set('console_error','The password and the username must but at least 4 characters length.',10);
          $f3->set('title','New Account');
          $f3->set('content','./views/blocks/new_user.htm');
        }
      }else{
        $f3->set('console_error','Both passwords must be equal',10);
        $f3->set('title','New Account');
        $f3->set('content','./views/blocks/new_user.htm');
      }
      $template=new Template;
      echo $template->render($f3->get('views_path').'home.htm');
    }

}

?>