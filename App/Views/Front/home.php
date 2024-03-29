
<?php include_once(__DIR__.'/../Layout/header.php'); ?>

  <div class="container">
    <section class="home">
        <?php foreach ($articles as $article) : ?>
          <article class="well">
            <h1><a href="/article/<?php echo $article->id(); ?>"><?php echo $article->title(); ?></a></h1>
            <p><?php echo $article->resume(); ?></p>
            <footer>
              <a href="/article/<?php echo $article->id(); ?>" class="btn btn-default" role="button">Voir la suite</a>
            </footer>
          </article>
        <?php endforeach; ?>
    </section>
  </div>
  </div>

<?php include_once(__DIR__.'/../Layout/footer.php'); ?>
