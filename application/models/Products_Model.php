<?php
	class Products_Model extends CI_Model{

		public function add_product($data){
			$res=  $this->db->insert('products', $data);
			return $res;
		}

		public function get_products(){
			$user_id = $this->session->userdata('id');
			$this->db->order_by('product_id');
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('products');
			return $query->result_array();
		}
		public function get_product(){
			//$user_id = $this->session->userdata('id');
			$this->db->order_by('product_id');
		
			$query = $this->db->get('products');
			return $query->result_array();
		}
		public function get_manageproduct(){
			//$user_id = $this->session->userdata('id');
			$this->db->order_by('id');
		
			$query = $this->db->get('manage_products');
			return $query->result_array();
		}
		public function edit_product($id){
			$this->db->where('product_id', $id);
			$query = $this->db->get('products');
			return $query->row();
		}
		public function edit_manageproduct($id){
			$this->db->where('id', $id);
			$query = $this->db->get('manage_products');
			return $query->row();
		}
			public function edit_manageproductimg($id){
			$this->db->where('product_id', $id);
			$query = $this->db->get('files');
			return $query->result_array();
		}
		public function update_product($id,$data){
			$this->db->where('product_id', $id);
			$res = $this->db->update('products', $data);
		}

		public function delete_product($id){
			$this->db->where('product_id', $id);
        	return $this->db->delete('products');
		}

	}