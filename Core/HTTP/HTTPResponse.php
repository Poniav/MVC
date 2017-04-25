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


}
