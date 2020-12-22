<?php include ROOT.'/views/layouts/header.php';?>

<div id="content">
    <div id="advantages">
        <div id="lap">
        <img id="like" src="static/images/like.png">
        <font id="topic1"><b id='advmain'>Огромный выбор</b><br>
        Наш ассортимент строительных и отделочных товаров настолько велик, 
        что вы безусловно сможете подобрать то, 
        что лучше всего подойдет для ваших целей</font>
        <img id="pb" src="static/images/pb.png">
        <font id="topic2"><b id='advmain'>Гуманные цены</b><br>
        Мы работаем напрямую с отечественными производителями строительных и отделочных материалов, 
        поэтому мы можем предложить вам товары по минимально возможным ценам</font>
        </div>
        <div id="har">
            <img id="handle" src="static/images/hwc.png"/>
            <br>
            <font id="topic3"><b id='advmain'>Бережная доставка и гарантия</b><br>
            Мы всегда аккуратно запаковываем товар при отправке, и транспортируем грузы, 
            тщательно соблюдая все правила безопасности, поэтому гарантируем, 
            что Вы получите свою покупку в целостности и сохранности</font>
            <img id="refresh" src="static/images/refresh.png"/>
            <font id="topic4"><b id='advmain'>Обмен и возврат</b><br>
            В случае, если Вы передумали или купленный товар Вам не подошел, 
            просто верните его нам в течение недели! Подробную информацию об условиях возврата
            читайте в разделе «Обмен и возврат» или уточняйте у наших менеджеров по телефону 8 800 555-35-35</font>
        </div>
    </div>
    <div id="catalog">
        <div id="ddm">
            <div class="but">
                <font id="ddm-text"><a id="addm" href="/catalog" style="color:white; text-decoration: none;">Каталог товаров</a> <div id="images">
                    <img id="mnog" src="/static/images/mnog.png"/>
                    <img id="mnog2" src="/static/images/mnog2.png"/>
                </div></font>
               
                 <div class="category-products">
                    <?php foreach ($categories as $categoryItem): ?>
                        <h4 class="panel-title">
                            <a   id="link" href="/category/<?php echo $categoryItem['id']; ?>">
                                <font id="menudata">
                                <?php echo $categoryItem['name']; ?>
                            </font>
                            </a>
                        </h4>
                    <?php endforeach; ?>
                </div> 

            </div>
            <div class="search" >
                <form id="search" method="post" action="/fullsearch">
                <input type="text" name="q" placeholder="Поиск по каталогу"  id="sl" autocomplete="off" onmouseover="" onblur="">
                <input type="submit" id="sb" name="search" value="">
                </form>
            </div>
            </div>
             
        </div>
          <div id="block-search-result">
                    <ul id="list-search-result">  
                    </ul>
                </div>      
    </div>

        <h2 class="title text-center" style="margin-left:20%;">Популярные товары</h2>
        <div id="features_items">
            <div id="clearer1">
            <?php foreach($latestProducts as $product):?>
            <div id="product">
                <a id="productname" href="/product/<?php echo $product['id']; ?>"><img  class="productimg" id="productimg<?php echo $product['id'];?>" src="<?php echo Product::getImage($product['id']); ?>" alt="" /></a>
                <p>
                    <a id="productname" href="/product/<?php echo $product['id']; ?>">
                        <?php echo $product['name']; ?>
                        </a>
                </p>
                <div id="center">
                <h3 style="margin-top:5px; margin-right:20px;"><?php echo $product['price']; ?> руб.</h3>
                <a href="#" class="add-to-cart" data-id="<?php echo $product['id']; ?>">Купить</a>
                <a href="#" class="added-to-cart" data-id="<?php echo $product['id']; ?>"   onmouseover="changeText(this,'Добавить еще?')" onmouseout="changeText(this,'В корзине')">В корзине</a>
                </div>
             </div>
                <?php endforeach;?>
         </div>
    </div>
    <div id="carousel">
        <div id="block-for-slider">
        <div id="viewport">
            <ul id="slidewrapper">            
             <?php foreach($latestActions as $action):?>
                <li class="slide"> 
               <div id="sldata"> 
                    <font id="fstxt"><a  style="color:black; border-bottom: 2px solid black; text-decoration: none;" href="/view/<?php echo $action['id']?>"><h3><?php echo $action['title'];?></h3></a></font>
                    <a class="slide-img" href="/view/<?php echo $action['id']?>"> <img alt="1" data-id="1"  src="<?php echo Action::getImage($action['id']); ?>"></a>
                </div>
                </li>
                 <?php endforeach;?>
            </ul>

            <div id="prev-next-btns">
                <div id="prev-btn"><img src="/static/images/left.png"></div>
                <div id="next-btn"><img src="/static/images/right.png"></div>
            </div>

            <ul id="nav-btns">
                <li class="slide-nav-btn" data-id="1"></li>
                <li class="slide-nav-btn" data-id="2"></li>
                <li class="slide-nav-btn" data-id="3"></li>
                <li class="slide-nav-btn" data-id="4"></li>
            </ul>
        </div>
    </div>
    </div>
</div>
<a href="#" class="scrollup">Наверх</a>  
<?php include ROOT . '/views/layouts/footer.php'; ?>