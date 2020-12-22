<?php include ROOT . '/views/layouts/header.php'; ?>
                <div class="features_items">
                    <?php if ($productsInCart): ?>
                        <p style="text-align: center;">Товары, которые вы добавили в корзину</p>
                        <table id="cartprod">
                            <tr>
                                <th>Код товара</th>
                                <th>Название</th>
                                <th>Стомость, руб.</th>
                                <th>Количество, шт</th>
                            </tr>
                            <?php foreach ($products as $product): ?>
                                <tr>
                                    <td><?php echo $product['code'];?></td>
                                    <td>
                                        <a style="text-decoration: none; color:#002b65;" href="/product/<?php echo $product['id'];?>">
                                            <?php echo $product['name'];?>
                                        </a>
                                    </td>
                                    <td><?php echo $product['price'];?></td>
                                    <td><?php echo $productsInCart[$product['id']];?></td> 
                                    <td>
                                        <a id="delete" data-id="<?php echo $product['id'];?>" style="text-decoration: none; color:red;" href="/cart/delete/<?php echo $product['id'];?>">
                                            Удалить
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                                <tr>
                                    <td colspan="4">Общая стоимость, руб.:</td>
                                    <td><?php echo $totalPrice;?></td>
                                </tr>
                            
                        </table>
                        
                        <a id="order" href="/cart/checkout">Оформить заказ</a>
                    <?php else: ?>
                          <div id="callbackform">
      <h1>Корзина пуста</h1>
      <p><a id="orderback" href="/">Вернуться к покупкам</a></p>
    </div>
                        
                    <?php endif; ?>
                </div>
<?php include ROOT . '/views/layouts/footer.php'; ?>