<?php
App::uses('AppController', 'Controller');
class ControlController extends AppController {
	public $uses = array('Usuario');

	public function index(){
		$this->layout = 'concurso';
		$usuarios = $this->Usuario->find('all');
		$this->set('usuarios',$usuarios);
	}

}
