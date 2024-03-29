<?php

namespace App\Models;

use Core\Domain\Model;
use \DateTime;

/**
 * Class Comments
 * Modèle de base Commentaires
 */

 class Comment extends Model
 {

   private $id;
   private $idNews;
   private $idParent;
   private $niveau;
   private $moderate;
   private $content;
   private $membre;
   private $addDate;

   public function setId(int $id)
   {
     $this->id = $id;
   }

   public function setIdNews(int $idNews)
   {
     $this->idNews = $idNews;
   }

   public function setIdParent(int $idParent)
   {
     $this->idParent = $idParent;
   }

   public function setNiveau(int $niveau)
   {
     $this->niveau = $niveau;
   }

   public function setModerate(int $moderate)
   {
     $this->moderate = $moderate;
   }

   public function setContent(string $content)
   {
     $this->content = $content;
   }

   public function setMembre(string $membre)
   {
     $this->membre = $membre;
   }

   public function setAddDate(string $addDate)
   {
     $this->addDate = new DateTime($addDate);
   }

   public function id() { return $this->id; }
   public function idNews() { return $this->idNews; }
   public function idParent() { return $this->idParent; }
   public function niveau() { return $this->niveau; }
   public function moderate() { return $this->moderate; }
   public function content() { return strip_tags($this->content); }
   public function membre() { return strip_tags($this->membre); }
   public function addDate() { return $this->addDate; }

 }
