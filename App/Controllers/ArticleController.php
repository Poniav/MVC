<?php

namespace App\Controllers;

use App\Models\Article;
use App\PDO\ArticlePDO;
use App\PDO\CommentPDO;
use App\PDO\BDD;
use App\Models\Comment;
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

      $commentPDO = new CommentPDO(new BDD);
      if($CommentPDO->count($id))
      {
        $comments = $CommentPDO->getAllComments($id);
      }

      $commentFormView = null;
      $niveau = 0;

      $comment = new Comment([
            'idNews' => $id
      ]);



      return $this->app['view']->renderTemplate('article.twig', [
        'articles'    => $articles,
        'comments'    => $comments
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
