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

 public function count(int $idNews)
 {
   $query = $this->db->pdo->prepare('SELECT COUNT(*) FROM comments WHERE idnews = :idnews');
   $query->execute(['idnews' => $idNews]);
   $data = $query->fetchColumn();

   return $data;
 }

 public function getAll(int $idNews)
 {
   $comments = [];

   $query = $this->db->pdo->prepare('SELECT id, idnews, idparent, niveau, moderate, content, membre, addDate FROM comments WHERE idnews = :idnews');
   $query->execute(['idnews' => $idNews]);

   while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
   {
     $comments[] = new Comment($donnees);
   }

   return $comments;
 }


 public function getAllComments(int $idNews)
 {
   $comments = [];

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


 public function getId(int $id)
 {
   $query = $this->db->pdo->prepare('SELECT id, idnews, idparent, niveau, moderate, content, membre, addDate FROM comments WHERE id =' . $id);
   $query->execute(['id' => $id]);

   $donnees = $query->fetch(PDO::FETCH_ASSOC);

   return new Comment($donnees);
 }

 public function getByArticle(int $idNews)
 {
   $query = $this->db->pdo->prepare('SELECT * FROM comments WHERE idNews =' . $idNews);
   $query->execute(['idNews' => $idNews]);

   $data = $query->fetchAll(PDO::FETCH_ASSOC);

   var_dump(new Comment($data));
  //  return $commentaires;
 }

 public function getList()
 {
   $comments = [];

   $query = $this->db->pdo->query('SELECT id, idnews, idparent, niveau, moderate, content, membre, addDate FROM comments ORDER BY id DESC');

   while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
   {
     $comments[] = new Comment($donnees);
   }

   return $comments;
 }


 public function delete(Comment $comments)
 {
   $this->db->pdo->exec('DELETE FROM comments WHERE idnews = '. $comments->idNews());
 }

 public function update(Comment $comment)
 {
   $query = $this->db->pdo->prepare('UPDATE comments SET moderate = :moderate WHERE id = :id');
   $query->bindValue(':id', $comment->id(), PDO::PARAM_INT);
   $query->bindValue(':moderate', $comment->moderate(), PDO::PARAM_INT);

   $query->execute();
 }


}
