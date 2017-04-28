<?php

namespace App\Controllers\Admin;

use Core\Controllers\Controller;

/**
 * Admin Articles Controller
 */
 
class ArticlesController extends Controller
{

    public function before()
    {

        if(!$this->app['auth']->isAuthenticated())
        {
          $this->app['HTTPResponse']->addFlash('Vous devez être connecté');
          $this->app['HTTPResponse']->redirect('/login');
        }

    }


    public function indexAction()
    {

      return $this->app['view']->render('Admin/articles.php', [
              'auth' => $this->app['auth']
      ]);
    }


    protected function after()
    {
    }



}
