<?php
App::uses('AppController', 'Controller');
class CatalogoController extends AppController {
	public $uses = array('Articulo');

	public function index(){
		$this->layout = 'default2';
		$this->set('articulos',$this->Articulo->getArticulos());
	}
}