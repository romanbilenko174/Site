<?php include ROOT . '/views/layouts/header.php'; ?>
<div id="checkoutcontainer" style="background: #0ca3d2; ">
    <?php if (User::isGuest()):?>
        <div id="callbackform">
            <h1>Заказ товаров доступен только авторизированным пользователям. Пожалуйста авторизуйтесь</h1>
            <p id="guestcenter"><a id="guestlinks" href="/user/login">Войти</a></p>
            <p id="guestcenter"><a id="guestlinks" href="/user/register">Зарегистрироваться</a></p>
        </div>
    <?php else: ?>
<p id="errors"><?Cart::getNumEnding($totalQuantity,array("Выбран","Выбрано","Выбрано"));?> <?php echo $totalQuantity.' '.Cart::getNumEnding($totalQuantity,array("товар","товара","товаров"));?>, на сумму: <?php echo $totalPrice; ?> руб.</p><br/>
                        <?php if (!$result): ?>                        
                                <?php if (isset($errors) && is_array($errors)): ?>
                                    <ul>
                                        <?php foreach ($errors as $error): ?>
                                            <li id="errors"> - <?php echo $error; ?></li>
                                        <?php endforeach; ?>
                                    </ul>
                                <?php endif; ?>
                                <p id="errors">Заполните форму для создания вашего заказа. Мы свяжемся с вами в кратчайшие сроки</p>
                                <?php else: ?>
                        <p id="errors">Спасибо за заказ. Мы свяжемся с вами.</p>
                    <?php endif; ?>
 
<div id="callbackform">
      <h1>Оформление заказа</h1>
      <form method="post">
        <p><input  type="text" required class="cabem" name="userName" placeholder="Ваше имя" value="<?php echo $userName; ?>"/></p>
        <p><input type="text"  id="zakphone" required name="userPhone" class="cabtxt" placeholder="Номер телефона" value="<?php echo $userPhone;?>"></p>
        <p><input type="text"  required name="userAdress" class="cabtxt" placeholder="Номер телефона" value="<?php echo $userAdress;?>"></p>
        <p><textarea id="comments" name="userComment" placeholder="Сообщение" class="common"></textarea></p>
        <p><input type="text" id="captchatxt" name="captcha" placeholder="Введите капчу"></p>
        <p><img  id="captchapng" src="/views/user/captcha.php"/></p>
        <p class="submit" id="subcont"><input type="submit" class="subbutton" name="submit" value="Оформить"></p>
      </form>
    </div>
                     
                    <?php endif;?>
    </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>