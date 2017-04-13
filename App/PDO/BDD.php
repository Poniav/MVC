<?php

namespace App\PDO;

use App\Config;

/**
 * Class PDO
 * Utilisation de la Class PDO PHP
 */
use PDO;

/**
 * Class BDD
 * Permet de se connecter à la base de données
 */

class BDD extends Config
{

  /**
   * @var PDO
   */
  public $pdo;


  public function __construct()
  {
    try {
      $pdo = new PDO('mysql:host='. self::HOST . ';dbname=' . self::DBNAME, self::LOGIN, self::PASSWORD);
      $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); // ERRMODE_WARNING | ERRMODE_EXCEPTION | ERRMODE_SILENT
      $this->pdo = $pdo;
    } catch (Exception $e) {
      echo "Impossible d'accéder à la base de données Mysql : ".$e->getMessage();
      die();
    }

  }

}
