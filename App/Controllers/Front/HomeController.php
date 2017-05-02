<?php

namespace App\Controllers\Front;

use Core\Controllers\Controller;
use App\PDO\ArticlePDO;
use App\PDO\BDD;

/**
 * Home controller
 */
class HomeController extends Controller
{

    public function indexAction()
    {

      $articlePDO = new ArticlePDO(new BDD);
      $articles = $articlePDO->getList();

      return $this->app['view']->render('Front/home.php', [
        'articles'    => $articles
      ]);

    }

    public function before()
    {

    }

    public function after()
    {

    }


}