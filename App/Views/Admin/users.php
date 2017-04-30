

<?php include_once(__DIR__.'/../Layout/Admin/header.php'); ?>
<?php include_once(__DIR__.'/../Layout/Admin/navbar.php'); ?>

  <div class="container">
    <section class="users">
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
      <?php if($auth->hasFlash('flash-error')) : ?>
          <div class="col-md-12">
            <div class="row">
              <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <?php echo $auth->getFlash('flash-error'); ?>
              </div>
            </div>
          </div>
          <div class="clearfix"></div>
      <?php endif; ?>
      <div class="panel panel-default">
        <div class="panel-heading">
            <div class="col-md-10">
              <h3 class="panel-title">Utilisateurs</h3>
            </div>
            <div class="col-md-2">
              <a href="/admin/user/add" class=""><button type="button" class="btn btn-block">Ajouter</button></a>
            </div>
              <div class="clearfix"></div>
        </div>
        <div class="well">
          <table class="table">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Identifiant</th>
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>Email</th>
                    <th>Date d'ajout</th>
                    <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($users as $user) : ?>
                    <tr>
                      <td><?php echo $user->id(); ?></td>
                      <td><?php echo htmlspecialchars($user->username()); ?></td>
                      <td><?php echo htmlspecialchars($user->name()); ?></td>
                      <td><?php echo htmlspecialchars($user->firstname()); ?></td>
                      <td><?php echo htmlspecialchars($user->email()); ?></td>
                      <td><?php echo $user->addDate()->format('d/m/Y à H:i:s'); ?></td>
                      <td>
                        <div class="btn-group">
                          <button type="button" class="btn btn-danger">Action</button>
                          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                          <ul class="dropdown-menu" role="menu">
                            <li><a href="/admin/user/<?php echo $user->id(); ?>/del">Supprimer</a></li>
                            <li><a href="/admin/user/<?php echo $user->id(); ?>/edit">Modifier</a></li>
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
