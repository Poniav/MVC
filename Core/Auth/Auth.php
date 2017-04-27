<?php

namespace Core\Auth;

session_start();
/**
 *  Class Auth
 */
class Auth
{


  private $auth;

  public function getAttribute($attr)
  {
    return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
  }

  public function getFlash()
  {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);

    return $flash;
  }

  public function hasFlash()
  {
    return isset($_SESSION['flash']);
  }

  public function isAuthenticated()
  {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
  }


}
