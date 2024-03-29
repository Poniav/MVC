<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo isset($title) ? $title : null; ?></title>
    <meta name="description" content="<?php echo isset($description) ? $description : null; ?>" />
    <link href="/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/assets/css/bootflat.css" rel="stylesheet">
    <link href="/assets/css/app.css" rel="stylesheet">
    <!--[if lt IE 9]>
      <script src="https://cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
  <section class="frontnav">
      <nav class="navbar navbar-default">
          <div class="container">
            <div class="navbar-header">
            </div>
            <div id="navbar">
              <ul class="nav navbar-nav">
                <li <?php echo $auth->navbarUrl('/'); ?>><a href="/">Home</a></li>
                <li <?php echo $auth->navbarUrl('/auteur'); ?>><a href="/auteur">A propos de l'Auteur</a></li>
              </ul>
            </div><!--/.nav-collapse -->
          </div>
        </nav>
    </section>
    <div class="clearfix"></div>
    <header class="header text-center">
      <div class="container">
          <h1><a href="/">Jean Forteroche</a></h1>
          <h2>Blog</h2>
      </div>
    </header>
