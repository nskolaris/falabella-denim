<?php
class Usuario extends AppModel
{
    var $name = 'Usuario';
    
	var $validate = array(
   		'nombre' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true,
				'allowEmpty' => false,
				'message' => 'El Nombre no puede estar vacios.'
			)		
   		),
		'apellido' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true,
				'allowEmpty' => false,
				'message' => 'El Apellido no puede estar vacios.'
			)		
   		),
		'email' => array(
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true,
				'allowEmpty' => false,
				'message' => 'La direccion de E-mail no puede estar vacia.'
			),
			'email' => array(
				'rule' => array('email',true),
				'required' => true,
				'allowEmpty' => true,
				'message' => 'La direccion de E-mail no es valida.'
			)
		),
		'dni'=> array(
			'numeric' => array(
				'rule' => 'numeric',
				'required' => true,	
				'allowEmpty' => false,
				'message' => 'El DNI no es válido.'
			),
			'notEmpty' => array(
				'rule' => 'notEmpty',
				'required' => true,
				'allowEmpty' => false,
				'message' => 'El DNI no puede estar vacio.'
			),
		)
	);
	
	function checkRegistro($user_id){
		$count = $this->find('count',array('conditions'=>array('Usuario.id' => $user_id,'Usuario.dni !=' => '')));
		if($count > 0){return true;}else{return false;}
	}
	
	function getUserByInviteId($invite_id){
		$this->recursive = -2;
		$user = $this->find('first',array('conditions'=>array('Usuario.invite_id' => $invite_id)));
		var_dump($invite_id);Exit;
		return $invite_id;
	}
	
	function updateInvite($data){
		$this->id = $data['user_id'];
		$this->saveField('invite_id', $data['invitation_id']);
		$this->saveField('invite_url', $data['invitation_url']);
	}
	
	function login($fb_user, &$error) {
		$usr = $this->find('first', array(
			'conditions' => array(
				'Usuario.fbid' => $fb_user['id'],
			),
			'recursive' => -1,
		));
		
		if (empty($usr)) {
		
			$birthday = explode('/',$fb_user['birthday']);
			
			$Datos = array(
				'nombre' => $fb_user['first_name'],
				'apellido' => $fb_user['last_name'],
				'email' => $fb_user['email'],
				'gender' => (isset($fb_user['gender'])?$fb_user['gender']:''),
				'birthday' => $fb_user['birthday'],
				'birthyear' => $birthday[2],
				'fbid' => $fb_user['id'],
				'ip' => $_SERVER['REMOTE_ADDR'],
				'navegador' => $_SERVER['HTTP_USER_AGENT'],
				'extra_data' => json_encode($fb_user)	
			);
			
			if ($this->save($Datos, false)) {
				$Datos['id'] = $this->id;
				return $this->read(null,$this->id);
			}
		}
		return $usr;
	}
}