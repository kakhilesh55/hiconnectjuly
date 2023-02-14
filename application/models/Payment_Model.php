<?php
	class Payment_Model extends CI_Model{

		public function add_payment(){
			$data = array('payment_type' => $this->input->post('payment_type'),
			'account_no' => $this->input->post('account_no'),
			'ifsc' => $this->input->post('ifsc'),
			'bank_name' => $this->input->post('bank_name'),
			'bank_branch' => $this->input->post('bank_branch'),
			'bank_address' => $this->input->post('bank_address'),
			'app_id' => $this->input->post('app'),
			'handle' => $this->input->post('handle'),
			'user_id' => $this->session->userdata('id') );
			$res=  $this->db->insert('payment_details', $data);
		}

		public function get_payments(){
			$user_id = $this->session->userdata('id');
			$this->db->order_by('payment_id');
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('payment_details');
			return $query->result_array();
		}

		public function edit_payment($id){
			$this->db->where('payment_id', $id);
			$query = $this->db->get('payment_details');
			return $query->row();
		}

		public function update_payment($id){
			$data = array('payment_type' => $this->input->post('payment_type'),
			'account_no' => $this->input->post('account_no'),
			'ifsc' => $this->input->post('ifsc'),
			'bank_name' => $this->input->post('bank_name'),
			'bank_branch' => $this->input->post('bank_branch'),
			'bank_address' => $this->input->post('bank_address'),
			'app_id' => $this->input->post('app'),
			'handle' => $this->input->post('handle') );
			$this->db->where('payment_id', $id);
			$res = $this->db->update('payment_details', $data);
		}

		public function delete_payment($id){
			$this->db->where('payment_id', $id);
        	return $this->db->delete('payment_details');
		}

	}