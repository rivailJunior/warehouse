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
			if(!($this->session->userdata('usuariologado'))){
				redirect('/logincontroller/');
			}
		}
		
		public $data = array();

		/**
		* load the main page
		*/
		public function index($id = null)
		{
			$this->data['warehouses'] = $this->db->get('warehouse');
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
				echo $this->warehousemodel->generateData($total);	
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
		 
        /**
		* @author rivail santos
		* return the value by pallet id
        */
		public function getValuePallet()
		{
			$pallet = $this->input->post('pallet');
			$valor = $this->warehousemodel->getPalletValue($pallet);
			echo $valor->row()->total;
		}//fim

		/***
		* return the limit of transport between two warehouses
		*/
		public function getLimitByWare()
		{
			$destino = $this->input->post('destino');
			$origem = $this->input->post('origem');
				
			if(isset($origem) && isset($destino))
			{
				if($origem != $destino){
					$objeto['origem'] = $origem;
					$objeto['destino'] = $destino;
					$response = $this->warehousemodel->returnLimits($objeto);
					echo $response->row()->limite;	
				}
			}
		}//fim

		public function finishTransfer()
		{
			$origem = $this->input->post('origem');
			$destino = $this->input->post('destino');
			$pallets = $this->input->post('pallets');
			
			$objeto['created_at'] = date('y-m-d');
			$objeto['current'] = $origem;
			$objeto['destiny'] = $destino;
			
			//objeto para criacao de log
			$log['descricao'] = "Log para teste itriad system";
			$log['id_usuario'] = 1;
			$log['acao'] = "Transferencia de carga";
			$log['created_at'] = $objeto['created_at'];
			$log['id_origem'] = $objeto['current'];
			$log['id_destino'] = $objeto['destiny'];
			$idlog = $this->warehousemodel->generateLog($log);
			
			$local['current'] = $objeto['current'];
			$local['destiny'] = $objeto['destiny'];
			$response = null;
			foreach ($pallets as $index => $pallet) {
				$objeto['pallet_id'] = $pallet; 
				$objeto['id_log'] = $idlog;
				$res = $this->warehousemodel->updateAllByPallet($pallet, $local, $objeto);
				if(!$res){
					$response = null;
				}else{
					$response = true;
				}
			}
			
			foreach ($pallets as $index => $pallet) {
				$logs = $this->warehousemodel->generateAllLogs($objeto, $pallet);
			}

			echo $response; 
		}//fim

	}//fim class

 ?>