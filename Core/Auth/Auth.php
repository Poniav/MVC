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
   * If flash message exist
   *
   * @return condition flash message
   */

  public function navbarURI(string $attr)
  {
    return (stripos($_SERVER['REQUEST_URI'], $attr) !== false) ? 'class="active"' : null;
  }

  /**
   * Get Flash message
   *
   * @return return flash message
   */

  public function getFlash(string $key)
  {
    $flash = $_SESSION[$key];
    unset($_SESSION[$key]);

    return $flash;
  }

  /**
   * If flash message exist
   *
   * @return condition flash message
   */

  public function hasFlash(string $key)
  {
    return isset($_SESSION[$key]);
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
  }

  /**
   * If flash message exist
   *
   * @return condition flash message
   */

  public function isAuth()
  {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
  }


}
