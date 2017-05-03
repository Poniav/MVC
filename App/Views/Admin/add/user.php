

<?php include_once(__DIR__.'/../../Layout/Admin/header.php'); ?>
<?php include_once(__DIR__.'/../../Layout/Admin/navbar.php'); ?>

  <div class="container">
    <section class="users">
      <div class="panel panel-default">
          <div class="panel-heading">
              <div class="col-md-10">
                <h3 class="panel-title">Ajouter un utilisateur</h3>
              </div>
              <div class="col-md-2">
                <a href="/admin/users" class=""><button type="button" class="btn btn-block">Tous les utilisateurs</button></a>
              </div>
                <div class="clearfix"></div>
          </div>
        <div class="well">

            <form action="#" method="post">

                <div class="form-group">
                  <label>Utilisateur :</label>
                  <input type="text" class="form-control" name="username" value="<?php echo $form->getValue('username'); ?>" id="username" placeholder="Choisir un identifiant" required>
                </div>

                <?php if($user) : ?>
                    <?php if(isset($user->erreurs()['username'])) : ?>
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $user->erreurs()['username']; ?>
                      </div>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="form-group">
                  <label>Nom : </label><small> (Facultatif)</small>
                  <input type="text" class="form-control" name="name" id="name" value="<?php echo $form->getValue('name'); ?>" placeholder="Votre nom" >
                </div>

                <?php if($user) : ?>
                    <?php if(isset($user->erreurs()['name'])) : ?>
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $user->erreurs()['name']; ?>
                      </div>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="form-group">
                  <label>Prénom :</label><small> (Facultatif)</small>
                  <input type="text" class="form-control" name="firstname" id="firstname" value="<?php echo $form->getValue('firstname'); ?>" placeholder="Votre prénom" >
                </div>

                <?php if($user) : ?>
                    <?php if(isset($user->erreurs()['firstname'])) : ?>
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $user->erreurs()['firstname']; ?>
                      </div>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="form-group">
                  <label>Mot de passe :</label>
                  <input type="password" class="form-control" name="password" id="password" required>
                </div>

                <?php if($user) : ?>
                    <?php if(isset($user->erreurs()['password'])) : ?>
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $user->erreurs()['password']; ?>
                      </div>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="form-group">
                  <label>Email :</label>
                  <input type="text" class="form-control" name="email" id="email" value="<?php echo $form->getValue('email'); ?>" placeholder="Votre adresse email" required>
                </div>
                <?php if($user) : ?>
                    <?php if(isset($user->erreurs()['email'])) : ?>
                      <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                      <?php echo $user->erreurs()['email']; ?>
                      </div>
                    <?php endif; ?>
                <?php endif; ?>

                <div class="form-group">
                  <div class="col-md-2 pull-right">
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
