<?php include ROOT . '/views/layouts/header.php'; ?>
<div class="restorecontainer">
<?php if ($result): ?>
                    <p style="text-align: center; color: white;">Пароль успешно восстановлен. Проверьте свою почту.</p>
                <?php else: ?>
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li id="errors"> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
<div id="callbackform">
      <h1>Восстановление пароля</h1>
      <form method="post">
        <p><input  type="text" required class="cabem" name="data" placeholder="Введите E-mail или Логин" value="<?php echo $userEmail; ?>"/></p>
        <p><input type="text" id="captchatxt" name="captcha" placeholder="Введите капчу"></p>
        <p><img  id="captchapng" src="/views/user/captcha.php"/></p>
        <p class="submit" id="subcont"><input type="submit" class="subbutton" name="submit" value="Восстановить"></p>
      </form>
    </div>
  </div>
<?php endif; ?>
<?php include ROOT . '/views/layouts/footer.php'; ?>