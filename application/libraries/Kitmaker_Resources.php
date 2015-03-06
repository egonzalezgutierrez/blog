<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');  ?>

<?php

class Kitmaker_Resources {
	
	var $resources = array();
	
	public function __construct() {
		$this->CI = &get_instance();
		$this->resources = $this->CI->config->item('resources');
	}
	
    public function loadResources($controller, $action) {
    	$css = array();
    	if(isset($this->resources['css']['common'])) { 
    		$css = $this->resources['css']['common'];
    	}
    	if(isset($this->resources['css'][$controller.'.'.$action])) {
    		$css = array_merge($css, $this->resources['css'][$controller.'.'.$action]);
    	}
    	$js = array();
    	if(isset($this->resources['js']['common'])) {
    		$js = $this->resources['js']['common'];
    	}
    	if(isset($this->resources['js'][$controller.'.'.$action])) {
    		$js = array_merge($js, $this->resources['js'][$controller.'.'.$action]);
    	}
    	$data['css'] = $css;
    	$data['js'] = $js;
    	return $data;
    }
}

?>