<?php

namespace App\Controllers\Admin;

use Core\Controllers\Controller;
use App\PDO\BDD;
use App\PDO\ArticlePDO;

/**
 * Admin Articles Controller
 */

class ArticlesController extends Controller
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

      $articlePDO = new ArticlePDO(new BDD);
      $articles = $articlePDO->getList();

      return $this->app['view']->render('Admin/articles.php', [
              'auth' => $this->app['auth'],
              'articles' => $articles
      ]);
    }


    protected function after()
    {
    }



}
