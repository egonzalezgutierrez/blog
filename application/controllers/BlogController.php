<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Clase controlador principal de la que heredartán todos los controladores de nuestra aplicación.
 *
 * @author egonzalez@kitmaker.com
 */
class BlogController extends CI_Controller {
	
	/**
	 * Variable de uso interno para los datos de la aplicación.
	 *
	 * @author egonzalez@kitmaker.com
	 */
	var $data;


	/**
	 * Constructor.
	 * De esta clase heredarán todos los controladores de la aplicación.
	 * Se encargará de la carga inicial de los metadatos, idiomas, menús y recursos.
	 * 
	 * @author egonzalez@kitmaker.com
	 */
	public function __construct() {
		parent::__construct();
		$this->data['validation_errors'] = '';
		$this->_loadMetaData();
		$this->_loadLangs();
		$this->_loadMenu();
		$this->_loadResources();
		$this->_loadLanguage();
	}
	
	/**
	 * Cargamos el lenguaje actual con el que está trabajando la aplicación.
	 *
	 * @author egonzalez@kitmaker.com
	 */
	private function _loadLanguage() {
		$this->data['language'] = $this->uri->segment(1);
	}
	
	/**
	 * Cargamos los distintos recursos de los que hará uso la aplicación.
	 *
	 * @author egonzalez@kitmaker.com
	 */
	private function _loadResources() {
		$controller = $this->router->fetch_class();
		$action = $this->router->fetch_method();
		$resources = $this->kitmaker_resources->loadResources($controller, $action);
		$this->data['css'] = array();
		$this->data['js'] = array();
		//$this->kitmaker_mobile_detect->isMobile();
		if(isset($resources['css'])) {
			$this->data['css'] = $resources['css'];
		}
		if(isset($resources['js'])) {
			$this->data['js'] = $resources['js'];
		}
	}
	
	/**
	 * Cargamos los metadatos para controlar el SEO de la aplicación.
	 * 
	 * @author egonzalez@kitmaker.com
	 */
	private function _loadMetaData() {
		$controller = $this->router->fetch_class();
		$action = $this->router->fetch_method();
		$this->data['metatitle'] = lang('seo.metatitle.'.$controller.'.'.$action); 
		$this->data['metadescription'] = lang('seo.metadescription.'.$controller.'.'.$action);
		$this->data['metakeywords'] = lang('seo.metakeywords.'.$controller.'.'.$action);
		$this->data['metaauthor'] = lang('seo.metaauthor');
	}
	
	/**
	 * Cargamos los distintos idiomas con los que trabaja la aplicación y sus urls.
	 * 
	 * @author egonzalez@kitmaker.com
	 */
	private function _loadLangs() {
		$controller = $this->router->fetch_class();
		$action = $this->router->fetch_method();
		$langs = array(
			array('token' => 'blog.spanish', 'url' => 'es'.DS.$controller.DS.$action),
			array('token' => 'blog.english', 'url' => 'en'.DS.$controller.DS.$action)
		);
		$this->data['langs'] = $langs;
	}
	
	/**
	 * Cargamos todos los datos necesarios para el menú de la aplicación.
	 * Controlaremos si existe o no un usuario identificado para mostrar los items correspondientes.
	 *
	 * @author egonzalez@kitmaker.com
	 */
	private function _loadMenu() {
		$menu = array();
		$menu[] = array('token' => 'posts.getPosts', 'url' => 'posts/index');
		if($this->session->userdata('user')) {
			$menu[] = array('token' => 'posts.addPost', 'url' => 'posts/addPost');
			$menu[] = array('token' => 'users.logout', 'url' => 'users/logout');
		}else {
			$menu[] = array('token' => 'users.login', 'url' => 'users/login');
			$menu[] = array('token' => 'users.register', 'url' => 'users/register');
		}
		$this->data['menu'] = $menu;
	}
	
	/**
	 * Función protegida para los controladores que se encarga de mostrar
	 * los mensajes oportunos dependiendo de si la petición se hizo por AJAX o no.
	 * Controlará las redirecciones AJAX y directas.
	 *
	 * @param int $st SUCCESS o ERROR
	 * @param string $msg mensaje a mostrar
	 * @param string $aRedirect url de la redirección AJAX
	 * @param string $sRedirect url de la redirección directa
	 * @author egonzalez@kitmaker.com
	 */
	protected function showErrorsRedirect($st, $msg, $aRedirect, $sRedirect) {
		$controller = $this->router->fetch_class();
		$action = $this->router->fetch_method();
		
		if($this->input->is_ajax_request()) {
			$errors = array(
					'st' => $st,
					'msg' => $msg,
			);
			if(!is_null($aRedirect)) {
				if($controller.'/'.$action != $aRedirect) {
					$this->session->set_flashdata('session.message', $msg);
				}
				$errors['redirect'] = site_url() . '/' . $this->data['language'] . '/' . $aRedirect;
			}
			echo json_encode($errors);
		}else {
			$this->data['validation_message'] = $msg;
			if(!is_null($sRedirect)) {
				$this->session->set_flashdata('session.message', $msg);
				redirect($sRedirect, 'refresh');
			}
		}
	}
}
