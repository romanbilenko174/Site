<?php
class UserController
{
    public function actionRegister()
    {
        $name = false;
        $email = false;
        $password = false;
        $repassword = false;
        $captcha = false;
        $check =false;
        $result = false;
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            $repassword= $_POST['repassword'];
            $captcha = $_POST['captcha'];
            $check = $_POST['check'];
            $errors = false;
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            if (User::checkEmailExists($email)) {
                $errors[] = 'Такой email уже используется';
            }
            if ($password != $repassword){
                $errors[] = 'Пароли не совпадают';
            }
            if (!$check){
                $errors[] = 'Подтвердите согласие на обработку персоональных данных';
            }
            if ($captcha != $_SESSION["rand"]){
                $errors[] = 'Введите правильный код с капчи';
            }
            if ($errors == false) {
                $result = User::register($name, $email, $password);
            }
        }
        require_once(ROOT . '/views/user/register.php');
        return true;
    }
    public function actionLogin()
    {  
        $email = false;
        $password = false;
        $remember_me = false;
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $remember_me = $_POST['remember_me'];
            $errors = false;
            if (!User::checkEmail($email)) {
                $errors[] = 'Неправильный email';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
            $userId = User::checkUserData($email, $password);
            if ($userId == false) {
                 $errors[] = 'Неправильные данные для входа на сайт';
            } else {  
                if ($remember_me){
                     User::auth($userId);
                }
                else{
                    User::auth($userId);
                }
            }
            $check = 1;
        }
        require_once(ROOT . '/views/user/login.php');
        return true;
    }
    public function actionLogout()
    {
        setcookie('user', '', time()-604800, '/');
        session_start();
        unset($_SESSION["user"]);
        header("Location: /");
    }
    public function actionRestorepassword()
    {
        $data = false;
        $result = false;
        $captcha = false;
        if (isset($_POST['submit']))
    {    
        $data = $_POST['data'];  
        $captcha = $_POST['captcha'];
        $errors = false;   
        if (!User::checkName($data)) { 
         $errors[] = 'Сликом короткий логин/email';
     }
     if ($captcha != $_SESSION["rand"]){
                $errors[] = 'Введите правильный код с капчи';
    }
    if ($errors == false) {
        $result = User::RestorePassword($data);
    }               
   }
        require_once(ROOT . '/views/user/restorepassword.php');
        return true;
    }
}