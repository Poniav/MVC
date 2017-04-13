<?php

namespace App\Controllers;

use Core\View;
use App\Models\Article;

/**
 * Article controller
 */
class ArticleController extends \Core\Controller
{

    public function indexAction()
    {
        $id = $this->route_params['id'];

        View::renderTemplate('article.twig', [
            'id' => $id
        ]);
    }

    protected function before()
    {
      echo "hello";
    }

}
