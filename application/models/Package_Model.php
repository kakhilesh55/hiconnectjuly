<?php
	class Package_Model extends CI_Model{

		public function add_package(){
			$data = array('package' => $this->input->post('package'),
                'currency' => $this->input->post('currency'),
				'regular_price' => $this->input->post('regular_price'),
				'sale_price' => $this->input->post('sale_price'),
				'description' => $this->input->post('description') );
			$res=  $this->db->insert('package', $data);
		}

		public function get_packages(){
			$this->db->order_by('package_id');
			$query = $this->db->get('package');
			return $query->result_array();
		}
	public function get_cpn(){
			$this->db->order_by('coupon_id ');
			$this->db->where('view_status', 1);
			$query = $this->db->get('coupon');
			return $query->result_array();
		}
		public function edit_package($id){
			$this->db->where('package_id', $id);
			$query = $this->db->get('package');
			return $query->row();
		}

		public function update_package($id){
			$data = array('package' => $this->input->post('package'),
                'currency' => $this->input->post('currency'),
				'regular_price' => $this->input->post('regular_price'),
				'sale_price' => $this->input->post('sale_price'),
				'description' => $this->input->post('description'));
			$this->db->where('package_id', $id);
			$res = $this->db->update('package', $data);
		}

		public function delete_package($id){
			$this->db->where('package_id', $id);
        	return $this->db->delete('package');
		}

		public function update_package_user($user_id,$package_id){
			$data = array('package' => $package_id);
			$this->db->where('id', $user_id);
			$res = $this->db->update('users', $data);
		}

		public function get_package_by_user($user_id){
			$this->db->select('package'); 
		  	$this->db->from('users'); 
		  	$this->db->where('id',$user_id); 
		 	$query = $this->db->get(); 
		 	$result = $query->row_array(); 
		 	return $result;
		}


	}