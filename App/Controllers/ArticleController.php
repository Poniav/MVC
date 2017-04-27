<?php

namespace App\Controllers;

use App\Models\Article;
use App\Models\Comment;
use App\PDO\ArticlePDO;
use App\PDO\CommentPDO;
use App\PDO\BDD;
use Core\Controllers\Controller;

/**
 * Article controller
 */
class ArticleController extends Controller
{

    public function articleAction()
    {

      $id = intval($this->app['route']->getParams()['id']);

      $articlePDO = new ArticlePDO(new BDD);
      $articles = $articlePDO->get($id);

      var_dump($articles);

      $commentPDO = new CommentPDO(new BDD);
      if($commentPDO->count($id))
      {
        $comments = $commentPDO->getAllComments($id);
      }

      $commentFormView = null;
      $niveau = 0;

      $comment = new Comment([
            'idNews' => $id
      ]);



      return $this->app['view']->render('Front/article.php', [
        'articles'    => $articles,
        'comments'    => $comments,
        'auth' => $this->app['auth']
      ]);
    }

    private function articles()
    {

    }

    protected function before()
    {

    }

    protected function after()
    {

    }

}
