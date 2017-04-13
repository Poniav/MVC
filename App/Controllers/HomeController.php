<?php

namespace App\Controllers;

use Core\View;
use App\PDO\ArticlePDO;
use App\PDO\BDD;

/**
 * Home controller
 */
class HomeController extends \Core\Controller
{
    public function indexAction()
    {
      $articlePDO = new ArticlePDO(new BDD);
      $articles = $articlePDO->getList();

      View::renderTemplate('home.twig', [
        'articles'    => $articles
      ]);
    }


    protected function before()
    {
        //echo "(before) ";
        //return false;
    }

    protected function after()
    {
        //echo " (after)";
    }

}
