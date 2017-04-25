<?php

namespace Core\Router;

/**
* Model route
 */
class Router extends Route
{

  public function add(string $route, array $params = [])
  {
    $route = $this->regex($route);
    $this->route[$route] = $params;
  }

  public function match(string $url)
  {
      foreach ($this->route as $route => $params) {
          if (preg_match($route, $url, $matches)) {
            return true;
          }
      }

      return false;
  }


}
