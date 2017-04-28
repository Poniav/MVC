<?php

namespace Core\Auth;

session_start();
/**
 *  Class Auth
 */
class Auth
{

  /**
   * If flash message exist
   *
   * @return condition flash message
   */

  public function getAttribute(string $attr)
  {
    return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
  }

  /**
   * Get Flash message
   *
   * @return return flash message
   */

  public function getFlash()
  {
    $flash = $_SESSION['flash'];
    unset($_SESSION['flash']);

    return $flash;
  }

  /**
   * If flash message exist
   *
   * @return condition flash message
   */

  public function hasFlash()
  {
    return isset($_SESSION['flash']);
  }

  /**
   * Set Auth authorization true
   *
   */

  public function setAuth()
  {
      $_SESSION['auth'] = true;
  }

  /**
   * Set Auth username in Session
   * @param string username Auth
   */

  public function setAuthUser(string $username)
  {
      $_SESSION['authUser'] = $username;
  }

  /**
   * Destroy Session Logout
   *
   */

  public function destroySession()
  {
      unset($_SESSION['auth']);
      unset($_SESSION['authUser']);
      session_destroy();
  }

  /**
   * If flash message exist
   *
   * @return condition flash message
   */

  public function isAuthenticated()
  {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
  }


}
