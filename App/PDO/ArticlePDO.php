<?php

namespace App\PDO;

use App\PDO\BDD;
use App\Models\Article;
use Core\Domain\Manager;
use DateTime;
use PDO;

/**
 * Class News Manager
 * Gestion des actualités de l'Application
 */
class ArticlePDO extends Manager
{

  /**
   * Add Article into BDD
   *
   * @param type class Article Object
   */

  public function add(Article $article)
  {
    $query = $this->db->pdo->prepare('INSERT INTO articles (title, content, auteur, addDate, modDate) VALUES (:title, :content, :auteur, NOW(), NOW())');
    $query->bindValue(':title', $article->title(), PDO::PARAM_STR);
    $query->bindValue(':content', $article->content(), PDO::PARAM_STR);
    $query->bindValue(':auteur', $article->auteur(), PDO::PARAM_STR);

    $query->execute();
  }

  /**
   * Get Article from BDD
   *
   * @return type class Article Object
   */

  public function get(int $id)
  {

    $query = $this->db->pdo->query('SELECT id, title, content, auteur, addDate, modDate FROM articles WHERE id = '.$id);
    $donnees = $query->fetch(PDO::FETCH_ASSOC);

    return new Article($donnees);

  }

  /**
   * Get all Articles from BDD
   *
   * @return type array Article Object
   */

  public function getArticles()
  {
    $article = [];

    $query = $this->db->pdo->query('SELECT id, title, content, auteur, addDate, modDate FROM articles ORDER BY id DESC');

    while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
    {
      $article[] = new Article($donnees);
    }

    return $article;
  }

  /**
   * Delete Article into BDD
   *
   * @param type class Article Object
   */

  public function delete(Article $article)
  {
    $this->db->pdo->exec('DELETE FROM articles WHERE id = '. $article->id());
  }

  /**
   * Update Article into BDD
   *
   * @param type class Article Object
   */

  public function update(Article $article)
  {
    $query = $this->db->pdo->prepare('UPDATE articles SET title = :title, content = :content, modDate = NOW() WHERE id = :id');
    $query->bindValue(':id', $article->id(), PDO::PARAM_INT);
    $query->bindValue(':title', $article->title(), PDO::PARAM_STR);
    $query->bindValue(':content', $article->content(), PDO::PARAM_STR);

    $query->execute();
  }

}
