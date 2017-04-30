<?php

namespace Core\HTTP;

/**
 * Class HTTP Response
 */
class HTTPResponse
{

  public function addHeader(string $header)
  {
    header($header);
  }

  public function redirect(string $location)
  {
    header('Location: '.$location);
    exit;
  }

  /**
   * Set Flash success
   *
   * @param type var Get flash message
   */

  public function addFlash(string $key, string $value)
  {
     $_SESSION[$key] = $value;
  }


}
