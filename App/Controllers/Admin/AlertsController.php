<?php

namespace App\Controllers\Admin;

use Core\Controllers\Controller;

/**
 * Admin Alerts Controller
 */

class AlertsController extends Controller
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

      return $this->app['view']->render('Admin/alerts.php', [
              'auth' => $this->app['auth']
      ]);
    }


    protected function after()
    {
    }



}
