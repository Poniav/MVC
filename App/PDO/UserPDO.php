<?php

namespace App\Membre;

use Core\BDD;
use PDO;

/**
 * Global Manager Membre
 */
class UserPDO extends \Core\Manager
{

 public function add(User $user)
 {

   $query = $this->db->pdo->prepare('INSERT INTO membre(username, password, name, firstname, email, banned, permission, addDate) VALUES(:username, :password, :name, :firstname, :email, :banned, :permission, NOW())');
   $query->bindValue(':username', $user->username(), PDO::PARAM_STR);
   $query->bindValue(':password', $user->password(), PDO::PARAM_STR);
   $query->bindValue(':name', $user->name(), PDO::PARAM_STR);
   $query->bindValue(':firstname', $user->firstname(), PDO::PARAM_STR);
   $query->bindValue(':email', $user->email(), PDO::PARAM_STR);
   $query->bindValue(':banned', $user->banned(), PDO::PARAM_INT);
   $query->bindValue(':permission', $user->permission(), PDO::PARAM_STR);

   $query->execute();

 }

 public function delete(User $user)
 {
   $this->db->pdo->exec('DELETE FROM membre WHERE id = '. $user->id());
 }

 /**
  *
  * @return string
  */
 public function count()
 {
   return $this->db->pdo->query('SELECT COUNT(*) FROM membre')->fetchColumn();
 }

 public function get(int $id)
  {

    $query = $this->db->pdo->query('SELECT id, username, password, name, firstname, email, banned, permission, addDate FROM membre WHERE id = '.$id);
    $donnees = $query->fetch(PDO::FETCH_ASSOC);

    return new User($donnees);
  }

  /**
   * Récupérer la liste des membres
   * @return array
   */

  public function getList()
  {
    $user = [];

    $query = $this->db->pdo->query('SELECT id, username, password, name, firstname, email, banned, permission, addDate FROM membre ORDER BY username');

    while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
    {
      $user[] = new User($donnees);
    }

    return $user;
  }

/**
 * Selectionner un utilisateur en fonction des paramètres
 *
 * @param type array @params
 * @return array
 */

 public function select(array $params)
 {
   if($params['username']) {
     $query = $this->db->pdo->prepare('SELECT * FROM membre WHERE username = :username');
     $query->execute(['username' => $username]);

     return $query->fetch();
   }
 }

 /**
  * @param instance class BDD
  */

  public function update(User $user)
  {
    $query = $this->db->pdo->prepare('UPDATE membre SET username = :username, password = :password, name = :name, firstname = :firstname, email = :email, banned = :banned, permission = :permission WHERE id = :id');
    $query->bindValue(':id', $user->id(), PDO::PARAM_INT);
    $query->bindValue(':username', $user->username(), PDO::PARAM_STR);
    $query->bindValue(':password', password_hash($user->password(), PASSWORD_DEFAULT));
    $query->bindValue(':name', $user->name(), PDO::PARAM_STR);
    $query->bindValue(':firstname', $user->firstname(), PDO::PARAM_STR);
    $query->bindValue(':email', $user->email(), PDO::PARAM_STR);
    $query->bindValue(':banned', $user->banned(), PDO::PARAM_INT);
    $query->bindValue(':permission', $user->permission(), PDO::PARAM_STR);

    $query->execute();
  }


}
