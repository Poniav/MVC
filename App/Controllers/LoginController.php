<?php

namespace App\Controllers;

use Core\View;

/**
 * Login controller
 */
class LoginController extends \Core\Controller
{
      public function indexAction()
      {


      View::renderTemplate('login.twig');
    }


    protected function before()
    {

    }

    protected function after()
    {

    }

}
