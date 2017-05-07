<?php

namespace App\PDO;

use App\PDO\BDD;
use App\Models\Comment;
use Core\Domain\Manager;
use PDO;

/**
 * Global Manager Membre
 */
class CommentPDO extends Manager
{

  /**
   * Add comment into BDD
   *
   * @param type class Comment object
   */

 public function add(Comment $comments)
 {
   $query = $this->db->pdo->prepare('INSERT INTO comments(idnews, idparent, niveau, moderate, content, membre, addDate) VALUES (:idnews, :idparent, :niveau, :moderate, :content, :membre, NOW())');
   $query->bindValue(':idnews', $comments->idnews(), PDO::PARAM_INT);
   $query->bindValue(':idparent', $comments->idparent(), PDO::PARAM_INT);
   $query->bindValue(':niveau', $comments->niveau(), PDO::PARAM_INT);
   $query->bindValue(':moderate', $comments->moderate(), PDO::PARAM_INT);
   $query->bindValue(':content', $comments->content(), PDO::PARAM_STR);
   $query->bindValue(':membre', $comments->membre(), PDO::PARAM_STR);

   $query->execute();
 }

 /**
  * Get all comments from $id Article
  *
  * @param type int $idNews
  * @return return type
  */

 public function getByArticle(int $idNews)
  {
    $comments = [];

    $query = $this->db->pdo->prepare('SELECT * FROM comments WHERE idNews = :idNews');
    $query->execute(['idNews' => $idNews]);

    while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
    {
      $comments[] = new Comment($donnees);
    }

    return $comments;
  }

 /**
  * Get All comments with children in Single Article
  *
  * @param type int $idNews ( id Article )
  * @return type array Comment object
  */

 public function getAllComments(int $idNews)
 {

   $commentaires = [];

   $query = $this->db->pdo->prepare('SELECT id, idnews, idparent, niveau, moderate, content, membre, addDate FROM comments WHERE idnews = :idnews');
   $query->execute(['idnews' => $idNews]);

   while ($data = $query->fetch(PDO::FETCH_ASSOC))
   {
      $commentaires[] = new Comment($data);
   }

   foreach ($commentaires as $comment) {
        $comments[$comment->id()] = $comment;
   }

   foreach($commentaires as $key => $comment){
     if($comment->idParent() != 0) {
       $comments[$comment->idParent()]->children[] = $comment;
       unset($commentaires[$key]);
     }
   }

  return $commentaires;
 }

 /**
  * Get unique comment by integer $id
  *
  * @return class Comment object
  */

 public function getId(int $id)
 {
   $query = $this->db->pdo->prepare('SELECT id, idnews, idparent, niveau, moderate, content, membre, addDate FROM comments WHERE id =' . $id);
   $query->execute(['id' => $id]);

   $donnees = $query->fetch(PDO::FETCH_ASSOC);

   return new Comment($donnees);
 }

 /**
  * Get Comments list
  *
  * @param type array Comment object
  */

 public function getComments()
 {
   $comments = [];

   $query = $this->db->pdo->query('SELECT id, idnews, idparent, niveau, moderate, content, membre, addDate FROM comments ORDER BY id DESC');

   while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
   {
     $comments[] = new Comment($donnees);
   }

   return $comments;
 }

/**
 * Delete comment into BDD
 *
 * @param type class Comment object
 */

 public function delete(Comment $comment)
 {
   $this->db->pdo->exec('DELETE FROM comments WHERE idnews = '. $comment->idNews());
 }

 /**
  * Update comment into BDD
  *
  * @param type class Comment object
  */

 public function update(Comment $comment)
 {
   $query = $this->db->pdo->prepare('UPDATE comments SET moderate = :moderate WHERE id = :id');
   $query->bindValue(':id', $comment->id(), PDO::PARAM_INT);
   $query->bindValue(':moderate', $comment->moderate(), PDO::PARAM_INT);

   $query->execute();
 }


}
