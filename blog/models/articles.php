<?php
class Articles{
    function create($f3){
    	$f3->set('title','New Article');
    	$f3->set('content','./views/blocks/new_article.htm');
    	$template=new Template;
    	echo $template->render($f3->get('views_path').'home.htm');
    }
    function create_article($f3){
      $title = $f3->get('POST.title');
      $content = $f3->get('POST.content');
      $db=new DB\SQL('mysql:host=mysql.hostinger.com.br;port=3306;dbname=u681614486_blog','u681614486_xepad','aamine111');
      $articles=new DB\SQL\Mapper($db,'articles');
      $articles->title = $title;
      $articles->content = $content;
      $articles->author = $f3->get('SESSION.user');
      $articles->save();
      $f3->reroute('/users/login'); 
    }
    function delete_article($f3){
    	$id = $f3->get('PARAMS.id');
    	$user = $f3->get('SESSION.user');
    	$db=new DB\SQL('mysql:host=mysql.hostinger.com.br;port=3306;dbname=u681614486_blog','u681614486_xepad','aamine111');
    	$articles=new DB\SQL\Mapper($db,'articles');
    	$articles->load(array('id=?', $id));
    	if($articles->author == $user){
    		$articles->erase();
    	 	$f3->set('console_success','Article successfully deleted.',10);
    	}else{
    		$f3->set('console_error','Usuario invalido.');
   		}
    	$f3->set('title','Home');
   		$articles=new DB\SQL\Mapper($db,'articles');
    	$result=$articles->find('id>0');
    	$f3->set('result',$result);
    	$f3->set('content','./views/blocks/articles.htm');
    	$template=new Template;
    	echo $template->render($f3->get('views_path').'home.htm');
    }
    
    function edit_article($f3){
    	$id = $f3->get('PARAMS.id');
    	$user = $f3->get('SESSION.user');
    	$db=new DB\SQL('mysql:host=mysql.hostinger.com.br;port=3306;dbname=u681614486_blog','u681614486_xepad','aamine111');
    	$articles=new DB\SQL\Mapper($db,'articles');
    	$articles->load(array('id=?', $id));
    	if($articles->author == $user){
    		$f3->set('title','Edit Article');
    		$f3->set('a_title', $articles->title);
			$f3->set('a_content', $articles->content);
			$f3->set('a_id', $id);
	    	$f3->set('content','./views/blocks/edit_article.htm');
    	}else{
    		$f3->set('title','Home');
    		$f3->set('console_error','Invalid user or the article does not exist.');
	   		$articles=new DB\SQL\Mapper($db,'articles');
	    	$result=$articles->find('id>0');
	    	$f3->set('result',$result);
	    	$f3->set('content','./views/blocks/articles.htm');
   		}
    	$template=new Template;
    	echo $template->render($f3->get('views_path').'home.htm');
    }

    function edit_save($f3){
      $id = $f3->get('PARAMS.id');
      $user = $f3->get('SESSION.user');
      $title = $f3->get('POST.title');
      $content = $f3->get('POST.content');
      $db=new DB\SQL('mysql:host=mysql.hostinger.com.br;port=3306;dbname=u681614486_blog','u681614486_xepad','aamine111');
      $articles=new DB\SQL\Mapper($db,'articles');
      $articles->load(array('id=?', $id));
      if($articles->author == $user){
      	$articles->title = $title;
        $articles->content = $content;
        $articles->save();
    	$f3->set('console_success','Article successfully changed.');
      }else{
    	$f3->set('console_error','Invalid user or the article does not exist.');
   	  }
	  $articles=new DB\SQL\Mapper($db,'articles');
	  $result=$articles->find('id>0');
	  $f3->set('result',$result);
	  $f3->set('content','./views/blocks/articles.htm');
      $f3->set('title','Home');
      $template=new Template;
      echo $template->render($f3->get('views_path').'home.htm');
    }
}
?>