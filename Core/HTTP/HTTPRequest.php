<?php
namespace Core\HTTP;

class HTTPRequest

{

  /**
   * Return method GET or POST
   *
   * @return return string method
   */

  public function method()
  {
    return $_SERVER['REQUEST_METHOD'];
  }

  /**
   * Return boolean methodPost true
   *
   * @return return boolean true false
   */

  public function methodPost()
  {
    return ($_SERVER['REQUEST_METHOD'] == 'POST') ? true : false;
  }

  public function postData($key)
  {
    return isset($_POST[$key]) ? $_POST[$key] : 0;
  }

  public function allData()
  {
    return !empty($_POST) ? $_POST : null;
  }

  public function postExists($key)
  {
    return isset($_POST[$key]);
  }

  /**
   * Get requestURI
   *
   * @return return string
   */

  public function requestURI()
  {
    return $_SERVER['REQUEST_URI'];
  }
}
