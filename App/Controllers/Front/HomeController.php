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
        'description' => $description,
        'auth' => $this->app['auth']
      ]);

    }

    public function auteurAction()
    {

      $title = 'Auteur | Jean Forteroche';
      $description = 'Fiche profil de l\'Auteur Jean Forteroche qui est acteur et écrivain. Découvrez sa biographie avec l\'ensemble de ses oeuvres';

      return $this->app['view']->render('Front/auteur.php', [
        'title' => $title,
        'description' => $description,
        'auth' => $this->app['auth']
      ]);

    }

}
