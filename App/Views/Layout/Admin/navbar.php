<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="/admin/home">Administration</a>
    </div>
    <ul class="nav navbar-nav">
      <li <?php echo $auth->navbarURI('home'); ?> ><a href="/admin/home">Accueil</a></li>
      <li <?php echo $auth->navbarURI('users'); ?> ><a href="/admin/users">Utilisateurs</a></li>
      <li <?php echo $auth->navbarURI('articles'); ?> ><a href="/admin/articles">Articles</a></li>
      <li <?php echo $auth->navbarURI('comments'); ?> ><a href="/admin/comments">Commentaires</a></li>
      <li <?php echo $auth->navbarURI('alerts'); ?> ><a href="/admin/alerts">Signalements</a></li>
    </ul>
    <a href="/"><button type="button" class="btn btn-danger navbar-btn">Retour au site</button></a>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $auth->getAttribute('authUser'); ?></a></li>
      <li><a href="/admin/logout"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
    </ul>
  </div>
</nav>
