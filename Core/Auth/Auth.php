<?php

namespace Core\Auth;

session_start();
/**
 *  Class Auth
 */
class Auth
{


  private $auth;

  /**
   * Set Flash
   *
   * @param type var Get flash message
   */

  public function addFlash($value)
  {
     $_SESSION['flash'] = $value;
  }

  /**
   * Return Auth
   *
   * @param type var Get flash message
   */

  public function isAuthenticated()
  {
    return isset($_SESSION['auth']);
  }



}
