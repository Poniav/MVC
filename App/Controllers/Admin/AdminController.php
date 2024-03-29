<?php

namespace App\Controllers\Admin;

use Core\Controller\Controller;

/**
 * Admin Controller
 */
class AdminController extends Controller
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

      $title = "Administration | Jean Forteroche";

      return $this->app['view']->render('Admin/home.php', [
              'auth' => $this->app['auth'],
              'title' => $title
      ]);
    }

    public function logoutAction()
    {

      $this->app['auth']->destroySession();
      $this->app['HTTPResponse']->addFlash('flash-warning', 'Vous êtes déconnecté.');
      $this->app['HTTPResponse']->redirect('/login');

    }


}
