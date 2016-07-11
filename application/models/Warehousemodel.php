<?php 

	/**
	* @author rivail santos
	*/
	class Warehousemodel extends CI_Model
	{
		
		public function generateData($totalPallets)
		{
			$this->load->helper('string');
			
			$this->db->trans_begin();

			$ware['label'] = "warehouse number";
			$this->db->insert('warehouse', $ware);
			$idWare = $this->db->insert_id();

			$warelimit['warehouse_origin_id'] = $idWare;
			$warelimit['warehouse_target_id'] = null;
			$warelimit['limite'] = rand(1000, 10000);
			$this->db->insert('warehouse_limits', $warelimit);
	
			//inicia o laco de repeticao para insercao dos itens
			for($i = 0; $i < $totalPallets; $i++) {	
				//insere os pallets
				$pallet['warehouse_current'] = $idWare;
				$pallet['warehouse_destiny'] = null;
				$pallet['status_id'] = 2;
				$pallet['code'] = random_string('numeric', 10);
				$this->db->insert('pallet', $pallet);
				$idPallet[$i] = $this->db->insert_id();

				//inserer 100 master por pallets
				for($m = 0; $m < 100; $m++) {
					//inserer os masters
					$master['warehouse_current'] = $idWare;
					$master['warehouse_destiny'] = null;
					$master['pallet_id'] = $idPallet[$i];
					$master['status_id'] = 2;
					$master['code'] = random_string('numeric', 10);
					$this->db->insert('master', $master);
					$idMaster[$m] = $this->db->insert_id();

					//insere 10 produtos por master
					for($im = 0; $im < 10; $im++) {

						//insere os produtos		
						$valor = rand(500, 3000);
						$produto['code'] = random_string('numeric', 10);
						$produto['comercial_name'] = alternator('Galaxy Y', 'Galaxy s5', 'Galaxy s6', 'Galaxy s4', 
							'Galaxy s3', 'Galaxy s3 mini', 'Galaxy s4 mini', 'Samsung Note 4', 'Samsung Note 5');
						$produto['unitary_price'] = $valor;
						$this->db->insert('product', $produto);
						$idProduto[$im] = $this->db->insert_id();

						//insere os imeis por master
						$imei['warehouse_current'] = $idWare;
						$imei['warehouse_destiny'] = null;
						$imei['master_id'] = $idMaster[$m];
						$imei['product_id'] = $idProduto[$im];
						$imei['status_id'] = 2;
						$imei['code'] = random_string('numeric', 10);
						$this->db->insert('imei', $imei);	
					}
				}
			}

			$this->db->trans_complete();
			if($this->db->trans_status() != FALSE)
			{
				$this->db->trans_commit();
				return true;
			}	
			else
			{
				 $this->db->trans_rollback();
				return false;
			}
		}//fim

		/**
		* @author rivail santos
		* return the pallets by the warehouse
		* @param $ware - id warehouse
		*/
		public function getPallets($ware = null)
		{
			$sql = "select w.*, p.id as pallet, p.code as pallet_code,
			(select count(*) from master m where m.pallet_id = p.id) as total_master
			from warehouse w
			inner join pallet p on p.warehouse_current = w.id";
			$where = $ware != null ? "where w.id = ".$ware : " ";
			$sqlfinal = $sql." ".$where;
			return $this->db->query($sqlfinal);
		}//fim

		/**
		* @author rivail santos
		* return the master and products info by the pallet id
		* @param $id - pallet id
		*/
		public function getPalletInfo($id)
		{

			$fields = " m.code as master_code,
						m.id as master,
						m.pallet_id as pallet,
						w.label as warehouse";
            $this->db->select($fields);
            $this->db->from('master m');
            $this->db->join('warehouse w', 'w.id = m.warehouse_current');
            $this->db->where('m.status_id ', 2);
            $this->db->where('m.pallet_id ', $id);
            return $this->db->get();
		}//fim
		 
		/**
		* @author rivail santos
		* retunr the total value of the pallet products
		* @param $pallet - pallet id
		*/
		public function getPalletValue($pallet)
		{

	 		$this->db->select('sum(p.unitary_price) as total');
	 		$this->db->from('master m');
	 		$this->db->join('imei i', 'i.master_id = m.id');
	 		$this->db->join('product p', 'p.id = i.product_id');
	 		$this->db->where('m.pallet_id', $pallet);
	 		$this->db->where('m.status_id', 2);
	 		return $this->db->get();
		}//fim

	}//fim class

 ?>