

<?php include_once(__DIR__.'/../Layout/Admin/header.php'); ?>
<?php include_once(__DIR__.'/../Layout/Admin/navbar.php'); ?>

  <div class="container">
    <section class="comments">
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
                     <th>Modération</th>
                     <th></th>
                  </tr>
                </thead>
                <tbody>
                  <?php if(isset($comments)) : ?>
                  <?php foreach($comments as $comment) : ?>
                    <tr>
                      <td><?php echo $comment->id(); ?></td>
                      <td><a href="/admin/article/<?php echo $comment->idNews(); ?>/edit"><?php echo $comment->idNews(); ?></a></td>
                      <td><?php echo htmlspecialchars(substr($comment->content(), 0, 45)) . '...'; ?></td>
                      <td><?php echo htmlspecialchars($comment->membre()); ?></td>
                      <td><?php echo $comment->addDate()->format('d/m/Y à H:i:s'); ?></td>
                      <?php if($comment->moderate() == 0) : ?>
                        <td><span class="badge badge-default">Non</span></td>
                        <?php else : ?>
                          <td><span class="badge">Oui</span></td>

                      <?php endif; ?>
                      <td>
                        <div class="btn-group dropdown">
                          <button type="button" class="btn btn-danger">Action</button>
                          <button type="button" class="btn btn-danger dropdown-toggle" data-toggle="dropdown">
                            <span class="caret"></span>
                            <span class="sr-only">Toggle Dropdown</span>
                          </button>
                              <ul class="dropdown-menu" role="menu">
                                <li><a href="/admin/comment/<?php echo $comment->id(); ?>/mod">Modérer</a></li>
                                <li><a href="#myModal" data-toggle="modal" data-link="/admin/comment/<?php echo $comment->id(); ?>/mod" data-id="<?php echo $comment->id(); ?>" data-date="<?php echo $comment->addDate()->format('d/m/Y à H:i:s'); ?>" data-cont="<?php echo $comment->content(); ?>" data-auteur="<?php echo $comment->membre(); ?>" onclick="getData(this)">Voir le commentaire</a></li>
                              </ul>
                        </div>
                      </td>
                  </tr>
                  <?php endforeach; ?>
                <?php endif; ?>
                </tbody>
              </table>
        </div>
    </section>
  </div>
  </div>
  <!-- Modal -->
  <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Commentaire #<span class="comment-id"></span></h4>
      </div>
      <div class="modal-body">
        <p><strong>Auteur : </strong><span class="comment-auteur"></span></p>
        <p><strong>Date : </strong><span class="comment-date"></span></p>
        <p><strong>Commentaire : </strong><span class="comment-content"></span></p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Fermer</button>
        <a class="comment-link" href="#"><button type="button" class="btn btn-danger navbar-btn">Modérer</button></a>
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">

      function getData(obj){
        var id = obj.getAttribute('data-id');
        var auteur = obj.getAttribute('data-auteur');
        var dataContent = obj.getAttribute('data-cont');
        var dataDate = obj.getAttribute('data-date');
        var dataLink = obj.getAttribute('data-link');

        var commentId = document.querySelector(".comment-id");
        var commentAuteur = document.querySelector(".comment-auteur");
        var commentDate = document.querySelector(".comment-date");
        var commentContent = document.querySelector(".comment-content");
        var commentLink = document.querySelector(".comment-link");
        commentId.textContent = id;
        commentAuteur.textContent = auteur;
        commentDate.textContent = dataDate;
        commentContent.textContent = dataContent;
        commentLink.href = dataLink;
      }
</script>


<?php include_once(__DIR__.'/../Layout/Admin/footer.php'); ?>
