<?php

namespace Core;

/**
 * Class HTTP Response
 */
class HTTPResponse extends ApplicationComponent
{

  public function addHeader($header)
  {
    header($header);
  }

  public function redirect($location)
  {
    header('Location: '.$location);
    exit;
  }


}
