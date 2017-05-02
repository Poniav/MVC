

<?php include_once(__DIR__.'/../Layout/Admin/header.php'); ?>
<?php include_once(__DIR__.'/../Layout/Admin/navbar.php'); ?>

  <div class="container">
    <section class="alerts">
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
              <h3 class="panel-title">Alertes</h3>
            </div>
            <div class="col-md-2">
              <a href="/admin/alerts/del"><button type="button" class="btn btn-block">Tous supprimer</button></a>
            </div>
              <div class="clearfix"></div>
        </div>
        <div class="well">
          <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Commentaire</th>
                    <th>Message</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($alerts as $alert) : ?>
                    <tr>
                      <td><?php echo $alert->id(); ?></td>
                      <td><a href="/admin/comment/<?php echo $alert->idCom(); ?>"><?php echo $alert->idCom(); ?></a></td>
                      <td><?php echo htmlspecialchars(strip_tags(substr($alert->content(), 0, 150))) . '...'; ?></td>
                      <td>
                        <div class="btn-group dropdown">
                          <button type="button" class="btn btn-danger">Action</button>
                          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="/admin/alert/<?php echo $alert->id(); ?>/del">Supprimer</a></li>
                                <li><a href="/admin/article/<?php echo $alert->id(); ?>/edit">Voir le commentaire</a></li>
                              </ul>
                        </div>
                      </td>
                  </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
        </div>
    </section>
  </div>
  </div>

<?php include_once(__DIR__.'/../Layout/Admin/footer.php'); ?>
