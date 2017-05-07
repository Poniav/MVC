<?php

namespace Core\Controller;

use Exception;

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
     * Call function method if exist in Class Controller
     *
     * @param string $name method
     * @param $args on null. All arguments passed through the construct object controller
     */
    public function __call(string $name, array $args = null)
    {
        $method = $name . 'Action';

        if (!method_exists($this, $method)) {
          throw new Exception("The method $method not found in controller " . get_class($this));
        }

        if(!method_exists($this, 'before') || $this->before() !== false)
        {
            call_user_func([$this, $method]);
        }

    }

}
