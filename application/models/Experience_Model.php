<?php
	class Experience_Model extends CI_Model{

		public function add_experience(){
			$data = array('company' => $this->input->post('company'),
			'position' => $this->input->post('position'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'description' => $this->input->post('description'),
			'place' => $this->input->post('place'),
			'status' => $this->input->post('work_status')?$this->input->post('work_status'):0,
			'user_id' => $this->session->userdata('id') );
			$res=  $this->db->insert('experience', $data);
		}

		public function get_experiences(){
			$user_id = $this->session->userdata('id');
			$this->db->order_by('experience_id');
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('experience');
			return $query->result_array();
		}

		public function edit_experience($id){
			$this->db->where('experience_id', $id);
			$query = $this->db->get('experience');
			return $query->result();
		}

		public function update_experience($id){
			$data = array('company' => $this->input->post('company'),
			'position' => $this->input->post('position'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'description' => $this->input->post('description'),
			'place' => $this->input->post('place'),
			'status' => ($this->input->post('work_status'))?$this->input->post('work_status'):0);
			$this->db->where('experience_id', $id);
			$res = $this->db->update('experience', $data);
		}

		public function delete_experience($id){
			$this->db->where('experience_id', $id);
        	return $this->db->delete('experience');
		}

		public function getwork($id){
		    $user_id = $this->session->userdata('id');
			$this->db->where('experience_id',$id);
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('experience');
		  return $query->result(); 
		}

	}