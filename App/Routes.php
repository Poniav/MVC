<?php

$router = new Core\Router();

$router->add('/', ['controller' => 'HomeController', 'action' => 'index']);
$router->add('/article/{id:\d+}', ['controller' => 'ArticleController', 'action' => 'index']);
$router->add('/alert/{id:\d+}', ['controller' => 'AlertController', 'action' => 'index']);
$router->add('/login', ['controller' => 'LoginController', 'action' => 'index']);
$router->add('/admin/home', ['controller' => 'AdminController', 'action' => 'index', 'namespace' => 'Admin']);
$router->add('/admin/articles', ['controller' => 'AdminController', 'action' => 'articles', 'namespace' => 'Admin']);
$router->add('/admin/users', ['controller' => 'AdminController', 'action' => 'articles', 'namespace' => 'Admin']);
$router->add('/admin/alerts', ['controller' => 'AdminController', 'action' => 'articles', 'namespace' => 'Admin']);
$router->add('/admin/alerts', ['controller' => 'AdminController', 'action' => 'articles', 'namespace' => 'Admin']);

$router->dispatch($_SERVER['REQUEST_URI']);

echo '<pre>';
print_r($router->getRoutes());
echo '</pre>';

echo '<pre>';
print_r($router->getParams());
echo '</pre>';





// $router->add('{controller}/{action}');
// $router->add('{controller}/{id:\d+}/{action}');
