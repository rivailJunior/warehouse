<?php 

	/**
	* @author rivail santos
	* this is the main controller of this project
	* this is responsible for the list of pallets,
	* the process of initialize the transport of pallets,
	* updates the data in the db and generate the log of the process
	*/

	class Warecontroller extends CI_Controller
	{
		
		function __construct()
		{
			parent::__construct();
			$this->load->model('warehousemodel');
		}
		
		public $data = array();

		/**
		* load the main page
		*/
		public function index($id = null)
		{
			$this->load->view('index', $this->data);
			$this->load->view('ware/index', $this->data);
			$this->load->view('footer', $this->data);
		}//fim

		/**
		* @author rivail santos 
		* return the pallets by the warehouse select
		*/
		public function getPallets()
		{
			$warehouse = $this->input->post('warehouse');
			$this->data['pallets'] = $this->warehousemodel->getPallets($warehouse);
			$this->load->view('ware/container', $this->data);
		}//fim


		/**
		* @author rivail santos
		* this is used just to generate the store the values in the tables 
		* generate the inserts at tables imeis, products, masters, pallets, warehouse, warehouse_limit
		*/
		public function generator($total = null)
		{
			if(isset($total)){
				$this->warehousemodel->generateData($total);	
			}
			else {
				$this->index();
			}
		}//fim function

		/**
		* @author rivail santos
		* return all the master by the pallet id
		*/
		public function getInfoPallets($id)
		{
			
			if(isset($id)){
				$this->data['pallets'] = $this->warehousemodel->getPalletInfo($id);
			}
			$this->load->view('ware/modalcontainer', $this->data);
		}//fim

	}//fim class

 ?>