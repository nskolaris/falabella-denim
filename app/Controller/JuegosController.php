<?php
App::uses('AppController', 'Controller');
class JuegosController extends AppController {
	public $uses = array('Juego','Chance');

	public function add($concurso=null){
		$this->layout = 'concurso';
		$this->concurso = $concurso;
		$this->checkRegistro(false);
		$this->set('user',$this->SessionUsuario);
		$this->set('played',$this->Juego->checkPlayed($this->SessionUsuario['id'],$concurso));
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
	
	function saveWithInvite(){
		if($this->Juego->saveWithInvite($_POST)){echo 'ok';exit;}else{echo 'error';exit;}
	}
	
	function getGame($uid,$cid){
		$juego = $this->Juego->getGameByUserConcurso($uid,$cid);
		echo json_encode($juego);
		exit;
	}
	
	function addChance(){
		if($this->Chance->saveChance($_POST)){echo 'ok';exit;}else{echo 'error';exit;}
	}
	
	function checkChance($juego_id){
		if($this->Chance->checkChance($_POST['id'],$juego_id)){echo 'true';}else{echo 'false';}exit;
	}
}
