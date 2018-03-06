<?php
class Courses{


    public static function 	getCourses($id) {
        $db = Database::getConnection();
        // треба лефт джойн з тічерсами!!
        $result = $db->prepare('SELECT * FROM  courses  WHERE id_u = :id');
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $i = 0;
		while ($row = $result->fetch()) {
            $course[$i] = $row;
            $i++;
		}
		return $course;
    }

	public static function getUnderCourses($id) {
		$db = Database::getConnection();
        $result = $db->prepare("SELECT * FROM courses WHERE id_mc = :id");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
		$i = 0;
		while ($row = $result->fetch()) {
		 	$course[$i] = $row;
            $i++;
		}
		return $course;
	}

    public static function getCountOfUnderCourses($id) {
        $db = Database::getConnection();
        $result = $db->prepare("SELECT count(id_mc) as count,id_mc FROM courses WHERE id_mc=:id");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch();// якшо не пусто то тру
        if($row['count'])  return $row;
        else return false;
    }



    public static function getCourseInfo($id) {
        $db = Database::getConnection();
        $result = $db->prepare("SELECT * FROM courses WHERE id_c = :id" );
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $i = 0;
        while ($row = $result->fetch()) {
            $user[$i] = $row;
            $i++;
        }
        return $user;
    }


    public static function checkNameExists($name) {
        $db = Database::getConnection();
        $result = $db->prepare("SELECT COUNT(name) AS count FROM courses WHERE name=:name");
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();// якшо не пусто то тру
        if($row['count']) return true;
        else return false;
    }
    public static function countMCById($id) {
        $db = Database::getConnection();
        $result = $db->prepare("SELECT COUNT(name) AS count FROM courses WHERE id_mc=:id");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
        $row = $result->fetch();// якшо не пусто то тру
        if($row['count']) return true;
        else return false;
    }



    public static function createCourse($name,$id_u){
        $uk=array('А','Б','В','Г','Д','Е','І','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я','а','б','в','г','д','е','і','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',' ', ',', '/','_');
        $en=array('a','b','v','g','d','e','i','zh','z','y','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya','a','b','v','g','d','e','i','gh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya','-','-','-','-');
        $db = Database::getConnection();
        $result = $db->prepare("INSERT INTO courses (name, url, id_u) VALUES (:name,'".mb_strtolower(str_replace($uk, $en, $name))."', :id_u)");
		$result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':id_u', $id_u, PDO::PARAM_INT);
        return $result->execute();
    }

  

    public static function getCourseId($name){
        $db = Database::getConnection();
        $result = $db->prepare("SELECT id_c FROM courses WHERE name=:name");
		$result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
        return $row['id_c'];
    }




    public static function checkCourseNameExists($name,$name_old) {
        $db = Database::getConnection();
        $result = $db->prepare("SELECT * FROM courses WHERE name=:name");
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();// якшо не пусто то тру
        if($row['name'] == $name_old ) return false;
        else if($row['name'] != $name ) return false;
        else return true;
    }


    public static function update($name, $id_c) {
        $uk=array('А','Б','В','Г','Д','Е','І','Ж','З','И','Й','К','Л','М','Н','О','П','Р','С','Т','У','Ф','Х','Ц','Ч','Ш','Щ','Ъ','Ы','Ь','Э','Ю','Я','а','б','в','г','д','е','і','ж','з','и','й','к','л','м','н','о','п','р','с','т','у','ф','х','ц','ч','ш','щ','ъ','ы','ь','э','ю','я',' ', ',', '/','_');
        $en=array('a','b','v','g','d','e','i','zh','z','y','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya','a','b','v','g','d','e','i','gh','z','i','y','k','l','m','n','o','p','r','s','t','u','f','h','c','ch','sh','sch','y','y','y','e','yu','ya','-','-','-','-');
        $db = Database::getConnection();
        $result = $db->prepare("UPDATE courses SET name=:name,  url= '".mb_strtolower(str_replace($uk, $en, $name))."'  WHERE id_c =:id_c");
        $result->bindParam(':name', $name, PDO::PARAM_STR);
        $result->bindParam(':id_c', $id_c, PDO::PARAM_INT);
        $result->execute();
    }

    public static function deleteCourseById($id){
        $db = Database::getConnection();
        $result = $db->prepare("DELETE FROM courses WHERE id_c  = :id");
        $result->bindParam(':id', $id, PDO::PARAM_INT);
        $result->execute();
    }


    public static function deletefew($array){
        $db = Database::getConnection();
        
        foreach ($array as $key => $value) {
            $result = $db->query("DELETE FROM courses WHERE id_c  = " . $value);
            $result->execute();

        }
    }



}