<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Configuración CSS comunes.
 *  
 * @author egonzalez@kitmaker.com
 */
$config['resources']['css']['common'] = array('bootstrap-theme.min.css', 'bootstrap.min.css', 'blog.css');

/**
 * Configuración JS comunes.
 *
 * @author egonzalez@kitmaker.com
 */
$config['resources']['js']['common'] = array('jquery-2.1.3.min.js', 'bootstrap.min.js', 'nav-dropdown.js');

/**
 * Configuración CSS controlador.acción.
 *
 * @author egonzalez@kitmaker.com
 */
$config['resources']['css']['posts.index'] = array('jquery.dataTables.min.css', 'jquery.dataTables_themeroller.css');

/**
 * Configuración JS controlador.acción.
 *
 * @author egonzalez@kitmaker.com
 */
$config['resources']['js']['posts.index'] = array('jquery.dataTables.min.js');
$config['resources']['js']['users.login'] = array('ajaxform.js');
$config['resources']['js']['users.register'] = array('ajaxform.js');
