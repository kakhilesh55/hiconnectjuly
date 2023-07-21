<?php
	class Education_Model extends CI_Model{

		public function add_education(){
			$data = array('name' => $this->input->post('name'),
			'edu_type' => $this->input->post('edu_type'),
			'start_date' => $this->input->post('start_date'),
			'end_date' => $this->input->post('end_date'),
			'description' => $this->input->post('description'),
			'user_id' => $this->session->userdata('id') );
			$res=  $this->db->insert('education', $data);
		}
	public function getedu($id){
		    	$user_id = $this->session->userdata('id');
			$this->db->where('education_id',$id);
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('education');
		  return $query->result(); 
		}
			public function getpdt($id){
		    	$user_id = $this->session->userdata('id');
			$this->db->where('product_id',$id);
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('products');
		  return $query->result(); 
		}
			public function gettesti($id){
		    	$user_id = $this->session->userdata('id');
			$this->db->where('testimonial_id',$id);
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('testimonials');
		  return $query->result(); 
		}
			public function getserv($id){
		    	$user_id = $this->session->userdata('id');
			$this->db->where('service_id',$id);
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('services');
		  return $query->result(); 
		}
			public function getach($id){
		    	$user_id = $this->session->userdata('id');
			$this->db->where('achievement_id ',$id);
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('achievements');
		  return $query->result(); 
		}
			public function getexp($id){
		    	$user_id = $this->session->userdata('id');
			$this->db->where('experience_id ',$id);
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('experience');
		  return $query->result(); 
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
			//echo $this->query;
			return $query->result();
		}

		public function update_education($id){
			$data = array('name' => $this->input->post('name'),
			'edu_type' => $this->input->post('edu_type'),
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