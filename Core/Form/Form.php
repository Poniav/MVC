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

}
