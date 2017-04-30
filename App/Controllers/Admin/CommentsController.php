<?php

namespace App\Controllers\Admin;

use Core\Controllers\Controller;
use App\PDO\BDD;
use App\PDO\CommentPDO;

/**
 * Admin Articles Controller
 */

class CommentsController extends Controller
{

    public function before()
    {

        if(!$this->app['auth']->isAuth())
        {
          $this->app['HTTPResponse']->addFlash('flash-warning', 'Vous devez être connecté');
          $this->app['HTTPResponse']->redirect('/login');
        }

    }


    public function indexAction()
    {

      $commentPDO = new CommentPDO(new BDD);
      $comments = $commentPDO->getList();

      return $this->app['view']->render('Admin/comments.php', [
              'auth' => $this->app['auth'],
              'comments' => $comments
      ]);
    }


    protected function after()
    {
    }



}
