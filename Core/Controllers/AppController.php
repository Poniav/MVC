<?php

namespace Core\Controllers;

use Core\Application;
use Core\Form\Form;
use \Exception;

/**
 * Model Interface Controller
 */
class AppController extends Application
{

  public function __construct()
  {
    parent::__construct();
  }

  public function run()
  {

    if($this->validRoute())
    {

      if(array_key_exists('controller', $this->app['route']->getParams()))
      {
          if(!array_key_exists('namespace', $this->app['route']->getParams()))
          {
            $controller = $this->app['route']->getParams()['controller'];
            $controller = "App\\Controllers\\" . $controller;
            if(class_exists($controller)){
              $controller = new $controller();
              return call_user_func([$controller, $this->app['route']->getParams()['action']]);
            }

            throw new Exception("dd");
          }

          throw new Exception("Controller doesn't exist");
      }

    }

    return $this->app['view']->render('Error/404.php');

  }

  /**
   * undocumented function summary

   * @param type string key array
   * @return return boolean
   */
  private function key_exists(string $key)
  {
    if(array_key_exists($key, $this->app['route']->getParams())) { return true; }
  }

}
