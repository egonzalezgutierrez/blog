<?php

/**
 * Modelo de Posts de la aplicación
 *
 * @author		egonzalez@kitmaker.com
 */
class Posts_model extends CI_Model {

	/**
	 * Campo id_post
	 * 
	 * @var int 
	 */
    var $id_post   = '';
    
    /**
	 * Campo id_user
	 * 
	 * @var int 
	 */
    var $id_user = '';
    
    /**
     * Campo content
     *
     * @var string
     */
    var $content = '';
    
    /**
     * Campo censured
     *
     * @var tinyint
     */
    var $censured = '';
    
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
     * Acción getPosts que obtendrá todos los posts de la aplicación.
     * Comprobará si el usuario identidicado tiene el rol de ADMIN en cuyo caso mostrará todos los posts censurados o no.
     * En caso de que le usuario identificado posea el rol de USER sólo devolverá los posts no censurados.
     *
     * @param bool $isAdmin indica si el usuario identificado en el sistema es un administrador o no
     * @return array posts de la aplicación
     */
    function getPosts($isAdmin) {
       	$this->db->select('p.*, u.name');
		$this->db->from('posts p');
		$this->db->join('users u', 'p.id_user = u.id_user');
		if(!$isAdmin) {
			$this->db->where('p.censured', 0);
		}
		$this->db->order_by('p.created', 'desc');
 		$query = $this->db->get();
	    return $query->result_array();
    }

    /**
     * Acción addPosts que añadirá los posts en la aplicación.
     *
     * @param int $id_user identificar del usuario identificado en la aplicación
     * @param string $content contenido del post a añadir
     */
    function addPost($id_user, $content) {
        $this->id_user = $id_user;
        $this->content = $content;
       	//$this->censured = 0;
        $this->created = date(DATABASE_DATE_FORMAT);
        $this->updated = date(DATABASE_DATE_FORMAT);
        $this->db->insert('posts', $this);
    }
    
}