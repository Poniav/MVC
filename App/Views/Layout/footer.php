
  </div>
  <div class="clearfix"></div>
  <footer class="footer">
      <div class="container">
            <div class="col-md-6 text-left">
              <p class="footer-copyright">Copyright © 2017 Jean Forteroche. Tous droits réservés.</p>
            </div>
            <div class="col-md-6 text-right">
              <?php if(isset($auth)) : ?>
                <?php if($auth->isAuth()) : ?>
                    <p class="footer-copyright"><a href="/admin/home">Accès Administration</a></p>
                  <?php else: ?>
                    <p class="footer-copyright"><a href="/login">Accès Administration</a></p>
                <?php endif; ?>
              <?php endif; ?>
            </div>
        </div>
    </footer>


    <script src="/assets/js/jquery-1.10.1.min.js"></script>
    <script src="/assets/js/boostrap.min.js"></script>
    <script src="/assets/js/app.js"></script>
</body>
</html>
