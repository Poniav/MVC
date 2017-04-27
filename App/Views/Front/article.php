<?php include_once(__DIR__.'/../Layout/header.php'); ?>

  <div class="container">
    <div class="col-md-10">
      <div class="row">
      <ol class="breadcrumb breadcrumb-arrow">
                  <li><a href="/"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                  <li class="active"><span><?php echo htmlspecialchars($articles->title()); ?></span></li>
      </ol>
      <section class="article">
            <article class="well">
              <header>
                <h1><?php echo htmlspecialchars($articles->title()); ?></h1>
                <p>by Jean Forteroche | <?php echo $articles->addDate()->format('d/m/Y'); ?> | <?php echo $articles->addDate()->format('H:i:s'); ?></p>
              </header>
              <p><?php echo $articles->content(); ?></p>
            </article>
      </section>
      </div>
    </div>

    <div class="col-md-10">
    <h3>Commentaires</h1>
    <?php if(isset($comments)) : ?>
      <?php foreach ($comments as $comment): ?>
          <?php include(__DIR__.'/../Front/_comments.php'); ?>
      <?php endforeach; ?>
      <?php else : ?>
      <div class="alert alert-info" role="alert">
          <p>Aucun commentaire n'a été posté. Soyez le premier à donner votre avis.</p>
      </div>
    <?php endif; ?>

        <div class="panel panel-danger">
              <div class="panel-heading">
                <h3 class="panel-title">Ajouter un commentaire</h3>
              </div>
              <div class="panel-body">
                <?php if($auth->hasFlash()) : ?>
                  <div class="alert alert-success alert-dismissable">
                    <?php echo $auth->getFlash(); ?>
                  </div>
                <?php endif; ?>
                <form action="#" method="post" id="form-comment">
                        <input type="hidden" name="idparent" value="0" id="idparent">
                        <input type="hidden" name="idNews" value="<?php echo $articles->id(); ?>" id="idNews">
                        <div class="form-group">
                          <label>Membre</label>
                          <input type="text" class="form-control" name="membre" id="membre" placeholder="Veuillez saisir un pseudo" required>
                        </div>
                        <div class="form-group">
                          <label>Ajouter un commentaire :</label>
                          <textarea class="form-control" name="content" id="content" rows="5" required></textarea>
                        </div>
                        <div class="form-group">
                          <button type="submit" class="btn btn-success">Envoyer</button>
                        </div>
                </form>
              </div>
            </div>

  </div>

<?php include_once(__DIR__.'/../Layout/footer.php'); ?>
