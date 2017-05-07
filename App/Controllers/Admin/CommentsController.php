<?php

namespace App\Controllers\Admin;

use Core\Controller\Controller;
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
      $comments = $commentPDO->getComments();

      return $this->app['view']->render('Admin/comments.php', [
              'auth' => $this->app['auth'],
              'comments' => $comments
      ]);
    }


    public function moderateAction()
    {

      $id = intval($this->app['route']->getParams()['id']);

      $commentPDO = new CommentPDO(new BDD);
      $comment = $commentPDO->getId($id);

      if($comment->moderate() == 0)
      {
        $comment->setModerate(1);
        $this->app['HTTPResponse']->addFlash('flash-success', 'Vous avez modéré le commentaire.');
      }
      else {
        $comment->setModerate(0);
        $this->app['HTTPResponse']->addFlash('flash-success', 'Le commentaire n\'est plus modéré.');
      }

      $commentPDO->update($comment);
      $this->app['HTTPResponse']->redirect('/admin/comments');

    }



}
