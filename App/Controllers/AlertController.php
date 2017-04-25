<?php

namespace App\Controllers;

use Core\Controllers\Controller;

/**
 * Alert controller
 */
class AlertController extends Controller
{

    public function indexAction()
    {
      $id = $this->app['route']->getParams()['id'];

      return $this->app['view']->renderTemplate('alert.twig', [
        'id'    => $id
      ]);
    }

    protected function before()
    {

    }

    protected function after()
    {

    }


}
