<?php
class Juego extends AppModel
{
    var $name = 'Juego';
	
	 public $belongsTo = array(
        'Usuario' => array(
            'className' => 'Usuario',
            'foreignKey' => 'usuario_id'
        )
    );
	
	function saveWithInvite($input){
		if (!$this->getGameByUserConcurso($input['user_id'],$input['concurso_id'])){
			$data['Juego']['usuario_id'] = $input['user_id'];
			$data['Juego']['concurso_id'] = $input['concurso_id'];
			$data['Juego']['invite_id'] = $input['invitation_id'];
			$data['Juego']['invite_url'] = $input['invitation_url'];
			if(isset($input['look_id'])){$data['Juego']['look_id'] = $input['look_id'];}
			if($this->save($data)){return true;}else{return false;}
		}else{return true;}
	}
	
	function getByInviteId($invite_id){
		$data = $this->find('first',array('conditions'=>array('Juego.invite_id' => $invite_id)));
		return $data;
	}
	
	function getGameByUserConcurso($user_id,$concurso_id){
		$this->recursive = -2;
		$juego = $this->find('first',array('conditions'=>array('Juego.usuario_id'=>$user_id,'Juego.concurso_id'=>$concurso_id)));
		if (isset($juego['Juego'])){return $juego['Juego'];}else{return false;}
	}
	
	function getLast($input){
		$this->recursive = -2;
		$juego = $this->find('first',array('conditions'=>array('Juego.usuario_id'=>$input)));
		return $juego;
	}
	
	function checkPlayed($uid,$concurso){
		$cid = ($concurso=='jeans'?1:2);
		if($data=$this->find('first',array('conditions'=>array('Juego.usuario_id'=>$uid,'Juego.concurso_id'=>$cid)))){
			return true;
		}else{return false;}
	}
}