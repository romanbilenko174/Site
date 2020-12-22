<?php include ROOT . '/views/layouts/header.php'; ?>
    <div style="background: #0ca3d2;"class="pccontainer">
              <div id="callbackform">
      <h1>Добро пожаловать в личный кабинет, <?php echo $user['name'];?>!</h1>
      <form method="post">
        <h3 style="text-align:center">Вам доступны следующие возможности:</h3>
         <li style="text-align: center; list-style: none; "><a style="color:#0ca3d2; " href="/personalcabinet/edit">Редактировать данные</a></li>
         <li style="text-align: center; list-style: none; "><a style="color:#0ca3d2; " href="#">История покупок</a></li>
         <li style="text-align: center; list-style: none; "><a style="color:#0ca3d2; " href="/cart/checkout">Оформить заказ</a></li>
      </form>
    </div>
    </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>