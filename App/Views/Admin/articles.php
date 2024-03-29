

<?php include_once(__DIR__.'/../Layout/Admin/header.php'); ?>
<?php include_once(__DIR__.'/../Layout/Admin/navbar.php'); ?>

  <div class="container">
    <section class="articles">
      <?php if($auth->hasFlash('flash-success')) : ?>
          <div class="col-md-12">
            <div class="row">
              <div class="alert alert-success">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $auth->getFlash('flash-success'); ?>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
      <?php endif; ?>
      <div class="panel panel-default">
          <div class="panel-heading">
              <div class="col-md-10">
                <h3 class="panel-title">Articles</h3>
              </div>
              <div class="col-md-2">
                <a href="/admin/article/add" class=""><button type="button" class="btn btn-block">Ajouter</button></a>
              </div>
                <div class="clearfix"></div>
          </div>
        <div class="well">
          <?php if(!empty($articles)) : ?>
          <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Titre</th>
                    <th>Contenu</th>
                    <th>Auteur</th>
                    <th>Date d'ajout</th>
                    <th>Dernière Modification</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($articles as $article) : ?>
                    <tr>
                      <td><?php echo $article->id(); ?></td>
                      <td><?php echo htmlspecialchars($article->title()); ?></td>
                      <td><?php echo htmlspecialchars($article->resumeBack()) . '...'; ?></td>
                      <td><?php echo htmlspecialchars($article->auteur()); ?></td>
                      <td><?php echo $article->addDate()->format('d/m/Y à H:i:s'); ?></td>
                      <td><?php echo $article->modDate()->format('d/m/Y à H:i:s'); ?></td>
                      <td>
                        <div class="btn-group">
                        <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">Action <span class="caret"></span></button>
                        <ul class="dropdown-menu" role="menu">
                          <li><a href="/admin/article/<?php echo $article->id(); ?>/del">Supprimer</a></li>
                          <li><a href="/admin/article/<?php echo $article->id(); ?>/edit">Modifier</a></li>
                        </ul>
                      </div>
                      </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            <?php else : ?>
              <div class="alert alert-info" role="alert">
                <p>Vous n'avez pas encore posté d'article. Vous pouvez en ajouter un en cliquant sur "Ajouter". </p>
              </div>
            <?php endif; ?>
        </div>
    </section>
  </div>
  </div>

<?php include_once(__DIR__.'/../Layout/Admin/footer.php'); ?>
