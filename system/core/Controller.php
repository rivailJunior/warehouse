<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * This content is released under the MIT License (MIT)
 *
 * Copyright (c) 2014 - 2015, British Columbia Institute of Technology
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 * @package	CodeIgniter
 * @author	EllisLab Dev Team
 * @copyright	Copyright (c) 2008 - 2014, EllisLab, Inc. (http://ellislab.com/)
 * @copyright	Copyright (c) 2014 - 2015, British Columbia Institute of Technology (http://bcit.ca/)
 * @license	http://opensource.org/licenses/MIT	MIT License
 * @link	http://codeigniter.com
 * @since	Version 1.0.0
 * @filesource
 */
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Application Controller Class
 *
 * This class object is the super class that every library in
 * CodeIgniter will be assigned to.
 *
 * @package		CodeIgniter
 * @subpackage	Libraries
 * @category	Libraries
 * @author		EllisLab Dev Team
 * @link		http://codeigniter.com/user_guide/general/controllers.html
 */
class CI_Controller {

	/**
	 * Reference to the CI singleton
	 *
	 * @var	object
	 */
	private static $instance;

	/**
	 * Class constructor
	 *
	 * @return	void
	 */
	public function __construct()
	{
		self::$instance =& $this;

		// Assign all the class objects that were instantiated by the
		// bootstrap file (CodeIgniter.php) to local class variables
		// so that CI can run as one big super object.
		foreach (is_loaded() as $var => $class)
		{
			$this->$var =& load_class($class);
		}

		$this->load =& load_class('Loader', 'core');
		$this->load->initialize();
		log_message('debug', 'Controller Class Initialized');
	}

	// --------------------------------------------------------------------

	/**
	 * Get the CI singleton
	 *
	 * @static
	 * @return	object
	 */
	public static function &get_instance()
	{
		return self::$instance;
	}


	     function cpf_putmask($cpf)
	{
		$cpf1 = substr_replace($cpf,'.',3,0);
		$cpf2 = substr_replace($cpf1,'.',7,0);
		$cpf_with_mask = substr_replace($cpf2,'-',11,0);
		return $cpf_with_mask;
	}
	
	function cpf_removemask($cpf)
	{
		$chrs = array('.','-');
		$cpf_without_mask = str_replace($chrs,'',$cpf);
		return $cpf_without_mask;
	}

	   function cnpj_putmask($cnpj)
	{
		$cnpj1 = substr_replace($cnpj,'.',3,0);
		$cnpj2 = substr_replace($cnpj1,'.',7,0);
		$cnpj3 = substr_replace($cnpj2,'/',11,0);		
		$cnpj_with_mask = substr_replace($cnpj3,'-',16,0);
		return $cnpj_with_mask;
	}
	
	function cnpj_removemask($cnpj)
	{
		$chrs = array('.','/','-');
		$cnpj_without_mask = str_replace($chrs,'',$cnpj);
		return $cnpj_without_mask;
	}
        function convertDate($inputdate)
	{ //inputdate format dd/mm/yyyy
		$date=explode('/',$inputdate);
		$dated=$date[2].'-'.$date[1].'-'.$date[0];
		return $dated; //dated format yyy-mm-dd
	}

	function re_convertDate($inputdate)
	{ //inputdate format yyyy-mm-dd
		$date=explode('-',$inputdate);
		$dated=$date[2].'/'.$date[1].'/'.$date[0];
		return $dated; //dated format dd/mm/yyyy
	}

}

/* End of file Controller.php */
/* Location: ./system/core/Controller.php */