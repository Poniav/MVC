<?php

namespace App\Models;

use Core\Domain\Model;
use \DateTime;

/**
 * Class Alert
 * Modèle de base Alert Commentaires
 */

 class Alert extends Model
 {

   private $id;
   private $idCom;
   private $content;

   public function setId(int $id)
   {
     $this->id = $id;
   }

   public function setIdCom(int $idCom)
   {
     $this->idCom = $idCom;
   }

   public function setContent(string $content)
   {
     $this->content = $content;
   }

   public function id() { return $this->id; }
   public function idCom() { return $this->idCom; }
   public function content() { return $this->content; }

}
