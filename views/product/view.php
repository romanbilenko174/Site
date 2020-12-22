<?php include ROOT . '/views/layouts/header.php'; ?>
    <div class="productcontainer">
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
    </div>
                <div class="product-information" ><!--product-details-->
                                <img class="productimage" id="productimg<?php echo $product['id'];?>"src="<?php echo Product::getImage($product['id']); ?>" alt="" />

                                <?php if ($product['is_new']): ?>
                                    <img src="/static/images/product-details/new.jpg" class="newarrival" alt="" />
                                <?php endif; ?>
                                <div id="productdata">
                                <h2><?php echo $product['name']; ?></h2>
                                <p>Код товара: <?php echo $product['code']; ?></p>
                                <span>
                                    <span> Стоимость: <?php echo $product['price']; ?> руб.</span>
                                </span>
                                <p><b>Наличие:</b> <?php echo Product::getAvailabilityText($product['availability']); ?></p>
                                <p><b>Производитель:</b> <?php echo $product['brand']; ?></p>
                                <div id="pmbuttons">
                                    <input  type="submit" class="minus" value="-">
                                    <input type="text"  disabled class="productscounter" style="text-align:center;" size="5" value="1"></input>
                                     <input type="submit" class="plus" value="+">
                                </div>
                                <div id="buttons">
                                       <a href="#"  class="add-to-cart" data-id="<?php echo $product['id']; ?>">Купить</a>
                                       <a href="#" class="added-to-cart" data-id="<?php echo $product['id']; ?>"   onmouseover="changeText(this,'Добавить еще?')" onmouseout="changeText(this,'В корзине')">В корзине</a>
                    </div>
                    </div>
                </div>
                <div class="productdescription">                                
                            <br/>
                            <h5>Описание товара</h5>
                            <font id="descriptiontxt">
                            <?php echo $product['description']; ?>
                        </font>
                    </div>
    </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>