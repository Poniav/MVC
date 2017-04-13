<?php

namespace Core;

use App\PDO\BDD;

/**
 * Abstract Class Manager
 */
 
abstract class Manager
{

    /**
     * @var string DB
     */
   protected $db;

    /**
     * Construct BDD
     */
   public function __construct($db)
   {
     $this->setDb($db);
   }

   protected function setDb(BDD $db)
   {
     $this->db = $db;
   }

}
