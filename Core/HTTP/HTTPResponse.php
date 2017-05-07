<?php

namespace Core\HTTP;

/**
 * Class HTTP Response
 */
class HTTPResponse
{

  /**
   * Redirect Location header
   *
   * @param type var string $location
   * @return return header redirection
   */

    public function redirect(string $location)
    {
      header('Location: '.$location);
      exit;
    }

  /**
   * Add Flash Session with $key and $value
   *
   * @param type var string $key
   * @param type var string $value
   */

    public function addFlash(string $key, string $value)
    {
       $_SESSION[$key] = $value;
    }


}
