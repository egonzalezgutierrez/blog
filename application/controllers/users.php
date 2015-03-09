<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once 'BlogController.php';

/**
 * Controlador de Users de la aplicación
 *
 * @author		egonzalez@kitmaker.com
 */
class Users extends BlogController {
	
	/**
	 * Acción login que se encargará de identificar un usuario en la aplicación.
	 * Comprobará que los campos del formulario son requeridos, mostrando el mensaje 
	 * de error o éxito correspondiente en cada caso. Y redireccionando si fuera necesario.
	 *
	 * @author		egonzalez@kitmaker.com
	 */
	public function login() {
		if($this->session->userdata('user')) {
			redirect('posts/index', 'refresh');
		}

		$this->load->library('form_validation');
		if ($this->input->post('submit') == TRUE || $this->input->is_ajax_request()) {
			$this->form_validation->set_rules('username', 'lang:username', 'required');
			$this->form_validation->set_rules('password', 'lang:password', 'required');

			if($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				$this->load->model('Users_model');
				$user = $this->Users_model->login($username, $password);
				if(empty($user)) {
					$this->showErrorsRedirect(ERROR, lang('users.login.failure'), null, null);
				}else {
					$data = array(
						'user' => array(
							'id_user' => $user->id_user,
							'name' => $user->name,
							'id_rol' => $user->id_rol,
						),
					);
					$this->session->set_userdata($data);
					$this->showErrorsRedirect(SUCCESS, lang('users.login.success'), 'posts/index', 'posts/index');
				}
			}else {
				$this->showErrorsRedirect(ERROR, validation_errors(), null, null);
			}
		}
		if(!$this->input->is_ajax_request()) {
			$this->data['content'] = $this->load->view('login', null, true);
			$this->load->view('default', $this->data);
		}
	}
	
	/**
	 * Acción logout que se encargará de desconectar un usuario de la aplicación, 
	 * mostrando el mensaje correspondiente. Y redireccionando.
	 *
	 * @author		egonzalez@kitmaker.com
	 */
	public function logout() {
		if($this->session->userdata('user')) {
			$this->session->unset_userdata('user');
		}
		$this->showErrorsRedirect(SUCCESS, lang('users.logout.success'), 'posts/index', 'posts/index');
	}
	
	/**
	 * Acción register que se encargará de registrar un nuevo usuario en la aplicación.
	 * Comprobará que los campos del formulario son requeridos, mostrando el mensaje
	 * de error o éxito correspondiente en cada caso. Y redireccionando si fuera necesario.
	 *
	 * @author		egonzalez@kitmaker.com
	 */
	public function register() {
		if($this->session->userdata('user')) {
			redirect('posts/index', 'refresh');
		}
	
		$this->load->library('form_validation');
		if ($this->input->post('submit') == TRUE || $this->input->is_ajax_request()) {
			$this->form_validation->set_rules('username', 'lang:username', 'required');
			$this->form_validation->set_rules('password', 'lang:password', 'required');
				
			if ($this->form_validation->run() == TRUE) {
				$username = $this->input->post('username');
				$password = md5($this->input->post('password'));
				
				$this->load->model('Users_model');
				$st = $this->Users_model->addUser($username, $password);
				$msg = lang('users.register.success');
				$redirect = 'posts/index';
				if($st == ERROR) {
					$msg = lang('users.register.failure');
					$redirect = 'users/register';
				}
				$this->showErrorsRedirect($st, $msg, $redirect, $redirect);
			}else {
				$this->showErrorsRedirect(ERROR, validation_errors(), null, null);
			}
		}
		if(!$this->input->is_ajax_request()) {
			$this->data['content'] = $this->load->view('register', null, true);
			$this->load->view('default', $this->data);
		}
	}
}
