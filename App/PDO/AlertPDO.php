<?php

namespace App\PDO;

use Core\PDO\BDD;
use App\Models\Alert;
use Core\Domain\Manager;
use PDO;

/**
 * Class Alert Manager
 * Gestion des alertes sur les commentaires
 */
class AlertPDO extends Manager
{

  /**
   * Add Alert into BDD
   *
   * @param type class Alert Object
   */

 public function add(Alert $alert)
 {
   $query = $this->db->pdo->prepare('INSERT INTO alerts(idcom, content) VALUES (:idcom, :content)');
   $query->bindValue(':idcom', $alert->idCom(), PDO::PARAM_INT);
   $query->bindValue(':content', $alert->content(), PDO::PARAM_STR);

   $query->execute();
 }

 /**
  * Get Alert by ID
  *
  * @param type string $id
  * @return object Alert
  */

 public function getId(int $id)
 {
   $query = $this->db->pdo->prepare('SELECT id, idcom, content FROM alerts WHERE id =' . $id);
   $query->execute(['id' => $id]);

   $donnees = $query->fetch(PDO::FETCH_ASSOC);

   return new Alert($donnees);

 }

 /**
  * Get All Alerts
  *
  * @return array $alert
  */

 public function getAlerts()
 {
     $alert = [];

     $query = $this->db->pdo->query('SELECT id, idcom, content FROM alerts ORDER BY id DESC');

     while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
     {
       $alert[] = new Alert($donnees);
     }

     return $alert;
 }

 /**
  * Update Alert from BDD
  *
  * @param instance class Alert Object
  */

 public function delete(Alert $alert)
 {
   $this->db->pdo->exec('DELETE FROM alerts WHERE id = '. $alert->id());
 }

}
