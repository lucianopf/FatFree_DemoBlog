<?php
class Home{
    function get($f3) {
    	$f3->set('title','Home');
    	$f3->set('content','./views/blocks/articles.htm');
    	$db=new DB\SQL('mysql:host=mysql.hostinger.com.br;port=3306;dbname=u681614486_blog','u681614486_xepad','aamine111');
    	$articles=new DB\SQL\Mapper($db,'articles');
    	$result=$articles->find('id>0');
    	$f3->set('result',$result);
    	$template=new Template;
        echo $template->render($f3->get('views_path').'home.htm');
    }
    function search($f3) {
        $f3->set('title','Search');
        $f3->set('content','./views/blocks/articles.htm');
        $busca = $f3->get('POST.search');
        $db=new DB\SQL('mysql:host=mysql.hostinger.com.br;port=3306;dbname=u681614486_blog','u681614486_xepad','aamine111');
        $result=$db->exec("SELECT * FROM articles WHERE title like :search or content like :search ",  array(':search'=>"%".$f3->get('POST.search')."%"));
        $f3->set('result',$result);
        if(count($f3->get('result')) == 0){
            $f3->set('console_error','No results find.',10);
        }
        $template=new Template;
        echo $template->render($f3->get('views_path').'home.htm');
    }
}

?>