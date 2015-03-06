<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'BlogController.php';

/**
 * Controlador de Posts de la aplicación
 *
 * @author		egonzalez@kitmaker.com
 */
class Posts extends BlogController {

	/**
	 * Acción index que se encargará de mostrar los posts registrados en la aplicación.
	 * Comprobará el rol del usuario identificado.
	 * En caso de que el usuario identidicado sea un ADMIN, mostrará la posibilidad de censurar posts
	 *
	 * @author		egonzalez@kitmaker.com
	 * @see			censurePost()
	 */	
	public function index()	{
		$isAdmin = ($user = $this->session->userdata('user')) && $user['id_rol'] == ADMIN;
		$this->load->model('Posts_model');
		$posts = $this->Posts_model->getPosts($isAdmin);
		$this->data['posts'] = $posts;
		$this->data['isAdmin'] = $isAdmin;
		$this->data['content'] = $this->load->view('posts', $this->data, true);
		$this->load->view('default', $this->data);
	}
	
	/**
	 * Acción addPost que se encargará de añadir nuevos posts en la aplicación.
	 * Comprobará que los campos del formulario son requeridos, mostrando el mensaje 
	 * de error o éxito correspondiente en cada caso. Y redireccionando si fuera necesario.
	 *
	 * @author		egonzalez@kitmaker.com
	 */
	public function addPost() {
		if(!$this->session->userdata('user')) {
			redirect('posts/index', 'refresh');
		}
		
		$this->load->library('form_validation');
		if ($this->input->post('submit') == TRUE || $this->input->is_ajax_request()) {
			$this->form_validation->set_rules('content', 'lang:content', 'required');
			
			if ($this->form_validation->run() == TRUE) {
				$user = $this->session->userdata('user');
				$content = $this->input->post('content');
				$this->load->model('Posts_model');
				$this->Posts_model->addPost($user['id_user'], $content);
				$this->showErrorsRedirect(SUCCESS, lang('posts.added'), 'posts/index', 'posts/index');
				redirect('posts/index', 'refresh');
			}else {
				$this->showErrorsRedirect(ERROR, validation_errors(), null, null);
			}
		}
		if(!$this->input->is_ajax_request()) {
			$this->data['content'] = $this->load->view('add_post', null, true);
			$this->load->view('default', $this->data);
		}
	}
}
