<?php include_once(__DIR__.'/../Layout/header.php'); ?>

  <div class="container">
    <section class="login well">
      <h3>Identification</h3>
        <?php if($auth->hasFlash('flash-warning')) : ?>
          <div class="alert alert-warning">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <?php echo $auth->getFlash('flash-warning'); ?>
          </div>
        <?php endif; ?>
        <?php if($auth->hasFlash('flash-error')) : ?>
            <div class="alert alert-danger">
              <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
              <?php echo $auth->getFlash('flash-error'); ?>
            </div>
        <?php endif; ?>
        <form class="" action="#" method="post">
            <div class="form-group">
              <label for="">Identifiant</label>
              <input type="text" name="username" class="form-control" id="username" required>
            </div>
            <div class="form-group">
              <label for="">Mot de passe</label>
              <input type="password" name="password" class="form-control" id="password" required>
            </div>
            <div class="form-group">
              <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="submit" class="btn btn-success">Se connecter</button>
              </div>
            </div>
        </form>
    </section>
  </div>
  </div>

<?php include_once(__DIR__.'/../Layout/footer.php'); ?>
