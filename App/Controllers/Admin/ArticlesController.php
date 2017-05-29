<?php

namespace App\Controllers\Admin;

use Core\Controller\Controller;
use App\PDO\BDD;
use App\PDO\ArticlePDO;
use App\Models\Article;
use App\PDO\CommentPDO;
use Core\Form\Form;

/**
 * Admin Articles Controller
 */

class ArticlesController extends Controller
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
      $title = "Articles | Jean Forteroche";

      $articlePDO = new ArticlePDO(new BDD);
      $articles = $articlePDO->getArticles();

      return $this->app['view']->render('Admin/articles.php', [
              'auth' => $this->app['auth'],
              'articles' => $articles,
              'title' => $title
      ]);
    }

    public function deleteAction()
    {

      $id = intval($this->app['route']->getParams()['id']);

      $articlePDO = new ArticlePDO(new BDD);
      $commentPDO = new CommentPDO(new BDD);


      $article = $articlePDO->get($id);
      $articlePDO->delete($article);

      $comments = $commentPDO->getByArticle($id);

      if($comments)
      {
        foreach ($comments as $comment)
        {
          $commentPDO->delete($comment);
        }
      }

      $this->app['HTTPResponse']->addFlash('flash-success','L\'article et les commentaires ont bien été supprimés');
      $this->app['HTTPResponse']->redirect('/admin/articles');


    }

    public function add()
    {
      $title = "Ajouter un article | Jean Forteroche";

      $form = new Form;

      if($this->app['HTTPRequest']->method() == 'POST' && $form->isValid())
      {
          if(!$this->app['HTTPRequest']->postData('content'))
          {
            $this->app['HTTPResponse']->addFlash('flash-error','Vous devez remplir tous les champs pour ajouter un article');
          }

          $articlePDO = new ArticlePDO(new BDD);
          $article = new Article($this->app['HTTPRequest']->allData());
          $articlePDO->add($article);

          $this->app['HTTPResponse']->addFlash('flash-success','L\'article a bien été ajouté');
          $this->app['HTTPResponse']->redirect('/admin/articles');
      }


      return $this->app['view']->render('Admin/add/article.php', [
              'auth' => $this->app['auth'],
              'title' => $title
      ]);
    }


    public function edit()
    {
      $title = "Modifier l'article | Jean Forteroche";

      $id = intval($this->app['route']->getParams()['id']);

      $articlePDO = new ArticlePDO(new BDD);
      $article = $articlePDO->get($id);

      $form = new Form;

      if($this->app['HTTPRequest']->method() == 'POST' && $form->isValid())
      {

        if($article->title() != $this->app['HTTPRequest']->postData('title'))
        {
          $article->setTitle($this->app['HTTPRequest']->postData('title'));
        }

        if($article->content() != $this->app['HTTPRequest']->postData('content'))
        {
          $article->setContent($this->app['HTTPRequest']->postData('content'));
        }

        $articlePDO->update($article);

        $this->app['HTTPResponse']->addFlash('flash-success','L\'article a bien été mis à jour.');

      }

      return $this->app['view']->render('Admin/edit/article.php', [
              'auth' => $this->app['auth'],
              'article' => $article,
              'title' => $title
      ]);
    }


}
