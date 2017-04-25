<?php

namespace App\PDO;

use Core\PDO\BDD;
use App\Domain\Alert;
use Core\Domain\Manager;
use PDO;

/**
 * Class Alert Manager
 * Gestion des articles sur les commentaires
 */
class AlertPDO extends \Core\Manager
{


 public function add(Alert $alert)
 {
   $query = $this->db->pdo->prepare('INSERT INTO alert(idcom, content) VALUES (:idcom, :content)');
   $query->bindValue(':idcom', $alert->idCom(), PDO::PARAM_INT);
   $query->bindValue(':content', $alert->content(), PDO::PARAM_STR);

   $query->execute();
 }

 public function getId(int $id)
 {
   $query = $this->db->pdo->prepare('SELECT id, idcom, content FROM alert WHERE id =' . $id);
   $query->execute(['id' => $id]);

   $donnees = $query->fetch(PDO::FETCH_ASSOC);

   return new Alert($donnees);

 }

 public function getList()
 {
     $alert = [];

     $query = $this->db->pdo->query('SELECT id, idcom, content FROM alert ORDER BY id DESC');

     while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
     {
       $alert[] = new Alert($donnees);
     }

     return $alert;
 }

 public function delete(Alert $alert)
 {
   $this->db->pdo->exec('DELETE FROM alert WHERE id = '. $alert->id());
 }

}
