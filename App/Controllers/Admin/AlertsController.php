<?php

namespace App\Controllers\Admin;

use Core\Controllers\Controller;
use App\PDO\BDD;
use App\PDO\AlertPDO;

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

      $alertPDO = new AlertPDO(new BDD);
      $alerts = $alertPDO->getList();

      return $this->app['view']->render('Admin/alerts.php', [
              'auth' => $this->app['auth'],
              'alerts' => $alerts
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


    protected function after()
    {
    }



}
