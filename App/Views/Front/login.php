<?php include_once(__DIR__.'/../Layout/header.php'); ?>

  <div class="container">
    <section class="login">
      <h3>Identification</h3>
        <?php if($auth->hasFlash()) : ?>
          <div class="alert alert-success alert-dismissable">
            <?php echo $auth->getFlash(); ?>
          </div>
        <?php endif; ?>
        <form class="" action="#" method="post">
            <div class="form-group">
              <label for="">Login</label>
              <input type="text" name="username" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
              <label for="">Password</label>
              <input type="password" name="username" class="form-control" id="" placeholder="">
            </div>
            <div class="form-group">
              <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
                    <button type="button" class="btn btn-success">Se connecter</button>
              </div>
            </div>
        </form>
    </section>
  </div>
  </div>

<?php include_once(__DIR__.'/../Layout/footer.php'); ?>
