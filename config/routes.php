<?php

return [
    ''    => 'article/index',   // indexAction in ArticleController
    
    'article/([0-9]+)' => 'article/view/$1',    // indexView in ArticleController
    'article'    => 'article/index',   // indexAction in ArticleController
    
    'news/([0-9]+)' => 'news/view/$1',    // indexView in NewsController
    'news'    => 'news/index',   // indexAction in NewsController
    
    'product' => 'product/list', // listAction in ProductController
];

