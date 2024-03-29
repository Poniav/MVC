<?php

namespace App\Controllers\Admin;

use Core\Controller\Controller;
use App\PDO\BDD;
use App\PDO\AlertPDO;
use App\PDO\CommentPDO;
use App\Models\Alert;

/**
 * Admin Alerts Controller
 */

class AlertsController extends Controller
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

      $title = "Les alertes | Jean Forteroche";

      $alertPDO = new AlertPDO(new BDD);
      $alerts = $alertPDO->getAlerts();

      return $this->app['view']->render('Admin/alerts.php', [
              'auth' => $this->app['auth'],
              'alerts' => $alerts,
              'title' => $title
      ]);
    }

    public function deleteAction()
    {

      $id = intval($this->app['route']->getParams()['id']);

      $alertPDO = new AlertPDO(new BDD);
      $alert = $alertPDO->getId($id);
      $alertPDO->delete($alert);

      $this->app['HTTPResponse']->addFlash('flash-success','L\'alerte a bien été supprimée.');
      $this->app['HTTPResponse']->redirect('/admin/alerts');

    }


    public function deleteAllAction()
    {

      $alertPDO = new AlertPDO(new BDD);
      $alerts = $alertPDO->getAlerts();

      foreach ($alerts as $alert) {
        $alertPDO->delete($alert);
      }

      $this->app['HTTPResponse']->addFlash('flash-success','Toutes les alertes ont bien été supprimés.');
      $this->app['HTTPResponse']->redirect('/admin/alerts');

    }


}
