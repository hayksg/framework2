<?php

include(ROOT . 'Model/Article.php');

class ArticleController 
{
    public function indexAction()
    {
        $allNews = Article::getAll();
        
        include(ROOT . 'View/article/index.phtml');
        
        return true;
    }
    
    public function viewAction($id)
    {
        $oneNews = Article::getOneById($id);
        
        include(ROOT . 'View/article/view.phtml');
        
        return true;
    }
}
