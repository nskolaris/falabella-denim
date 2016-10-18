<?php
class Chance extends AppModel
{
    var $name = 'Chance';
	
	 public $belongsTo = array(
        'Usuario' => array(
            'className' => 'Usuario',
            'foreignKey' => 'usuario_id'
        ),
		'Juego' => array(
            'className' => 'Juego',
            'foreignKey' => 'juego_id'
        )
    );
	
	function saveChance($input){
		if (!checkChance($input['user_id'],$input['juego_id'])){
			$data['Chance']['usuario_id'] = $input['user_id'];
			$data['Chance']['juego_id'] = $input['juego_id'];
			if($this->save($data)){return true;}else{return false;}
		}else{return true;}
	}
	
	function checkChance($user_id,$juego_id){
		$cant = $this->find('count',array('conditions'=>array('Chance.usuario_id'=>$user_id,'Chance.juego_id'=>$juego_id)));
		if ($cant<1){return true;}else{return false;}
	}
}