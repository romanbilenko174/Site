<?php
class PersonalCabinetController
{
    public function actionIndex()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        require_once(ROOT . '/views/personalcabinet/index.php');
        return true;
    }
    public function actionEdit()
    {
        $userId = User::checkLogged();
        $user = User::getUserById($userId);
        $name = $user['name'];
        $password = $user['password'];
        $phone = $user['phone'];
        $adress = $user['adress'];
        $captcha = false;
        $result = false;
        if (isset($_POST['submit'])) {
            $name = $_POST['name'];
            $password = $_POST['password'];
            $phone = $_POST['phone'];
            $adress = $_POST['adress'];
            $captcha = $_POST['captcha'];
            $errors = false;
            if (!User::checkName($name)) {
                $errors[] = 'Имя не должно быть короче 2-х символов';
            }
            if (!User::checkPassword($password)) {
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }
             if ($captcha != $_SESSION["rand"]){
                $errors[] = 'Введите правильный код с капчи';
            }
            if ($errors == false) {
                $result = User::edit($userId, $name, $password,$phone,$adress);
            }
        }
        require_once(ROOT . '/views/personalcabinet/edit.php');
        return true;
    }

}
