<?php

$app['route']->setConfig($_SERVER['HTTP_HOST']);

$app['route']->add('/', ['controller' => 'HomeController', 'action' => 'index']);
$app['route']->add('/article/{id:\d+}', ['controller' => 'ArticleController', 'action' => 'article']);
$app['route']->add('/alert/{id:\d+}', ['controller' => 'AlertController', 'action' => 'index']);
$app['route']->add('/login', ['controller' => 'LoginController', 'action' => 'index']);
$app['route']->add('/admin/logout', ['controller' => 'AdminController', 'action' => 'logout', 'namespace' => 'Admin']);
$app['route']->add('/admin/home', ['controller' => 'AdminController', 'action' => 'index', 'namespace' => 'Admin']);
$app['route']->add('/admin/articles', ['controller' => 'ArticlesController', 'action' => 'index', 'namespace' => 'Admin']);
$app['route']->add('/admin/article/{id:\d+}/del', ['controller' => 'ArticlesController', 'action' => 'delete', 'namespace' => 'Admin']);
$app['route']->add('/admin/article/{id:\d+}/edit', ['controller' => 'ArticlesController', 'action' => 'edit', 'namespace' => 'Admin']);
$app['route']->add('/admin/article/add', ['controller' => 'ArticlesController', 'action' => 'add', 'namespace' => 'Admin']);
$app['route']->add('/admin/comments', ['controller' => 'CommentsController', 'action' => 'index', 'namespace' => 'Admin']);
$app['route']->add('/admin/users', ['controller' => 'UsersController', 'action' => 'index', 'namespace' => 'Admin']);
$app['route']->add('/admin/user/{id:\d+}/del', ['controller' => 'UsersController', 'action' => 'delete', 'namespace' => 'Admin']);
$app['route']->add('/admin/alerts', ['controller' => 'AlertsController', 'action' => 'index', 'namespace' => 'Admin']);
$app['route']->add('/admin/alert/{id:\d+}/del', ['controller' => 'AlertsController', 'action' => 'delete', 'namespace' => 'Admin']);






// $router->add('{controller}/{action}');
// $router->add('{controller}/{id:\d+}/{action}');
