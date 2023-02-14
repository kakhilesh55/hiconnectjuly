<?php
	class Social_link_Model extends CI_Model{

		public function add_social_link(){
			$data = array('social_link_type' => $this->input->post('social_link_type'),
							'link' => $this->input->post('link'),
							'user_id' => $this->session->userdata('id')
			 );
			$res=  $this->db->insert('user_social_links', $data);
		}

		public function get_social_links(){
			$user_id = $this->session->userdata('id');
			$this->db->order_by('user_social_id');
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('user_social_links');
			return $query->result_array();
		}

		public function edit_social_link($id){
			$this->db->where('user_social_id', $id);
			$query = $this->db->get('user_social_links');
			return $query->row();
		}

		public function update_social_link($id){
			$data = array('social_link_type' => $this->input->post('social_link_type'),
							'link' => $this->input->post('link'));
			$this->db->where('user_social_id', $id);
			$res = $this->db->update('user_social_links', $data);
		}

		public function delete_social_link($id){
			$this->db->where('user_social_id', $id);
        	return $this->db->delete('user_social_links');
		}

	}