<?php

namespace App\Controllers\Front;

use Core\Controller\Controller;
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
      $articles = $articlePDO->getArticles();

      $title = 'Jean Forteroche | Acteur et écrivain';
      $description = 'Blog de Jean Forteroche qui est acteur et écrivain. Romancier en préparation de son prochain livre sur L\'Alaska';

      return $this->app['view']->render('Front/home.php', [
        'articles'    => $articles,
        'title' => $title,
        'description' => $description
      ]);

    }

}
