<?php include ROOT . '/views/layouts/header.php'; ?>

<section>
    <div class="catalogcontainer">
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

                </div><!--features_items-->
</section>

<?php include ROOT . '/views/layouts/footer.php'; ?>