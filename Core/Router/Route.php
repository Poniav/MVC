<?php

namespace Core\Router;

/**
 * Abstract Class Route
 */
abstract class Route
{

  /**
   * Route
   * @var string
   */

  protected $route;

  /**
   * Params
   * @var array
   */
  protected $params;

  /**
   * URL
   * @var array
   */
  protected $url;

  /**
   * Regex Slashes - Variables
   *
   * @param string
   * @return return string
   */

  protected function regex(string $regex)
  {
    $regex = preg_replace('/\//', '\\/', $regex);

    $regex = preg_replace('/\{([a-z]+)\}/', '(?P<\1>[a-z-]+)', $regex);

    $regex = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)', $regex);

    $regex = '/^' . $regex . '$/i';

    return $regex;
  }

  /**
  * set Route Params
  */
  public function setMatch(string $url)
  {
    foreach ($this->route as $route => $params) {
      if (preg_match($route, $url, $matches)) {

        foreach ($matches as $key => $match) {
          if (is_string($key)) {
            $params[$key] = $match;
          }
        }
        $this->params = $params;
      }
    }
  }

  /**
   * Get Route
   * @return return string route property
   */
  public function getRoutes()
  {
    return $this->route;
  }


  /**
   * Set URL Params
   * @param type string $_SERVER URL
   */
  public function setURL(string $url)
  {
      $this->url = $url;
  }

  /**
   * Get URL Params
   * @return return string URL
   */
  public function getURL()
  {
      return $this->url;
  }

  /**
   * Get Params
   * @return return string params property
   */
  public function getParams()
  {
    return $this->params;
  }


}
