<?php
	class Achievements_Model extends CI_Model{

		public function add_achievement($data){
			$res=  $this->db->insert('achievements', $data);
			return $res;
			/*$data = array('name' => $this->input->post('name'),
			'description' => $this->input->post('description'),
			'user_id' => $this->session->userdata('id') );
			$res=  $this->db->insert('achievements', $data);*/
		}

		public function get_achievements(){
			$user_id = $this->session->userdata('id');
			$this->db->order_by('achievement_id');
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('achievements');
			return $query->result_array();
		}

		public function edit_achievement($id){
			$this->db->where('achievement_id', $id);
			$query = $this->db->get('achievements');
			return $query->row();
		}

		public function update_achievement($id){
			$data = array('name' => $this->input->post('name'),
			'description' => $this->input->post('description'));
			$this->db->where('achievement_id', $id);
			$res = $this->db->update('achievements', $data);
		}

		public function delete_achievement($id){
			$this->db->where('achievement_id', $id);
        	return $this->db->delete('achievements');
		}

		public function getachievement($id){
		    $user_id = $this->session->userdata('id');
			$this->db->where('achievement_id',$id);
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('achievements');
		  return $query->result(); 
		}

	}