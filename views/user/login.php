<?php include ROOT . '/views/layouts/header.php'; ?>
<section>
    <div id="contentlogin">
                <?php if (isset($errors) && is_array($errors)): ?>
                    <ul>
                        <?php foreach ($errors as $error): ?>
                            <li id="errors"> - <?php echo $error; ?></li>
                        <?php endforeach; ?>
                    </ul>
                <?php endif; ?>
                <section class="container">
    <div class="login">
      <h1>Войти в личный кабинет</h1>
      <form method="post">
        <p><input type="email" class="logline" name="email" placeholder="Email"></p>
        <p><input  class="passline" type="password" name="password" placeholder="Пароль"></p>
        <p class="remember_me">
          <label>
            <input type="checkbox" name="remember_me" id="remember_me">
            Запомнить меня
          </label>
        </p>
        <p class="submit"><input type="submit" class="subutton" name="submit" value="Войти"></p>
      </form>
    </div>

    <div class="login-help">
      <a href="/restorepassword">Забыли пароль?</a> Восстановите его!
    </div>
  </section>
    </div>            
</section>
<?php include ROOT . '/views/layouts/footer.php'; ?>