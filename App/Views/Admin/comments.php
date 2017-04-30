

<?php include_once(__DIR__.'/../Layout/Admin/header.php'); ?>
<?php include_once(__DIR__.'/../Layout/Admin/navbar.php'); ?>

  <div class="container">
    <section class="comments">
      <div class="panel panel-default">
            <div class="panel-heading">
              <h3 class="panel-title">Commentaires</h3>
            </div>
        <div class="well">
          <table class="table">
                <thead>
                  <tr>
                     <th>#</th>
                     <th>Article</th>
                     <th>Contenu</th>
                     <th>Auteur</th>
                     <th>Date d'ajout</th>
                     <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach($comments as $comment) : ?>
                    <tr>
                      <td><?php echo $comment->id(); ?></td>
                      <td><a href="/admin/article/<?php echo $comment->idNews(); ?>/edit"><?php echo $comment->idNews(); ?></a></td>
                      <td><?php echo htmlspecialchars(substr($comment->content(), 0, 45)) . '...'; ?></td>
                      <td><?php echo htmlspecialchars($comment->membre()); ?></td>
                      <td><?php echo $comment->addDate()->format('d/m/Y à H:i:s'); ?></td>
                      <td>
                        <div class="btn-group dropdown">
                          <button type="button" class="btn btn-danger">Action</button>
                          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="/admin/comments/<?php echo $comment->id(); ?>/del">Supprimer</a></li>
                                <li><a href="/admin/comments/<?php echo $comment->id(); ?>/edit">Modifier</a></li>
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
