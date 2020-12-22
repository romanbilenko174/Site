<?php
class User
{
    public static function register($name, $email, $password)
    {
        $db = Db::getConnection();
        $sql = 'INSERT INTO users (name, email, password) '
                . 'VALUES (:name, :email, :password)';
        $result = $db->prepare($sql);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        return $result->execute();
       
    }
    public static function edit($id, $name, $password, $phone, $adress)
    {
        $db = Db::getConnection();
        $sql = "UPDATE users 
            SET name = :name, password = :password, phone = :phone, adress = :adress 
            WHERE id = :id";
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':password', password_hash($password, PASSWORD_DEFAULT), PDO::PARAM_STR);
        $result->bindParam(':phone',$phone, PDO::PARAM_STR);
        $result->bindParam(':adress',$adress, PDO::PARAM_STR);
        return $result->execute();
    }
    public static function checkUserData($email, $password)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE email = :email AND password = :password';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_INT);
        $result->bindParam(':password', password_verify($password, PASSWORD_DEFAULT), PDO::PARAM_INT);
        $result->execute();
        $user = $result->fetch();
        if ($user) {
            return $user['id'];
        }
        return false;
    }
    public static function auth($userId)
    {
        $_SESSION['user'] = $userId;
    }
    public static function checkLogged()
    {
        if (isset($_SESSION['user'])) {
            return $_SESSION['user'];
        }
        header("Location: /user/login");
    }
    public static function isGuest()
    {
        if (isset($_SESSION['user'])) {
            return false;
        }
        return true;
    }
    public static function checkName($name)
    {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }
    public static function checkPhone($phone)
    {
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }
    public static function checkPassword($password)
    {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }
    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }
    public static function checkEmailExists($email)
    {      
        $db = Db::getConnection();
        $sql = 'SELECT COUNT(*) FROM users WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        if ($result->fetchColumn())
            return true;
        return false;
    }
    public static function getUserById($id)
    {
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE id = :id';
        $result = $db->prepare($sql);
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $result->execute();
        return $result->fetch();
    }
    public static function RestorePassword($data){
        $db = Db::getConnection();
        $sql = 'SELECT * FROM users WHERE name = :data OR email = :data';
        $result = $db->prepare($sql);
        $result->bindParam(':data', $data, PDO::PARAM_STR);
        $result->execute();
        if (empty($result->fetch())){
            echo 'Ошибка! Такого пользователя не существует';
        }
        else{
        $chars="qazxswedcvfrtgbnhyujmkiolp1234567890QAZXSWEDCVFRTGBNHYUJMKIOLP";
        $max=10;
        $size=StrLen($chars)-1;
        $password=null;                        
        while($max--) {
              $password.=$chars[rand(0,$size)];
        }
        $newmdPassword = password_hash($password);
        $emailsql = 'SELECT email FROM users WHERE name = :data OR email = :data';
        $emailresult = $db->prepare($emailsql);
        $emailresult->bindParam(':data', $data, PDO::PARAM_STR);
        $emailresult->setFetchMode(PDO::FETCH_ASSOC);
        $emailresult->execute();
        $email = $emailresult->fetch();
        $title = 'Востановление пароля от аккаунта с email - '.$email['email'].' для сайта nst.ru!';
        $letter = "Вы запросили восстановление пароля для email - ".$email['email']." на сайте nst.ru \r\nВаш новый пароль: ".$password."\r\nВы можете изменить его в личном кабинете \r\nС уважением администрация сайта nst.ru";
        if (mail($email['email'], $title, $letter, "Content-type:text/plain; Charset=utf-8\r\n")) {
             $updsql= "UPDATE users SET password = :newpassword WHERE name = :data OR email = :data";
             $updresult = $db->prepare($updsql);
             $updresult->bindParam(':newpassword', $newmdPassword, PDO::PARAM_STR);
             $updresult->bindParam(':data', $data, PDO::PARAM_STR);
             $updresult->execute();
             $updresult->fetch();
         }
      } 
     return $result->execute();   
    }
}