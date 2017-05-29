<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
      <a class="navbar-brand" href="/admin/home">Administration</a>
    </div>
    <div id="navbar" class="navbar-collapse collapse" aria-expanded="false" style="height: 1px;">
      <ul class="nav navbar-nav">
        <li <?php echo $auth->navbarURI('home'); ?> ><a href="/admin/home">Accueil</a></li>
        <li <?php echo $auth->navbarURI('users'); ?> ><a href="/admin/users">Utilisateurs</a></li>
        <li <?php echo $auth->navbarURI('articles'); ?> ><a href="/admin/articles">Articles</a></li>
        <li <?php echo $auth->navbarURI('comments'); ?> ><a href="/admin/comments">Commentaires</a></li>
        <li <?php echo $auth->navbarURI('alerts'); ?> ><a href="/admin/alerts">Alertes</a></li>
      </ul>
      <a href="/"><button type="button" class="btn btn-danger navbar-btn">Retour au site</button></a>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> <?php echo $auth->getAttribute('authUser'); ?></a></li>
        <li><a href="/admin/logout"><span class="glyphicon glyphicon-off"></span> Se déconnecter</a></li>
      </ul>
    </div>
  </div>
</nav>
