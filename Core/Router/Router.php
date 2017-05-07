<?php

namespace Core\Router;

/**
* Model route
 */
class Router extends Route
{

  /**
   * Add Route with Params
   *
   * @param type string Route
   * @param type array params ( Controller - Function name - Params )
   */

  public function add(string $route, array $params = [])
  {
    $route = $this->regex($route);
    $this->route[$route] = $params;
  }

  /**
   * Function URL
   *
   * @param type var Description
   * @return return type
   */

  public function match(string $url)
  {
      foreach ($this->route as $route => $params)
      {
          if (preg_match($route, $url, $matches))
          {
            return true;
          }
      }

      return false;
  }


}
