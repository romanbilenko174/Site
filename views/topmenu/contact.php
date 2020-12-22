<?php include ROOT . '/views/layouts/header.php'; ?>
    <div class="contcontainer">
<p style="text-align: center; color:white;" >При возникновении вопросов вы можете позвонить по номеру 8(800)555-35-35 или воспользоваться формой обратной связи</p>
                <div id="results" style="text-align: center;">
                <?php if (isset($errors) && is_array($errors)): ?>
                        <ul>
                            <?php foreach ($errors as $error): ?>
                                <li id="errors"> - <?php echo $error; ?></li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>
                <?php if ($result): ?>
                    <p style="text-align: center; color:white;">Сообщение отправлено! Мы ответим Вам на указанный email.</p>
                    <?php endif; ?>
                 <div id="callbackform">
      <h1>Обратная связь</h1>
      <form method="post">
        <p><input  type="email" required class="cabem" name="userEmail" placeholder="E-mail" value="<?php echo $userEmail; ?>"/></p>
        <p><textarea id="comments" placeholder="Сообщение" class="common"></textarea></p>
        <p><input type="text" id="captchatxt" name="captcha" placeholder="Введите капчу"></p>
        <p><img  id="captchapng" src="/views/user/captcha.php"/></p>
        <p class="submit" id="subcont"><input type="submit" class="subbutton" name="submit" value="Отправить"></p>
      </form>
    </div>
                
                
<h3 id="abouttxt">Мы находимся по адресу ул. Курчатова 7.<br> Вы можете увидеть расположение компании на карте ниже</h3>
            </div>
            <div id="map">
            <script type="text/javascript" charset="utf-8" async src="https://api-maps.yandex.ru/services/constructor/1.0/js/?um=constructor%3Acc6501708bbff3a3a230a23e899e33db560547c6c845d64de0db88c971ccf8f4&amp;width=100%25&amp;height=483&amp;lang=ru_RU&amp;scroll=true"></script>
        </div>


<?php include ROOT . '/views/layouts/footer.php'; ?>