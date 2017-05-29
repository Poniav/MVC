<?php

namespace Core\Auth;

session_start();
/**
 *  Class Auth
 */
class Auth
{

  /**
   * If attribute exist in Session
   *
   * @param string attr
   * @return string session attribute
   */

  public function getAttribute(string $attr)
  {
    return isset($_SESSION[$attr]) ? $_SESSION[$attr] : null;
  }

  /**
   * Navbar URI request URI exist
   *
   * @return string class active
   */

  public function navbarURI(string $attr)
  {
    return (stripos($_SERVER['REQUEST_URI'], $attr) !== false) ? 'class="active"' : null;
  }

  /**
   * Navbar URI request URI exist
   *
   * @return string class active
   */

  public function navbarUrl(string $attr)
  {
    return ($_SERVER['REQUEST_URI'] == $attr) ? 'class="active"' : null;
  }

  /**
   * String Attr is equal to Request URI
   *
   * @param string attr URL
   * @return condition
   */

  public function urlURI(string $attr)
  {
    return ($_SERVER['REQUEST_URI'] == $attr);
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
   * Verif if flash message exist
   *
   * @return isset key exist
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
   * If Auth exist and true
   *
   * @return condition auth exist
   */

  public function isAuth()
  {
    return isset($_SESSION['auth']) && $_SESSION['auth'] === true;
  }


}
