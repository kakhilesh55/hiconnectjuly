<?php
	class Company_Model extends CI_Model{
		
		public function add_company($data){
			$res=  $this->db->insert('company', $data);
			return($res);
		}

		public function edit_company($id){
			$this->db->where('company_id', $id);
			$query = $this->db->get('company');
			doLog($this->db->last_query());
			return $query->row();
		}

		public function get_company_by_user($user_id){
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('company');
			return $query->row();
		}

		public function update_company_details($id,$data){
			$this->db->where('company_id', $id);
			$res = $this->db->update('company', $data);
			return($res);
		}

		// Check Company name exists
		public function check_company_exists($company_name){
			$query = $this->db->get_where('company', array('company_name' => $company_name));

			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}

	}