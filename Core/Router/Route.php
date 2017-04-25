<?php

namespace Core\Router;

/**
 * Abstract Class Route
 */
abstract class Route
{

  protected static $_instance = null;


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
   * URL
   * @var array
   */
  protected $config;

  /**
   * Singleton Instance Route
   * @return return self instance
   */

  public static function getInstance()
  {

    if(is_null(self::$_instance)) {
      self::$_instance = new Router();
    }

    return self::$_instance;
  }

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
   * Set Config URL
   * @param type string HTTP HOST
   */
  public function setConfig(string $config)
  {
      $this->config = $config;
  }

  /**
  * Get Config URL
  * @return return string config
  */
  public function config()
  {
    return $this->config;
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
