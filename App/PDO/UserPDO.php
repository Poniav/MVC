<?php

namespace App\PDO;

use App\PDO\BDD;
use App\Models\User;
use Core\Domain\Manager;
use PDO;

/**
 * Global Manager Membre
 */
class UserPDO extends Manager
{

 /**
  * Add User into BDD
  *
  * @param type class User Object
  */

 public function add(User $user)
 {

   $query = $this->db->pdo->prepare('INSERT INTO users(username, password, name, firstname, email, addDate) VALUES(:username, :password, :name, :firstname, :email, NOW())');
   $query->bindValue(':username', $user->username(), PDO::PARAM_STR);
   $query->bindValue(':password', $user->password(), PDO::PARAM_STR);
   $query->bindValue(':name', $user->name(), PDO::PARAM_STR);
   $query->bindValue(':firstname', $user->firstname(), PDO::PARAM_STR);
   $query->bindValue(':email', $user->email(), PDO::PARAM_STR);

   $query->execute();

 }

 /**
  * Delete User from BDD
  *
  * @param type class User Object
  */

 public function delete(User $user)
 {
   $this->db->pdo->exec('DELETE FROM users WHERE id = '. $user->id());
 }

 /**
  * Count users from BDD
  *
  * @return type result int
  */
 public function count()
 {
   return $this->db->pdo->query('SELECT COUNT(*) FROM users')->fetchColumn();
 }

 /**
  * undocumented function summary
  *
  * @param type var Description
  * @return return type
  */

 public function get(int $id)
  {

    $query = $this->db->pdo->query('SELECT id, username, password, name, firstname, email, addDate FROM users WHERE id = '.$id);
    $donnees = $query->fetch(PDO::FETCH_ASSOC);

    return new User($donnees);
  }

  /**
   * Get all Users from BDD
   *
   * @return User object
   */

  public function getList()
  {
    $user = [];

    $query = $this->db->pdo->query('SELECT id, username, password, name, firstname, email, addDate FROM users ORDER BY username');

    while ($donnees = $query->fetch(PDO::FETCH_ASSOC))
    {
      $user[] = new User($donnees);
    }

    return $user;
  }

/**
 * Select User from username
 *
 * @param type array @params
 * @return object User into $data
 */

 public function selectUser(string $username)
 {
     $data = [];

     $query = $this->db->pdo->prepare('SELECT * FROM users WHERE username = :username');
     $query->execute(['username' => $username]);

     $data = $query->fetch(PDO::FETCH_ASSOC);

     return new User($data);

 }

 /**
  * Update User from BDD
  *
  * @param instance class User Object
  */

  public function update(User $user)
  {
    $query = $this->db->pdo->prepare('UPDATE users SET username = :username, password = :password, name = :name, firstname = :firstname, email = :email WHERE id = :id');
    $query->bindValue(':id', $user->id(), PDO::PARAM_INT);
    $query->bindValue(':username', $user->username(), PDO::PARAM_STR);
    $query->bindValue(':password', $user->password(), PDO::PARAM_STR);
    $query->bindValue(':name', $user->name(), PDO::PARAM_STR);
    $query->bindValue(':firstname', $user->firstname(), PDO::PARAM_STR);
    $query->bindValue(':email', $user->email(), PDO::PARAM_STR);

    $query->execute();
  }


}
