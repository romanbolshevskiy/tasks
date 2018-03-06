<?php

  include_once ROOT. '/models/Courses.php'; // підключення моделі
  include_once ROOT. '/models/Site.php'; // підключення моделі
	include_once ROOT. '/models/User.php'; // підключення моделі
  
	class SiteController {

		public function actionIndex() {

      if($_SESSION['user']){
        header("Location: /cabinet/");
      }
      else{
        header("Location: /login/");
      }

		}

  	public function actionContact() {

      $userEmail = '';
      $userText = '';
      $result = false;

      if($_SESSION['user']){
        $user= User::getUserById($_SESSION['user']);
        $name = $user['name'];
        $email = $user['email'];
      }
      else{
        $user = "none";
      }

    	if (isset($_POST['submit'])) {

        $userName = $_POST['userName'];
        $userEmail = $_POST['userEmail'];
        $userText = $_POST['userText'];

        $errors = false;

        // Валидация полей
        if (!User::checkEmail($userEmail)) {
            $errors[] = 'Error email';
        }

        if ($errors == false) {
           $adminEmail = 'admin@meta.ua';
           $message = "Text: {$userText}. Email: {$userEmail}";
           $subject = "Subject of message from {$userName}";
           $result = mail($adminEmail, $subject, $message);
           header("Location: /contact/");
        }

    	}

      require_once(ROOT . '/views/site/contact.php');

      return true;
  	}


	}