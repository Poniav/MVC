<?php include_once(__DIR__.'/../Layout/header.php'); ?>

  <div class="container">
    <div class="col-md-10">
      <div class="row">
      <ol class="breadcrumb breadcrumb-arrow">
                  <li><a href="/"><i class="glyphicon glyphicon-home"></i> Home</a></li>
                  <li class="active"><span><i class="glyphicon glyphicon-calendar"></i><?php echo htmlspecialchars($articles->title()); ?></span></li>
      </ol>
      <section class="article">
            <article class="well">
              <header>
                <h1><?php echo htmlspecialchars($articles->title()); ?></h1>
                <p>by Jean Forteroche | {{ articles.addDate|date("d/m/Y", "Europe/Paris")  }} | {{ articles.addDate|date('h:i:s')  }}</p>
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
    <!-- {% if comments is defined %}
        {% for comment in comments %}
          {% include 'Front/_comments.twig' %}
        {% endfor %}
        {% else %}
        <div class="alert alert-info" role="alert">
            <p>Aucun commentaire n'a été posté. Soyez le premier à donner votre avis.</p>
        </div>
    {% endif %}
    </div> -->

    <!-- <form action="#" method="post" id="form-comment">
            <h4 class="headcom">Ajouter un commentaire</h3>
            <input type="hidden" name="idparent" value="0" id="idparent">
 -->

  </div>

<?php include_once(__DIR__.'/../Layout/footer.php'); ?>
