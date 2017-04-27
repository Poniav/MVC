<?php

namespace Core;

use \Exception;
use Core\Provider\ApplicationProvider;
use Core\Router\Router;
use Core\Auth\Auth;
use Core\View\View;
use Core\HTTP\HTTPRequest;
use Core\HTTP\HTTPResponse;

/**
 * Class Application
 */
abstract class Application extends ApplicationProvider
{

  public function __construct()
  {
     $this->app['route'] = Router::getInstance();
     $this->app['HTTPRequest'] = new HTTPRequest($this);
     $this->app['HTTPResponse'] = new HTTPResponse($this);
     $this->app['auth'] = new Auth($this);
     $this->app['view'] = new View($this);
  }

  protected function validRoute()
  {

    $this->app['route']->setURL($this->app['HTTPRequest']->requestURI());

    if($this->app['route']->match($this->app['route']->getURL()))
      {
            $this->app['route']->setMatch($this->app['route']->getURL());
            return true;
      } else {
            return false;
      }

  }

}
