
<?php include_once(__DIR__.'/../Layout/header.php'); ?>

  <div class="container">
    <section class="alerts">
    <div class="col-md-10">
        <div class="row">
        <h2 class="example-title">Signaler</h2>
        <div class="modal2">
          <div class="modal-dialog2">
            <div class="modal-content">
              <div class="modal-header">
                <?php if($auth->hasFlash()) : ?>
                  <div class="alert alert-success alert-dismissable">
                    <?php echo $auth->getFlash(); ?>
                  </div>
                <?php endif; ?>
                <p>Vous souhaitez signaler un commentaire qui vous semble enfreindre les règles du blog.</p>
              </div>
              <form action="#" method="post">
              <div class="modal-body">
                <input type="hidden" name="idCom" value="<?php echo $id; ?>">
                <div class="row">
                  <div class="col-xs-12">
                    <label>Message</label>
                    <textarea name="content" class="form-control" rows="3" placeholder="Veuillez saisir votre message" required></textarea>
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="reset" class="btn btn-default">Annuler</button>
                <button type="submit" class="btn btn-success">Signaler</button>
              </div>
            </div>
          </form>
          </div>
        </div>
        </div>
      </div>
    </section>
  </div>
  </div>

  <?php include_once(__DIR__.'/../Layout/footer.php'); ?>
