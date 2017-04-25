<?php

$app['route']->setConfig($_SERVER['HTTP_HOST']);

$app['route']->add('/', ['controller' => 'HomeController', 'action' => 'index']);
$app['route']->add('/article/{id:\d+}', ['controller' => 'ArticleController', 'action' => 'article']);
$app['route']->add('/alert/{id:\d+}', ['controller' => 'AlertController', 'action' => 'index']);
$app['route']->add('/login', ['controller' => 'LoginController', 'action' => 'index']);
$app['route']->add('/admin/home', ['controller' => 'AdminController', 'action' => 'index', 'namespace' => 'Admin']);
$app['route']->add('/admin/articles', ['controller' => 'AdminController', 'action' => 'articles', 'namespace' => 'Admin']);
$app['route']->add('/admin/users', ['controller' => 'AdminController', 'action' => 'articles', 'namespace' => 'Admin']);
$app['route']->add('/admin/alerts', ['controller' => 'AdminController', 'action' => 'articles', 'namespace' => 'Admin']);
// $app['route']->add('/admin/alerts', ['controller' => 'AdminController', 'action' => 'articles', 'namespace' => 'Admin']);






// $router->add('{controller}/{action}');
// $router->add('{controller}/{id:\d+}/{action}');
