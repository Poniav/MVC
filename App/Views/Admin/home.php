

<?php include_once(__DIR__.'/../Layout/Admin/header.php'); ?>
<?php include_once(__DIR__.'/../Layout/Admin/navbar.php'); ?>

  <div class="container">
    <section class="home">
        <a href="/admin/users">
          <div class="col-md-6 well text-center">
            <div style="font-size: 70px; line-height: 1.5em;">
              <i class="fa fa-user" aria-hidden="true"></i>
            </div>
            <p>Gestion des <strong>Utilisateurs</strong></p>
          </div>
        </a>
        <a href="/admin/articles">
          <div class="col-md-6 well text-center">
            <div style="font-size: 70px; line-height: 1.5em;">
              <i class="fa fa-file" aria-hidden="true"></i>
            </div>
            <p>Gestion des <strong>Articles</strong></p>
          </div>
        </a>
        <a href="/admin/comments">
          <div class="col-md-6 well text-center">
            <div style="font-size: 70px; line-height: 1.5em;">
              <i class="fa fa-comment" aria-hidden="true"></i>
            </div>
            <p>Gestion des <strong>Commentaires</strong></p>
          </div>
        </a>
        <a href="/admin/alerts">
          <div class="col-md-6 well text-center">
            <div style="font-size: 70px; line-height: 1.5em;">
              <i class="fa fa-bell" aria-hidden="true"></i>
            </div>
            <p>Gestion des <strong>Alertes</strong></p>
          </div>
        </a>
    </section>
  </div>
  </div>

<?php include_once(__DIR__.'/../Layout/Admin/footer.php'); ?>
