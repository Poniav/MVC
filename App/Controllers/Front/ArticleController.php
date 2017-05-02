<?php

namespace App\Controllers\Front;

use App\Models\Article;
use App\Models\Comment;
use App\PDO\ArticlePDO;
use App\PDO\CommentPDO;
use App\PDO\BDD;
use Core\Form\Form;
use Core\Controllers\Controller;
use Exception;

/**
 * Article controller
 */
class ArticleController extends Controller
{
    /**
     * Method Article
     *
     * @return return view
     */

    public function articleAction()
    {

      $id = intval($this->app['route']->getParams()['id']);

      $articles = $this->getArticles($id);
      $comments = $this->getComments($id);
      $commentPDO = new CommentPDO(new BDD);

      $niveau = 0;

      $form = new Form();

      if($this->app['HTTPRequest']->method() == 'POST' && $form->isValid())
      {

        $idParent = $this->app['HTTPRequest']->postData('idparent');

        if($idParent != 0){

          $commentId = $commentPDO->getId($idParent);

          if($commentId == false){
            throw new Exception("Le commentaire n'existe pas !");
          }

          $niveau = $commentId->niveau() + 1;
        }


          $comment = new Comment($this->app['HTTPRequest']->allData());
          $comment->setNiveau($niveau);
          $comment->setModerate(0);

          $commentPDO->add($comment);
          $this->app['HTTPResponse']->addFlash('flash-success', 'Votre commentaire a bien été ajouté');
          $this->app['HTTPResponse']->redirect('/article/'.$id);
      }


      return $this->app['view']->render('Front/article.php', [
        'articles'    => $articles,
        'comments'    => $comments,
        'auth' => $this->app['auth']
      ]);
    }

    /**
     * Get specified article
     *
     * @param type int id article
     * @return return array articles
     */

    private function getArticles(int $id)
    {

      $articlePDO = new ArticlePDO(new BDD);
      $articles = $articlePDO->get($id);

      if(is_bool($articles))
      {
        $this->app['HTTPResponse']->addHeader('HTTP/1.0 404 Not Found');
        $this->app['HTTPResponse']->redirect('/404');
      }

      return $articles;
    }

    /**
     * Get comments from article
     *
     * @param type int id article
     * @return return array comments
     */

    private function getComments(int $id)
    {

      $commentPDO = new CommentPDO(new BDD);
      if(!$commentPDO->count($id))
      {
        return false;
      }

      $comments = $commentPDO->getAllComments($id);
      return $comments;

    }

    /**
     * Set Title for Article
     *
     * @return return string title for Article
     */

    private function metaData()
    {

    }

    protected function before()
    {

    }

    protected function after()
    {

    }

}
