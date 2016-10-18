<?php
App::uses('AppController', 'Controller');
class ConcursoController extends AppController {
	public $uses = array('Usuario','Juego');

	public function home($concurso){
		$this->layout = 'concurso';
		$this->concurso = $concurso;
		//$this->checkLogin(true);
		if (isset($_GET['app_data'])){
			$invite_data = $this->Juego->getByInviteId($_GET['app_data']);
			//if ($this->Chance->checkChance($this->SessionUsuario,$invite_data)){
				$this->set('invite_data',$invite_data);
			//}
		}
		if(isset($concurso)){
			switch($concurso){
				case 'jeans':
					$this->render('jeans');
					break;
				case 'looks':
					$this->render('looks');
					break;
			}
		}
	}
}
