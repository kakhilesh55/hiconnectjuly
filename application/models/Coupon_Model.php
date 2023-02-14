<?php
	class Coupon_Model extends CI_Model{

		public function add_coupon(){
			$data = array('coupon_name' => $this->input->post('coupon_name'),
			'percentage' => $this->input->post('percentage'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'coupon_status' => $this->input->post('coupon_status'));
			$res=  $this->db->insert('coupon', $data);
		}

		public function get_coupons(){
			$user_id = $this->session->userdata('id');
			$this->db->order_by('coupon_id');
			$query = $this->db->get('coupon');
			return $query->result_array();
		}

		public function edit_coupon($id){
			$this->db->where('coupon_id', 4);
			$query = $this->db->get('coupon');
			return $query->row();
		}
		public function view_coupon($id){
			$this->db->where('cupon_id', $id);
			$query = $this->db->get(' cupon');
			$coupn=$query->row();
			echo json_encode(array(
				"count"=>2,
				"percentage"=>$coupn['percentage'],
				"coupon_name"=>$coupn['cupon_name'],
				"coupon_id"=>$coupn['cupon_id']
			));
			//return $query->row();
		}

		public function update_coupon($id){
			$data = array('coupon_name' => $this->input->post('coupon_name'),
			'percentage' => $this->input->post('percentage'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'coupon_status' => $this->input->post('coupon_status'));
			$this->db->where('coupon_id', $id);
			$res = $this->db->update('coupon', $data);
		}

		public function delete_coupon($id){
			$this->db->where('coupon_id', $id);
        	return $this->db->delete('coupon');
		}

	}