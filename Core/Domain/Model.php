<?php

namespace Core\Domain;

/**
 * Base model
 */
abstract class Model
{

  public function __construct($donnees)
  {
      $this->hydrate($donnees);
  }

  public function hydrate(array $donnees)
  {
    foreach ($donnees as $key => $value)
    {
      $method = 'set'.ucfirst($key);

      if (method_exists($this, $method))
      {
        $this->$method($value);
      }
    }
  }

}
