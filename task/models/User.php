<?php

class User {

    public static function register($name, $email, $password) {
        $db = Database::getConnection();
        $result = $db->prepare("INSERT INTO users (name, email, password,date_register) VALUES (:name,:email,:password,'".date("y:m:d H:m:s")."')");       
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        return $result->execute();

    }


    public static function search_id($email) {
        $db = Database::getConnection();
        $result = $db->prepare("SELECT id_u FROM users WHERE email=:email");
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();// якшо не пусто то тру
        if ($row['id_u']) return $row['id_u'];
        else return false;
    }

    

    /*  */
    /* Проверяет имя: не меньше, чем 2 символа
    */
    public static function checkName($name) {
        if (strlen($name) >= 2) {
            return true;
        }
        return false;
    }
    
    public static function checkPhone($phone){
        if (strlen($phone) >= 10) {
            return true;
        }
        return false;
    }

    /**
     * Проверяет имя: не меньше, чем 6 символов */

    public static function checkPassword($password) {
        if (strlen($password) >= 6) {
            return true;
        }
        return false;
    }

    /** Проверяет email */

    public static function checkEmail($email) {
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            return true;
        }
        return false;
    }

    public static function checkEmailExists($email) {
        $db = Database::getConnection();
        $result = $db->prepare("SELECT COUNT(Name) AS count FROM users WHERE email=:email");
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        
        $row = $result->fetch();// якшо не пусто то тру
        if($row['count']) return true;
        else return false;
    }

    public static function checkEmailExists2($email_old,$email) {
        $db = Database::getConnection();
        $result = $db->prepare("SELECT * FROM users WHERE email=:email");
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        
        $row = $result->fetch();// якшо не пусто то тру
        if($row['email'] == $email_old ) return false;
        else if($row['email'] != $email ) return false;
        else return true; 
    }

    // для login

    public static function checkUserData($email, $password) {
        $db = Database::getConnection();
        $result = $db->prepare("SELECT * FROM users WHERE email=:email AND password=:password");
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->execute();

        $user = $result->fetch(); // виводить масив
        //return $row['count'];
        if ($user['id_u']) { //якшо в масив є то повертаєм  id
            return $user['id_u'];
        }
        else  return false;
    }


    public static function auth($userId)  {
        $_SESSION['user'] = $userId;
    }
    

    public function actionLogout()  {
        session_start();
        unset($_SESSION["user"]);
        header("Location: /");
    }


    public static function getUserById($id) {
        $db = Database::getConnection();
        $result = $db->prepare("SELECT * FROM  users WHERE id_u = :id");       
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $user = $result->fetch(); // виводить масив
        //echo  $user['name'];
        return  $user;
    }


    public static function edit($userId, $name,  $email, $password) {
        $db = Database::getConnection();
        $result = $db->prepare("UPDATE users SET name=:name, email=:email,   password=:password  WHERE id_u =:userId");
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':password', $password, PDO::PARAM_STR);
        $result->bindParam(':userId', $userId, PDO::PARAM_INT);
        $result->execute();
    }
   
    //видалення даних
    public static function delete($id)  {
        $db = Database::getConnection();
        $result = $db->prepare("DELETE FROM users WHERE id_u  = :id"); 
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();    
    }




    public static function createImage($id){
         
        // операції з файлом
        $types = array('image/gif', 'image/png', 'image/jpeg');
        $size = 30024000;
        $path = 'images/courses/course'.$id.'.png';

        if (!in_array($_FILES['picture']['type'], $types)){  // Проверяем тип файла
            echo "Запрещённый тип файла. Попробуйте снова";
        }
        else if ($_FILES['picture']['size'] > $size){  // Проверяем размер файла
            echo "Слишком большой размер файла. Попробуйте другой файл.";
        }
        else {   // якшо помилок немає
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                if (!@copy($_FILES['picture']['tmp_name'],$path))
                    echo 'Что-то пошло не так';
                else
                    echo 'Загрузка удачна';
            }
        }
        $file = "/".$path;

        if (file_exists($_SERVER['DOCUMENT_ROOT'].$file)) {
            $file1 = $file;
        }
        else {  
            $file1 = '/images/courses/none.png';
        }
    }


    public static function isAdmin($id) {
        $db = Database::getConnection();
        $result = $db->prepare("SELECT is_admin FROM users WHERE id_u=:id");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch();// якшо не пусто то тру
        if ($row['is_admin']) return $row['is_admin'];
        else return false;
    }


}