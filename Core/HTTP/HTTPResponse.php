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
   * Set Flash
   *
   * @param type var Get flash message
   */

  public function addFlash($value)
  {
     $_SESSION['flash'] = $value;
  }


}
