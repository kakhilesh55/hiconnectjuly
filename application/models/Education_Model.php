<?php
	class Education_Model extends CI_Model{

		public function add_education(){
			$data = array('name' => $this->input->post('name'),
			'university' => $this->input->post('university'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'description' => $this->input->post('description'),
			'user_id' => $this->session->userdata('id') );
			$res=  $this->db->insert('education', $data);
		}

		public function get_educations(){
			$user_id = $this->session->userdata('id');
			$this->db->order_by('education_id');
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('education');
			return $query->result_array();
		}

		public function edit_education($id){
			$this->db->where('education_id', $id);
			$query = $this->db->get('education');
			return $query->row();
		}

		public function update_education($id){
			$data = array('name' => $this->input->post('name'),
			'university' => $this->input->post('university'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'description' => $this->input->post('description'));
			$this->db->where('education_id', $id);
			$res = $this->db->update('education', $data);
		}

		public function delete_education($id){
			$this->db->where('education_id', $id);
        	return $this->db->delete('education');
		}

	}