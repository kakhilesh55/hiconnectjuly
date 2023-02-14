<?php
	class Payment_app_Model extends CI_Model{

		public function add_payment_app(){
			$data = array('payment_type' => $this->input->post('payment_type'),
							'app_name' => $this->input->post('app_name')
			 );
			$res=  $this->db->insert('payment_app', $data);
		}

		public function get_payment_apps(){
			$this->db->order_by('app_id');
			$query = $this->db->get('payment_app');
			return $query->result_array();
		}

		public function edit_payment_app($id){
			$this->db->where('app_id', $id);
			$query = $this->db->get('payment_app');
			return $query->row();
		}

		public function update_payment_app($id){
			$data = array('payment_type' => $this->input->post('payment_type'),
							'app_name' => $this->input->post('app_name'));
			$this->db->where('app_id', $id);
			$res = $this->db->update('payment_app', $data);
		}

		public function delete_payment_app($id){
			$this->db->where('app_id', $id);
        	return $this->db->delete('payment_app');
		}

	}