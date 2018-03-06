<?php

include_once ROOT. '/models/User.php'; // підключення моделі


class UserController {

    public function actionRegister() {
        $result = false;

        if (isset($_POST['submit'])) {

            $name = $_POST['name'];
            $email = $_POST['email'];
            $password = $_POST['password'];
            

            $errors = false;

            if (!User::checkName($name)) { //якшо фолс
                $errors[] = 'Имя не должно быть короче 5-х символов';
            }

            if (!User::checkEmail($email)) { //якшо фолс
                $errors[] = 'Неправильный email';
            }

            if (!User::checkPassword($password)) { //якшо фолс
                $errors[] = 'Пароль не должен быть короче 6-ти символов';
            }

            //$total = User::checkEmailExists($email);
            if (User::checkEmailExists($email)) { //якшо тру то помилка
               $errors[] = 'Такой email уже используется';
            }

            if ($errors == false) {//яккшо помилок нема
                
                $result = User::register($name,  $email, $password);
                header("Location: /user/login/ ");
            }

        }

        require_once(ROOT . '/views/user/register.php');

        return true;
    }


    public function actionLogin() {
        $email = '';
        $password = '';
        
        if (isset($_POST['submit'])) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            
            $errors = false;
                        
            // Проверяем существует ли пользователь
            $userId = User::checkUserData($email, $password);
           
            if ($userId == false) {
                // Если данные неправильные - показываем ошибку
                $errors[] = 'Неправильные данные для входа на сайт';
            } else {
                // Если данные правильные, запоминаем пользователя (сессия)
                // якшо неактивне то помилка
              
                User::auth($userId);
                header("Location: /cabinet/ ");
                //Перенаправляем пользователя в закрытую часть - кабинет    
                
                 
            }
        }
        require_once(ROOT . '/views/user/login.php');

        return true;
    }
    

    /** Удаляем данные о пользователе из сессии */
     
    public function actionLogout() {
        session_start();
        unset($_SESSION["user"]);
        header("Location: /user/login/");
    }
    
}