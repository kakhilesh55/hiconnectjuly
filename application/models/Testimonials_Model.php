<?php
	class Testimonials_Model extends CI_Model{

		public function add_testimonial(){
			$data = array('name' => $this->input->post('name'),
			'designation' => $this->input->post('designation'),
			'company' => $this->input->post('company'),
			'message' => $this->input->post('message'),
			'user_id' => $this->session->userdata('id') );
			$res=  $this->db->insert('testimonials', $data);
		}

		public function get_testimonials(){
			$user_id = $this->session->userdata('id');
			$this->db->order_by('testimonial_id');
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('testimonials');
			return $query->result_array();
		}

		public function edit_testimonial($id){
			$this->db->where('testimonial_id', $id);
			$query = $this->db->get('testimonials');
			return $query->row();
		}

		public function update_testimonial($id){
			$data = array('name' => $this->input->post('name'),
			'designation' => $this->input->post('designation'),
			'company' => $this->input->post('company'),
			'message' => $this->input->post('message'));
			$this->db->where('testimonial_id', $id);
			$res = $this->db->update('testimonials', $data);
		}

		public function delete_testimonial($id){
			$this->db->where('testimonial_id', $id);
        	return $this->db->delete('testimonials');
		}

	}