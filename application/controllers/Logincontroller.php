<?php

	/**
	* @author rivail santos
	* controller de login de usuario
	*/
	class Logincontroller extends CI_Controller
	{	

		public $data = array();
		
		function __construct() 
		{
			parent::__construct();
			$this->load->model('administradormodel');
			$this->load->helper(array('form', 'url','date'));
		}

		function index() 
		{
			$this->data['titulo']="Login";
			$this->form_validation->set_rules('senha','senha','trim|required|callback_checklogin');
			$this->form_validation->set_rules('login','login','trim|required');
			
			if(($this->form_validation->run()) == false)
			{
				$this->load->view('Login/login', $this->data);
				
			}
			else
			{
				redirect('/warecontroller/');
			}
		}//fim da function
		

		function checklogin($senha)
		{ 
				$login = $this->input->post('login'); 
		        $senhafinal = md5($senha);

		        $result = $this->administradormodel->validateuser($login,$senhafinal);
		        if($result[0]->id > 0)
		        {
		        	$sess_array = array();
		        	foreach($result as $row)
		        	{
		        		$sess_array = array(
		        			'nome' => $row->nome,
		        			'id'=>$row->id,
		        			'status'=>$row->status,
		        			'login'=>$row->login
		        			);
		        		$this->session->set_userdata('usuariologado', $sess_array);
		        	}
		        	return true; 
		        }
		        else
		        {
		        	$this->form_validation->set_message('checklogin', 'Login e Senha invalidos, verifique e tente novamente!');
		        	return false;
		        }
		    }
		    
		    
		    function show_login($show_error = false)
		    {
		    	$this->data['error'] = $show_error;
		    	$this->load->helper('form');
		    	$this->data['titulo']="Login";
		    	$this->load->view('Login/login', $this->data);
		    }
		    
		    function logout_user() 
		    {
		    	$this->session->sess_destroy();
		    	redirect('logincontroller');
		    }
		    
	}//fim da classe


	?>