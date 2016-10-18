<?php
class Codigo extends AppModel
{
    var $name = 'Codigo';
	
	function validarCodigo($code){
		if($data = $this->find('first',array('conditions'=>array('Codigo.codigo'=>$code,'Codigo.used'=>0)))){
			$this->id = $data['Codigo']['id'];
			$this->saveField('used',1);
			return true;
		}else{return false;}
	}
}