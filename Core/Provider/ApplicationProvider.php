<?php

namespace Core\Provider;

/**
* Application Provider
 */
abstract class ApplicationProvider implements \ArrayAccess
{

  protected $app;

  public function offsetSet($offset, $value) {
      if (is_null($offset)) {
          $this->app[] = $value;
      } else {
          $this->app[$offset] = $value;
      }
  }

  public function offsetExists($offset) {
      return isset($this->app[$offset]);
  }

  public function offsetUnset($offset) {
      unset($this->app[$offset]);
  }


  public function offsetGet($offset) {
      return isset($this->app[$offset]) ? $this->app[$offset] : null;
  }

}
