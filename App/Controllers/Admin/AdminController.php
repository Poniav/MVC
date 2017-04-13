<?php

namespace App\Controllers\Admin;

use Core;

/**
 * Admin Controller
 */
class AdminController extends \Core\Controller
{

    public function before()
    {
        if($this->Auth()->isAuthenticated()){
          return true;
        } else {
          $this->Auth()->addFlash('Vous devez être identifié !');
          $this->HTTPResponse()->redirect('http://localhost:8000/login');
        }
    }


    public function indexAction(HTTPRequest $HTTPRequest)
    {

          // var_dump($this->HTTPRequest()->method());
          echo 'User admin index';
    }

    public function articlesAction()
    {

          // var_dump($this->HTTPRequest()->method());
          echo 'User admin index';
    }


}
