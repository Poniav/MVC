<?php

namespace Core\Controllers;



/**
 * Base controller
 */
abstract class Controller
{

    /**
     * Application Object
     *
     * @var array
     */
    protected $app;

    /**
     * Construct get $this->app Application
     *
     * @param type array
     */

    public function __construct(array $app)
    {
      $this->app = $app;
    }

    /**
     * @param string $name  Method name
     * @param array $args Arguments passed to the method
     *
     * @return void
     */
    public function __call($name, $args)
    {
        $method = $name . 'Action';

        if (method_exists($this, $method)) {
            if ($this->before() !== false) {
                call_user_func_array([$this, $method], $args);
                $this->after();
            }
        } else {
            throw new \Exception("Method $method not found in controller " . get_class($this));
        }
    }

}
