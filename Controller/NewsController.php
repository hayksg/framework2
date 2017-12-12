<?php

include(ROOT . 'Model/News.php');

class NewsController 
{
    public function indexAction()
    {
        $allNews = News::getAll();
        var_dump($allNews);
        
        return true;
    }
    
    public function viewAction($id)
    {
        $oneNews = News::getOneById($id);
        var_dump($oneNews);
        
        return true;
    }
}
