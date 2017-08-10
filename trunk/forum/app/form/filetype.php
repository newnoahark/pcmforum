<?php
class Form_filetype extends QForm {
	function __construct(){
		parent::__construct();
		$filename = rtrim(dirname(__FILE__), '/\\') . DS . 'filetype_form.yaml';
		$this->loadFromConfig(Helper_YAML::loadCached($filename));
		$this->addValidations(Filetype::meta());	
			
	} 
}

