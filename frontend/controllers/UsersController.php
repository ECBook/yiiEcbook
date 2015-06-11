<?php

namespace app\controllers;

use yii\fontend\Controller;
use app\models\Users;

class UsersController extends Controller{

public function actionIndex(){
		$users = Users : : find() -> all();
		
		return $this -> render('index',['users' => $users]);
}

public function isLehrer(){
// ist lehrer benötigt einen 
		$lehrer = lehrer != null;
}

public function isSchueler(){
// ist lehrer benötigt einen
		$schueler = 
}
}
?>


