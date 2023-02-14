<?php
	class Social_Model extends CI_Model{

		public function add_social_link_type(){
			$data = array('social_link_type' => strtolower($this->input->post('social')),
							'social_class' => $this->input->post('social_class') );
			$res=  $this->db->insert('social_link_type', $data);
		}

		public function get_social_link_types(){
			$this->db->order_by('social_link_id');
			$query = $this->db->get('social_link_type');
			return $query->result_array();
		}

		public function edit_social_link_type($id){
			$this->db->where('social_link_id', $id);
			$query = $this->db->get('social_link_type');
			return $query->row();
		}

		public function check_social_link_type($type){
			$this->db->where('social_link_type', $type);
			$query = $this->db->get('social_link_type');
			return $query->row();
		}

		public function update_social_link_type($id){
			$data = array('social_link_type' => strtolower($this->input->post('social')),
							'social_class' => $this->input->post('social_class'));
			$this->db->where('social_link_id', $id);
			$res = $this->db->update('social_link_type', $data);
		}

		public function delete_social_link_type($id){
			$this->db->where('social_link_id', $id);
        	return $this->db->delete('social_link_type');
		}

	}