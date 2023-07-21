<?php
	class Manage_products_Model extends CI_Model{

		public function add_product($data){
			$res=  $this->db->insert('manage_products', $data);
			return $res;
		}

		public function get_products(){
			$this->db->order_by('id');
			$query = $this->db->get('manage_products');
			return $query->result_array();
		}
	public function get_productsuser(){
			$this->db->order_by('id');
			$query = $this->db->get('manage_products');
			return $query->result_array();
		}
		public function edit_product($id){
			$this->db->where('id', $id);
			$query = $this->db->get('manage_products');
			return $query->row();
		}

		public function update_product($id,$data){
			$this->db->where('id', $id);
			$res = $this->db->update('manage_products', $data);
		}
	public function dis_product($id){
	    	$this->db->set('status', 1);
			$this->db->where('id', $id);
			$res = $this->db->update('manage_products', $data);
		}
		public function delete_product($id){
			$this->db->where('id', $id);
        	return $this->db->delete('manage_products');
		}
	public function delete_enq($id){
			$this->db->where('id', $id);
        	return $this->db->delete('contact_form_info');
		}
	public function delete_lead($id){
			$this->db->where('id', $id);
        	return $this->db->delete('lead');
		}
		public function get_product_by_user($user_id){
			$this->db->select('product'); 
		  	$this->db->from('users'); 
		  	$this->db->where('id',$user_id); 
		 	$query = $this->db->get(); 
		 	$result = $query->row_array(); 
		 	return $result;
		}

		public function update_product_user($user_id,$product_id){
			$data = array('product' => $product_id);
			$this->db->where('id', $user_id);
			$res = $this->db->update('users', $data);
		}

		public function update_package_product_user($user_id,$package_id,$product_id){
			$data = array('package' => $package_id);
			$data = array('product' => $product_id);
			$this->db->where('id', $user_id);
			$res = $this->db->update('users', $data);
		}

	}