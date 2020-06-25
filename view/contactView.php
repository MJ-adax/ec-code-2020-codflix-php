<?php ob_start(); ?>

<div class="landscape">
  <div class="bg-black">
    <div class="row no-gutters">
      <div class="col-md-6 full-height bg-white">
        <div class="auth-container">
          <h2><span>Cod</span>'Flix</h2>
          <h3>Contactez Nous</h3>

          <form method="post" action="index.php?action=login" class="custom-form">

            <div class="form-group">
              <label for="email">Votre Mail</label>
              <input type="email" name="email" value="" id="email" class="form-control" />
            </div>

            <div class="form-group">
              <label for="message">Votre Message</label>
              <textarea class="form-control"></textarea>
            </div>

            <div class="form-group">
              <div class="row">
                <div class="col-md-6">
                  <input type="submit" name="Valider" class="btn btn-block bg-red" />
                </div>
                <div class="col-md-6">
                  <a href="index.php?action=signup" class="btn btn-block bg-blue">Inscription</a>
                </div>
              </div>
            </div>

            <span class="error-msg">
              <?= isset( $error_msg ) ? $error_msg : null; ?>
            </span>
          </form>
        </div>
      </div>
      <div class="col-md-6 full-height">
        <div class="auth-container">
          <h1>Cod'Flix est à votre écoute</h1>
        </div>
      </div>
    </div>
  </div>
</div>


<?php $content = ob_get_clean(); ?>

<?php require('dashboard.php'); ?>