<?php

namespace Core\Form;


/**
 * Model Form
 */
class Form
{

  /**
   * Valid not empty Post
   *
   * @return return boolean true false
   */

  public function isValid()
  {
    return !empty($_POST) ? true : false;
  }

  /**
   * Get Value from Post Form
   *
   * @param type var string $value
   * @return return condition post $value
   */

  public function getValue(string $value)
  {
    return isset($_POST[$value]) ? $_POST[$value] : null;
  }

}
