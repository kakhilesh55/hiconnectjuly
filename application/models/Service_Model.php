<?php
	class Service_Model extends CI_Model{

		public function add_service(){
			$data = array('service' => $this->input->post('service'),
			'description' => $this->input->post('description'),
			'user_id' => $this->session->userdata('id') );
			$res=  $this->db->insert('services', $data);
		}

		public function get_services(){
			$user_id = $this->session->userdata('id');
			$this->db->order_by('service_id');
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('services');
			return $query->result_array();
		}

		public function edit_service($id){
			$this->db->where('service_id', $id);
			$query = $this->db->get('services');
			return $query->row();
		}

		public function update_service($id){
			$data = array('service' => $this->input->post('service'),
			'description' => $this->input->post('description'),
			'user_id' => $this->session->userdata('id'));
			$this->db->where('service_id', $id);
			$res = $this->db->update('services', $data);
		}

		public function delete_service($id){
			$this->db->where('service_id', $id);
        	return $this->db->delete('services');
		}

	}