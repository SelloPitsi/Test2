<?php

	/**
	* Model for Clerk Controller
	*/
	class Main_m extends CI_Model{


		public function insertUser($data){
			$this->db->truncate('csv_import');

			$this->db->insert_batch('csv_import', $data);

			$this->db->select("id")
				->from('csv_import');

			$query = $this->db->get();	
			

			return $query->num_rows();
			
		}



	}		


?>