<?php

namespace App\PDO;

use App\PDO\BDD;
use App\Models\Article;
use Core\Domain\Manager;
use DateTime;
use PDO;

/**
 * Class News Manager
 * Gestion des actualités du site internet
 */
class ArticlePDO extends Manager
{

  public function add(Article $article)
  {
    $query = $this->db->pdo->prepare('INSERT INTO news (title, content, auteur, addDate, modDate) VALUES (:title, :content, :auteur, NOW(), NOW())');
    $query->bindValue(':title', $article->title(), PDO::PARAM_STR);
    $query->bindValue(':content', $article->content(), PDO::PARAM_STR);
    $query->bindValue(':auteur', $article->auteur(), PDO::PARAM_STR);

    $query->execute();
  }

  public function count()
  {
    return $this->db->pdo->query('SELECT COUNT(*) FROM news')->fetchColumn();
  }

  public function get(int $id)
  {
    $query = $this->db->pdo->query('SELECT id, title, content, auteur, addDate, modDate FROM news WHERE id = '.$id);
    $donnees = $query->fetch(PDO::FETCH_ASSOC);

    var_dump($donnees);
    // return new Article($donnees);
    var_dump(new Article($donnees));
    die();
  }

  public function getList()
  {
    $article = [];

    $query = $this->db->pdo->query('SELECT id, title, content, auteur, addDate, modDate FROM news ORDER BY id DESC');

    while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
    {
      $article[] = new Article($donnees);
    }

    return $article;
  }

  public function delete(Article $news)
  {
    $this->db->pdo->exec('DELETE FROM news WHERE id = '. $article->id());
  }

  public function update(Article $article)
  {
    $query = $this->db->pdo->prepare('UPDATE news SET title = :title, content = :content, auteur = :auteur, modDate = NOW() WHERE id = :id');
    $query->bindValue(':id', $article->id(), PDO::PARAM_INT);
    $query->bindValue(':title', $article->title(), PDO::PARAM_STR);
    $query->bindValue(':content', $article->content(), PDO::PARAM_STR);
    $query->bindValue(':auteur', $article->auteur(), PDO::PARAM_STR);

    $query->execute();
  }

}
