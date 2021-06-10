<?php

class BlogController extends AbstractController
{
    private $articleManager;

    public function __construct()
    {
        $this->articleManager = new ArticleManager();
    }

    public function index()
    {        
        $articles = $this->articleManager->getAll(ArticleManager::TABLE);

        $this->render('blog/index.php',[
            'articles' => $articles
        ]);
    }

    public function article($id)
    {
        //Traitements
        if(!empty($id))
            $article = $this->articleManager->get($id);
        else
            throw new Exception("L'article est inexistant", 404);
        
        $this->render('blog/article.php', [
            'article' => $article
        ]);
    }
}