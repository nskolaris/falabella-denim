<?php
class Articulo extends AppModel
{
    var $name = 'Articulo';
	
	function getArticulos(){
		$art = $this->find('all');
		return $art;
	}
}