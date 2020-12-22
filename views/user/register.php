<?php include ROOT . '/views/layouts/header.php'; ?>
    <div class="registercontainer">
                    <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li id="errors"> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                     <?php if ($result): ?>
                        <p id="errors">Регистрация выполнена успешно, теперь вы можете войти в систему</p>
                        <?php endif; ?>
<div class="signupform">
      <h1>Регистрация</h1>
      <form method="post">
        <input type="text" id="regname" name="name" placeholder="Имя" value=""/>
        <input type="email" id="regemail" name="email" placeholder="E-mail" value=""/>
        <div class="passdiv">
        <input   type="password" id="pass" name="password" placeholder="Пароль" value=""/>
        <img id="showimg" src="/static/images/eye.png" class="showpass"/>
        </div>
        <input type="password" id="repass" name="repassword" placeholder="Повторите пароль" value=""/>
        <input  type="text" id="captcha" name="captcha" placeholder="Введите капчу">
        <img  id="captchaimage" src="/views/user/captcha.php">
        <br>
        <label id="iapprove"><input  type="checkbox" id="check" name="check"><font id="checktxt">Я даю свое согласие ОАО "НСТ" на обработку моих персоональных данных, в соответствии с Федеральным законом от 27.02.2006 года №152-ФЗ "О персоональных данных"</font></label>
        <p class="submit"><input type="submit" class="subutton" name="submit" value="Зарегистрироваться"></p>
      </form>
    </div>
    </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>