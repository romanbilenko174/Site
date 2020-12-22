<?php
class CartController
{
    public function actionAddAjax($id,$counter)
    {
        echo Cart::addProduct($id,$counter)." ".Cart::getNumEnding(Cart::countItems(),array("товар","товара","товаров"));
        return true;
    }
     public function actionGetPrice($price)
    {
        $productsInCart = Cart::getProducts();
         $productsIds = array_keys($productsInCart);
        if (is_bool($productsInCart)){
            $totalPrice = 0;
        }
        else{
        $products = Product::getProdustsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);
    }
        echo $totalPrice;
        return true;
    }
    public function actionDelete($id)
    {
        Cart::deleteProduct($id);
        header("Location: /cart");
    }
    public function actionIndex()
    {
        $categories = Category::getCategoriesList();
        $productsInCart = Cart::getProducts();
        if ($productsInCart) {
            $productsIds = array_keys($productsInCart);
            $products = Product::getProdustsByIds($productsIds);
            $totalPrice = Cart::getTotalPrice($products);
        }
        require_once(ROOT . '/views/cart/index.php');
        return true;
    }
    public function actionCheckout()
    {   
        $productsInCart = Cart::getProducts();
        if ($productsInCart == false) {
            header("Location: /");
        }
        $categories = Category::getCategoriesList();
        $productsIds = array_keys($productsInCart);
        $products = Product::getProdustsByIds($productsIds);
        $totalPrice = Cart::getTotalPrice($products);
        $totalQuantity = Cart::countItems();
        $userName = false;
        $userPhone = false;
        $userComment = false;
        $captcha = false;
        $result = false;
        if (!User::isGuest()) {
            $userId = User::checkLogged();
            $user = User::getUserById($userId);
            $userName = $user['name'];
            $userPhone = $user['phone'];
            $userAdress = $user['adress'];
            $captcha = $_POST['captcha'];
        } else {
            $userId = false;
        }

        if (isset($_POST['submit'])) {
            $userName = $_POST['userName'];
            $userPhone = $_POST['userPhone'];
            $userAdress = $_POST['userAdress'];
            $userComment = $_POST['userComment'];
            $errors = false;
            if (!User::checkName($userName)) {
                $errors[] = 'Неправильное имя';
            }
            if (!User::checkPhone($userPhone)) {
                $errors[] = 'Неправильный телефон';
            }
            if ($captcha != $_SESSION["rand"]){
                $errors[] = 'Введите правильный код с капчи';
            }
            if ($errors == false) {
                $result = Order::save($userName, $userPhone, $userAdress, $userComment, $userId, $productsInCart);

                if ($result) {          
                    $adminEmail = 'romanbilenko174@mail.ru';
                    $message = '<a href="localhost/admin/orders">Список заказов</a>';
                    $subject = 'Новый заказ!';
                    mail($adminEmail, $subject, $message);
                    Cart::clear();
                }
            }
        }
        require_once(ROOT . '/views/cart/checkout.php');
        return true;
    }

}
