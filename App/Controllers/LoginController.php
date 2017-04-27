<?php

namespace App\Controllers;

use Core\Controllers\Controller;

/**
 * Login controller
 */
class LoginController extends Controller
{
    protected function before()
    {
      // if(!$this->app['Auth']->isAuthenticated()){
      //     $this->app['HTTPResponse']->redirect('/admin/home');
      // }

    }

    public function indexAction()
    {


      return $this->app['view']->render('Front/login.php');

    }



    protected function after()
    {

    }

}
