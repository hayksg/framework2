<?php

namespace Application\Controller;

use Application\Model\Article;
use Application\Components\View;

class ArticleController 
{
    public function indexAction()
    {
        $allNews = Article::getAll();
        
        $view = new View([
            'allNews' => $allNews,
        ]);
        $view->display('article/index');
        
        return true;
    }
    
    public function viewAction($id)
    {
        $oneNews = Article::getOneById($id);
        
        $view = new View([
            'oneNews' => $oneNews,
        ]);
        $view->display('article/view');
        
        return true;
    }
}
