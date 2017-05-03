<?php

namespace Core\Form;


/**
 * Model Form
 */
class Form
{

  public function isValid()
  {
    if(!empty($_POST)) { return true; }
  }

  public function getValue(string $value)
  {
    return isset($_POST[$value]) ? $_POST[$value] : null;
  }

}
