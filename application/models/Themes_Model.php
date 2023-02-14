<?php
	class Themes_Model extends CI_Model{

		public function add_theme($data){
			$res=  $this->db->insert('themes', $data);
			return $res;
		}

		public function get_themes(){
			$this->db->order_by('theme_id');
			$query = $this->db->get('themes');
			return $query->result_array();
		}

		public function edit_theme($id){
			$this->db->where('theme_id', $id);
			$query = $this->db->get('themes');
			return $query->row();
		}

		public function update_theme($id,$data){
			$this->db->where('theme_id', $id);
			$res = $this->db->update('themes', $data);
		}

		public function delete_theme($id){
			$this->db->where('theme_id', $id);
        	return $this->db->delete('themes');
		}

	}