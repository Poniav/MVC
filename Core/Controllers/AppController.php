<?php

namespace Core\Controllers;

use Core\Application;
use Core\Form\Form;
use \Exception;

/**
 * Model Controller
 */

class AppController extends Application
{

  public function __construct()
  {
    parent::__construct();
  }

  /**
   * Run Application - Matched Route - Get Controller specified in App Controllers
   *
   * @return return type
   */

  public function run()
  {

    /**
     * No ValidRoute matched
     *
     * @return return view 404
     */

    if(!$this->validRoute())
    {
      return $this->app['view']->render('Error/404.php');
    }

    $controller = $this->arrayController();
    $controller = $this->namespace() . $controller;

    if(!class_exists($controller))
    {
      throw new Exception("Controller do not exist in " . get_class($controller));
    }

    /**
     * Get Controller
     *
     * @return return view 404
     */

    $this->getController($controller);


  }


  /**
   * Verif if key controller exist & value key controller exist
   *
   * @param type string controller
   * @return return controller name
   */

  protected function arrayController()
  {

    if(!$this->keyArray('controller'))
    {
      throw new Exception("No key controller in params array route");
    }

    $controller = $this->app['route']->getParams()['controller'];

    if(!$controller)
    {
      throw new Exception("No controller found in key controller array params route");
    }

    return $controller;
  }


  /**
   * Verif namespace exist in Params
   *
   * @param type string controller
   * @return return function
   */

  protected function namespace()
  {

    $namespace = "App\\Controllers\\";

    if($this->keyArray('namespace'))
    {
      $namespace = $namespace . $this->app['route']->getParams()['namespace'] . "\\";
    }

    return $namespace;
  }

  /**
   * Get Controller class object in Controllers App
   *
   * @param type string Controller paths
   * @param type array $this->app
   */

  protected function getController(string $controller)
  {

    try {

      $controller = new $controller();
      return call_user_func([$controller, $this->app['route']->getParams()['action']]);

    } catch (Exception $e) {

        throw new Exception("Get error during the loading new object class");

    }

  }


  /**
   * Verif key exist in array params route

   * @param type string key array
   * @return return boolean
   */
  private function keyArray(string $key)
  {
     return array_key_exists($key, $this->app['route']->getParams());
  }

}
