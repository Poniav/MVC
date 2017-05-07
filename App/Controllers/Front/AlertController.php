<?php

namespace App\Controllers\Front;

use Core\Controller\Controller;
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
      $form = new Form;

      if($this->app['HTTPRequest']->methodPost() && $form->isValid()){
          $alert = new Alert($this->app['HTTPRequest']->allData());
          $alertPDO = new AlertPDO(new BDD);
          $alertPDO->add($alert);
          $this->app['HTTPResponse']->addFlash('flash-success', 'Votre signalement a bien été pris en compte.');
      }

      $title = 'Signaler le commentaire #'. $id . ' | Jean Forteroche';
      $description = 'Vous pouvez signaler le commentaire directement sur cette page en utilisant le formulaire';

      return $this->app['view']->render('Front/alert.php', [
        'id'    => $id,
        'auth'  => $this->app['auth'],
        'title' => $title,
        'description' => $description
      ]);
    }

}
