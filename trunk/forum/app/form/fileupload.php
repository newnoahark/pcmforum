<?php
class Form_fileupload extends QForm {
	function __construct(){
		parent::__construct();
		$filename = rtrim(dirname(__FILE__), '/\\') . DS . 'fileupload_form.yaml';
		$this->loadFromConfig(Helper_YAML::loadCached($filename));
	}
}