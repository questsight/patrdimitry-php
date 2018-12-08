<!DOCTYPE html>
<html>
  <?php site_head(); ?>
  <body class="body">
    <div class="login">
      <header class="login__header">
        <div class="login__thumb">
          <img class="login__image" src="/assets/images/logo/logo.png" alt="Сестричество во имя благоверного царевича Димитрия">
        </div>
        <h1 class="login__title">Сестричество во имя благоверного царевича Димитрия Московской Патриархии Русской Православной Церкви</h1>
      </header>
      <div class="login__content">
        <form class="form login-form" method="POST" action="">
          <input class="login-form__input" type="email" name="login" placeholder="Логин (E-mail)" value="<?php echo $login; ?>" maxlength="30" required>
          <input class="login-form__input" type="password" name="password" placeholder="Пароль" value="<?php echo $password; ?>" maxlength="30" required>
          <input class="button button_bg_theme button_size_large" type="submit" name="submit" value="Войти">
          <?php if ( isset( $errors ) && is_array( $errors ) ) : ?>
          <ul class="form__error">
            <?php foreach ( $errors as $error ) : ?>
            <li><?php echo $error; ?></li>
          <?php endforeach; ?>
          </ul>
        <?php endif; ?>
        </form>
      </div>
    </div>
    <script src="/libs/js/jquery.min.js"></script>
    <script src="/assets/js/common.min.js"></script>
  </body>
</html>
