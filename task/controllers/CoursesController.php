<?php
	include_once ROOT.'/models/Courses.php';
	include_once ROOT.'/models/User.php';
	include_once ROOT.'/components/Pagination.php';


	class CoursesController {

		public function actionCourses() {
			
			$courses_list_menu = Courses::getCourses($_SESSION['user']); 
			$url = explode("/", $_SERVER['REQUEST_URI']);
			$user = $_SESSION['user'];

			if (isset($_POST['submit'])) {

				$name = $_POST['name'];
				
				$errors = false;

				if (Courses::checkNameExists($name)) { //якшо тру то помилка
					$errors[] = 'Така назва вже є';
				}

				if ($errors == false) {//яккшо помилок нема    
					$result = Courses::createCourse($name, $_SESSION['user']);
					header("Location: /courses/");
				}
			}

					
			require_once(ROOT . '/views/content/courses/courses.php'); // підключаєм вюшку
			return true;

		}


		public function actionCreate() {

			if (isset($_POST['submit'])) {

				$name = $_POST['name'];
				
				$errors = false;

				if (Courses::checkNameExists($name)) { //якшо тру то помилка
					$errors[] = 'Така назва вже є';
				}

				if ($errors == false) {//яккшо помилок нема    
					$result = Courses::createCourse($name, $_SESSION['user']);
					header("Location: /courses/");
				}
			}

			require_once(ROOT . '/views/content/courses/create.php');
			return true;
		}


		public function actionEdit($id) { ///course/edit/2 id=2
			$id = intval($id); //10
	
			$id_all = [];
			
			$courses = Courses::getCourses();
			$course = Courses::getCourseInfo($id);
			
			foreach ($courses as  $cours) {
				array_push($id_all, $cours['id_c']);
			}
			if (!in_array($id, $id_all)) { $type="bad"; }
			$errors = false;

			if (isset($_POST['submit'])) {

				$name = $_POST['name'];
				$teacher_id = $_POST['teacher'];

				if (Courses::checkCourseNameExists($name,$course[0]['name'])) { //якшо тру то помилка
					$errors[] = 'Така назва вже є';
				}
				if ($errors == false) {//яккшо помилок нема
					Courses::update($name,  $id);
					$course = Courses::getCourseInfo($id);
				}
			}
			require_once(ROOT . '/views/content/courses/edit.php');
			return true;
		}

		public function actionModern() { ///course/edit/2 id=2
			$id = $_POST['id']; //10
			$name = $_POST['name']; //10
	
			Courses::update($name,  $id);

		}

		public function actionCutdelete() { ///course/edit/2 id=2
			echo "fron new controller";
			
			var_dump($_POST['arr']);
			$array = $_POST['arr'];
			Courses::deletefew($array);


		}


		public function actionDelete($id) {	
			$id = intval($id);
			Courses::deleteCourseById($id);
			Courses::deleteFromCart($id);

			$file = "/images/courses/course".$id.".png";
			if (file_exists($_SERVER['DOCUMENT_ROOT'].$file)) {
				unlink($_SERVER['DOCUMENT_ROOT'].$file);
			}
			header("Location: /courses/");
		}
}