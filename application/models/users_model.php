<?php

/**
 * Modelo de Posts de la aplicación
 *
 * @author		egonzalez@kitmaker.com
 */
class Users_model extends CI_Model {

	/**
	 * Campo id_user
	 *
	 * @var int
	 */
    var $id_user = '';
    
    /**
     * Campo id_rol
     *
     * @var int
     */
    var $id_rol = '';
    
    /**
     * Campo name
     *
     * @var string
     */
    var $name = '';
    
    /**
     * Campo pass
     *
     * @var string
     */
    var $pass = '';
    
    /**
     * Campo created
     *
     * @var DateTime
     */
    var $created = '';
    
    /**
     * Campo updated
     *
     * @var DateTime
     */
    var $updated = '';
    
    /**
     * Acción login que identificará un usuario en la aplicación.
     * Comprobará si existe un usuario con ese username y esa password.
     *
     * @param string $username nombre de usuario
     * @param string $password contraseña
     * @return array usuario de la aplicación
     */
    function login($username, $password) {
    	$this->db->where('name', $username);
        $this->db->where('pass', $password);
        $query = $this->db->get('users');
       	return $query->row();
    }
    
    /**
     * Acción addUser que añadirá un nuevo usuario en la aplicación.
     *
     * @param string $username nombre de usuario
     * @param string $password contraseña
     */
    function addUser($username, $password) {
    	$this->id_rol = USER;
    	$this->name = $username;
    	$this->pass = $password;
    	$this->created = date(DATABASE_DATE_FORMAT);
    	$this->updated = date(DATABASE_DATE_FORMAT);
    	$this->db->insert('users', $this);
    }
}