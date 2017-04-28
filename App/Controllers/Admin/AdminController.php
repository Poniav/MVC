<?php

namespace App\Controllers\Admin;

use Core\Controllers\Controller;

/**
 * Admin Controller
 */
class AdminController extends Controller
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

          // var_dump($this->HTTPRequest()->method());
          echo 'User admin index';
    }

    public function articlesAction()
    {

          // var_dump($this->HTTPRequest()->method());
          echo 'User admin index';
    }

    protected function after()
    {
    }



}
