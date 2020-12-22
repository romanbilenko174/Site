<!DOCTYPE html>
<html lang="en">
    <head>
    	<link href="static/images/favicon.ico" rel="shortcut icon" type="image/x-icon" />
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php echo (Headers::getHeader($_SERVER['REQUEST_URI']));?></title>
        <link href="https://fonts.googleapis.com/css?family=Fira+Sans" rel="stylesheet">
        <link href= "/static/css/header.css" rel="stylesheet">
        <link href= "/static/css/footer.css" rel="stylesheet">
        <link href= "/static/css/mainpage.css" rel="stylesheet">
        <link href= "/static/css/about.css" rel="stylesheet">
        <link href= "/static/css/contact.css" rel="stylesheet">
        <link href= "/static/css/login.css" rel="stylesheet">
        <link href= "/static/css/register.css" rel="stylesheet">
        <link href= "/static/css/product.css" rel="stylesheet">
        <link href= "/static/css/category.css" rel="stylesheet">
        <link href= "/static/css/reviews.css" rel="stylesheet">
        <link href= "/static/css/deliveryandpayment.css" rel="stylesheet">
        <link href= "/static/css/news.css" rel="stylesheet">
        <link href= "/static/css/cart.css" rel="stylesheet">
        <link href= "/static/css/action.css" rel="stylesheet">
        <link href= "/static/css/restorepassword.css" rel="stylesheet">
    </head>
    <body>
        <section>
            <div class="header">
                <div class="content">
                <div id="background">
                    <ul class="navigation">
                        <li><a href="/action">Акции</a></li>
                        <li><a href="/deliveryandpayment">Доставка и оплата</a></li>
                        <li><a href="/about">О компании</a></li>
                        <li><a href="/reviews">Отзывы</a></li>
                        <li><a href="/contacts">Контакты</a></li>
                        <?php if (User::isGuest()): ?> 
                        <li><a href="/user/login">Вход</a></li>
                        <li><a href="/user/register">Регистрация</a></li>
                        <?php else: ?>
                        <li><a href="/personalcabinet">Личный кабинет</a></li>
                        <li><a href="/user/logout">Выход</a></li>
                        <?php endif; ?>
                    </ul>
                </div>
                  <?php
  $productsInCart = Cart::getProducts();
  $productsIds = array_keys($productsInCart);
  if (is_bool($productsInCart)){
   $totalPrice = 0;
}
else
{
    $products = Product::getProdustsByIds($productsIds);
    $totalPrice = Cart::getTotalPrice($products);
}
?>
                <div class="logo">
                   <a href="/"><img id='logo-img' src="/static/images/logo.jpg"></a>
                    <font id='dost'>Доставка по Челябинску и области через день с 09 до 21</font>
                    <font id='number'>8(800)555-35-35</font>
                    <a href="/cart"><img id='cart' src="/static/images/cart.png"></a>
                    <font id='cart-data'> В вашей корзине <font id="cart-count"><?php echo Cart::countItems()." ".Cart::getNumEnding(Cart::countItems(),array("товар","товара","товаров"));?></font> <font id="carttxt2">на сумму</font> <font id="cart-price"> <?php echo $totalPrice; ?> </font> <font id="carttxt">руб.</font><font id="cartnull">нет товаров</font></font>
                </div>
                <br>
            </div>
        </div>
        </section>
<div id="p_prldr"><div class="contpre"><span class="svg_anm"></span><br>Подождите<br><small>идет загрузка</small></div></div>