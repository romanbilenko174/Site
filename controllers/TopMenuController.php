<?php
class TopMenuController
{
 public function actionAbout()
    {
        require_once(ROOT . '/views/topmenu/about.php');
        return true;
    }
    public function actionContact()
    {
         $userEmail = false;
        $userText = false;
        $captcha = false;
        $result = false;
        if (isset($_POST['submit'])) {
       
            $userEmail = $_POST['userEmail'];
            $userText = $_POST['userText'];
            $captcha = $_POST['captcha'];
            $errors = false;
            if (!User::checkEmail($userEmail)) {
                $errors[] = 'Неправильный email';
            }
            if ($captcha != $_SESSION["rand"]){
                $errors[] = 'Введите правильный код с капчи';
            }
            if ($errors == false) {
                $adminEmail = 'romanbilenko174@mail.ru';
                $message = "Текст: {$userText}. От {$userEmail}";
                $subject = 'Тема письма';
                $result = mail($adminEmail, $subject, $message);
                $result = true;
            }
        }
        require_once(ROOT . '/views/topmenu/contact.php');
        return true;
    }
   public function actionDeliveryandpayment(){
        require_once(ROOT . '/views/topmenu/deliveryandpayment.php');
        return true;
    }
     public function actionReviews(){
        require_once(ROOT . '/views/topmenu/reviews.php');
        return true;
    }
    
   
     public function actionNews(){
        require_once(ROOT . '/views/topmenu/news.php');
        return true;
    }
    public function actionAction(){
        $latestActions = Action::getLatestActions(4);
        require_once(ROOT . '/views/topmenu/action.php');
        return true;
    }
    public function actionView($actionId)
    {
        $action = Action::getActionById($actionId);
        require_once(ROOT . '/views/topmenu/view.php');
        return true;
    }
    }