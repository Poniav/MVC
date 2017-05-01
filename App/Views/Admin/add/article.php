

<?php include_once(__DIR__.'/../../Layout/Admin/header.php'); ?>
<?php include_once(__DIR__.'/../../Layout/Admin/navbar.php'); ?>

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
                <h3 class="panel-title">Ajouter un article</h3>
              </div>
              <div class="col-md-2">
                <a href="/admin/articles" class=""><button type="button" class="btn btn-block">Tous les articles</button></a>
              </div>
                <div class="clearfix"></div>
          </div>
        <div class="well">

            <form action="#" method="post">

              <input type="hidden" name="auteur" value="<?php echo $auth->getAttribute('authUser'); ?>">

                <div class="form-group">
                  <label>Titre</label>
                  <input type="text" class="form-control" name="title" id="title" placeholder="Ajouter un titre" required>
                </div>

                <div class="form-group">
                  <label>Contenu</label>
                  <textarea name="content" class="form-control" id="content" rows="8" cols="80"></textarea>
                </div>

                <div class="form-group">
                  <div class="col-md-2">
                    <button type="submit" class="btn btn-warning btn-block">Ajouter</button>
                  </div>
                  <div class="clearfix"></div>
                </div>

            </form>

        </div>
    </section>
  </div>
  </div>

<?php include_once(__DIR__.'/../../Layout/Admin/footer.php'); ?>
