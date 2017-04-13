<?php

namespace App\Models;

use \Exception;
use \DateTime;

/**
 * Class Membre
 * Global Model Membre
 */

class User extends \Core\Model
{
  private $erreurs = [];
  private $id;
  private $username;
  private $password;
  private $name;
  private $firstname;
  private $email;
  private $banned;
  private $permission;
  private $addDate;

  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function setUsername(string $username)
  {
    if(empty($username))
    {
      $this->erreurs['username'] = "Veuillez saisir un nom d'utilisateur";
    }

    if(!empty($username) && strlen($username) < 3 || strlen($username) > 22)
    {
      $this->erreurs['username'] = "Votre nom d'utilisateur doit faire entre 3 et 22 caractères.";
    }


    $this->username = $username;
  }

  public function setPassword(string $password)
  {
    if(empty($password))
    {
      $this->erreurs['password'] = "Veuillez saisir un mot de passe";
    }

    if(!empty($password) && strlen($password) < 6)
    {
      $this->erreurs['password'] = "Votre mot de passe doit faire au moins 6 caractères.";
    }

    $this->password = $password;
  }

  public function setName(string $name)
  {

    if(!empty($name) && strlen($name) < 3 || strlen($name) > 22)
    {
      $this->erreurs['name'] = "Votre nom d'utilisateur doit faire entre 3 et 22 caractères.";
    }

    $this->name = $name;
  }

  public function setFirstname(string $firstname)
  {

    if(!empty($firstname) && strlen($firstname) < 3 || strlen($firstname) > 22)
    {
      $this->erreurs['firstname'] = "Votre prénom doit faire entre 3 et 22 caractères.";
    }

    $this->firstname = $firstname;
  }

  public function setEmail(string $email)
  {
    if(empty($email))
    {
      $this->erreurs['email'] = "Veuillez saisir une adresse email.";
    }

    if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
      $this->erreurs['email'] = "Veuillez saisir une adresse email valide.";
    }

    $this->email = $email;
  }

  public function setBanned(int $banned)
  {
    if(empty($banned))
    {
      $this->banned = 0;
    }

    $this->banned = $banned;
  }

  public function setPermission(string $permission)
  {
    $this->permission = $permission;
  }

  public function setAddDate(string $addDate)
  {
    $this->addDate = new DateTime($addDate);
  }

  public function erreurs() { return $this->erreurs; }
  public function id() { return $this->id; }
  public function username() { return $this->username; }
  public function password() { return $this->password; }
  public function name() { return $this->name; }
  public function firstname() { return $this->firstname; }
  public function email() { return $this->email; }
  public function banned() { return $this->banned; }
  public function permission() { return $this->permission; }
  public function addDate() { return $this->addDate; }


}
