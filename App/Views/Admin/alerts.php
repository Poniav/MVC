

<?php include_once(__DIR__.'/../Layout/Admin/header.php'); ?>
<?php include_once(__DIR__.'/../Layout/Admin/navbar.php'); ?>

  <div class="container">
    <section class="comments">
      <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Alertes</h3>
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
                      <td><?php echo htmlspecialchars(substr($alert->content(), 0, 45)) . '...'; ?></td>
                      <td>
                        <div class="btn-group dropdown">
                          <button type="button" class="btn btn-danger">Action</button>
                          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="/admin/article/<?php echo $alert->id(); ?>/del">Supprimer</a></li>
                                <li><a href="/admin/article/<?php echo $alert->id(); ?>/edit">Modifier</a></li>
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
