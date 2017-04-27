<?php

namespace App\Controllers;

use Core\Controllers\Controller;
use App\Models\Alert;
use App\PDO\AlertPDO;
use Core\Form\Form;
use App\PDO\BDD;

/**
 * Alert controller
 */
class AlertController extends Controller
{

    public function indexAction()
    {
      $id = intval($this->app['route']->getParams()['id']);
      $form = new Form();


      if($form->isValid()){
          $alert = new Alert($this->app['HTTPRequest']->allData());
          $alertPDO = new AlertPDO(new BDD);
          $alertPDO->add($alert);
          $this->app['HTTPResponse']->addFlash('Votre signalement a bien été pris en compte.');
      }

      return $this->app['view']->render('Front/alert.php', [
        'id'    => $id,
        'auth'  => $this->app['auth']
      ]);
    }

    protected function before()
    {

    }

    protected function after()
    {

    }


}
