<?php
class UsuariosController extends AppController {

	var $name = 'Usuarios';
	var $uses = array('Usuario','Codigo'); 
	
	function add($concurso){
		$this->layout = 'concurso';
		$this->concurso = $concurso;
		$this->checkLogin(false);
		if (!empty($this->data)) {
			$this->Usuario->set($this->data);
			if ($this->Usuario->validates()){
				if (isset($this->data['Usuario']['codigo'])){
					if(!$this->Codigo->validarCodigo($this->data['Usuario']['codigo'])){
						$this->redirect('/usuarios/add/'.$this->data['Usuario']['concurso']);
						exit;
					}
				}
				$this->Usuario->id = $this->SessionUsuario['id'];
				if($this->Usuario->save($this->data)){
					$this->redirect('/juegos/add/'.$this->data['Usuario']['concurso']);
				}else{
					$this->set('errores',$this->Usuario->invalidFields());
				}	
			} else {
				$this->set('errores',$this->Usuario->invalidFields());
			}
			
		}
		$anos = array('default'=>'Año');
		for($i=2010;$i>1910;$i--){
			$anos[$i] = $i;
		}
		$this->set('anos',$anos);
		$sexos = array('default'=>'Sexo','female'=>'Femenino','male'=>'Masculino');
		$this->set('sexos',$sexos);
		$this->set('user',$this->SessionUsuario);
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
	
	function AjaxLogin(){
		if ($usr = $this->Usuario->login($_POST, $error)){echo json_encode($usr);}else{echo 'error';}
		exit;
	}
	
	function updateInvite(){
		$this->Usuario->updateInvite($_POST);
		exit;
	}
}