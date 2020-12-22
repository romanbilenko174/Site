<?php include ROOT . '/views/layouts/header.php'; ?>
    <div class="pceditcontainer" style="background-color: #0ca3d2;">
               
                    
              
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li id="errors"> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                     <?php if ($result): ?>
                        <p id="errors">Изменение успешно!</p>
                        <?php endif; ?>
                    <div id="callbackform">
      <h1>Изменение личных данных</h1>
      <form method="post">
        <p><input  type="text" required class="cabem" name="name" placeholder="Имя" value="<?php echo $name; ?>"/></p>
        <p><input type="password" required name="password" class="cabtxt" placeholder="Новый пароль" value=""/></p>
        <p><input type="text"  id="zakphone"  name="phone" class="cabtxt" placeholder="Адрес" value="<?php echo $phone; ?>"></p>
        <p><input type="text"  name="adress" class="cabtxt" placeholder="Адрес" value="<?php echo $adress; ?>"/></p>
        <p><input type="text" id="captchatxt" name="captcha" placeholder="Введите капчу"></p>
        <p><img  id="captchapng" src="/views/user/captcha.php"/></p>
        <p class="submit" id="subcont"><input type="submit" class="subbutton" name="submit" value="Изменить"></p>
      </form>
    </div>
            </div>

<?php include ROOT . '/views/layouts/footer.php'; ?>