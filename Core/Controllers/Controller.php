<?php

namespace Core\Controllers;

use Core\Application;

/**
 * Base controller
 */
abstract class Controller extends Application
{

    /**
     * Class Construct
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
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
