<?php

namespace App\Models;

use Core\Domain\Model;
use \DateTime;

/**
 * Class News
 * Global Model News
 */
class Article extends Model
{

  private $erreurs = [];
  private $id;
  private $title;
  private $content;
  private $auteur;
  private $addDate;
  private $modDate;


  public function setId(int $id)
  {
    $this->id = $id;
  }

  public function setTitle(string $title)
  {
    if(empty($title))
    {
      $this->erreurs['title'] = 'Le titre ne doit pas être vide.';
    }

    if(!empty($title) && strlen($title) > 180)
    {
      $this->erreurs['title'] = 'Le titre est trop long';
    }

    $this->title = $title;

  }

  public function setContent(string $content)
  {
    if(empty($content))
    {
      $this->erreurs['content'] = 'Le contenu de la news ne doit pas être vide';
    }

    $this->content = $content;
  }

  public function setAuteur(string $auteur)
  {
    if(empty($auteur))
    {
      $this->erreurs['auteur'] = 'Vous devez saisir un auteur.';
    }

    $this->auteur = $auteur;
  }

  public function setAddDate(string $addDate)
  {
    $this->addDate = new DateTime($addDate);
  }

  public function setModDate(string $modDate)
  {
    $this->modDate = new DateTime($modDate);
  }

  public function erreurs() { return $this->erreurs; }
  public function id() { return $this->id; }
  public function title() { return $this->title; }
  public function content() { return $this->content; }
  public function auteur() { return $this->auteur; }
  public function addDate() { return $this->addDate; }
  public function modDate() { return $this->modDate; }

}
