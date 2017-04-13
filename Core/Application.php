<?php

namespace Core;

/**
 * Class Application
 */
abstract class Application
{

  protected $httpRequest;
  protected $httpResponse;
  protected $auth;

  public function __construct()
  {
   $this->httpRequest = new HTTPRequest($this);
   $this->httpResponse = new HTTPResponse($this);
   $this->auth = new Auth($this);
  }

  public function HTTPRequest()
  {
    return $this->httpRequest;
  }

  public function HTTPResponse()
  {
    return $this->httpResponse;
  }

  public function Auth()
  {
    return $this->auth;
  }

}
