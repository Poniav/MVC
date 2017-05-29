<?php

namespace App\Controllers\Front;

use App\Models\Article;
use App\Models\Comment;
use App\PDO\ArticlePDO;
use App\PDO\CommentPDO;
use App\PDO\BDD;
use Core\Form\Form;
use Core\Controller\Controller;
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

      $articles = $this->getArticle($id);
      $commentPDO = new CommentPDO(new BDD);
      $comments = $commentPDO->getAllComments($id);

      $niveau = 0;

      $form = new Form;

      if($this->app['HTTPRequest']->methodPost() && $form->isValid())
      {

        extract($this->app['HTTPRequest']->allData());

        if(!$membre || !$content)
        {
          $this->app['HTTPResponse']->addFlash('flash-error', 'Vous devez remplir tous les champs.');
          $this->app['HTTPResponse']->redirect('/article/'.$id);
        }

        $idParent = $this->app['HTTPRequest']->postData('idparent');

        if($idParent != 0){

          $commentId = $commentPDO->getId($idParent);

          if(!$commentId){
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
        'title' => $articles->metaTitle(),
        'description' => $articles->metaDescription(),
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

    private function getArticle(int $id)
    {

      $articlePDO = new ArticlePDO(new BDD);
      $articles = $articlePDO->get($id);

      return $articles;
    }

}
