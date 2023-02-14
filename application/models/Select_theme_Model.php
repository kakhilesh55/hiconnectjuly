<?php
	class Select_theme_Model extends CI_Model{
		function __construct() { 
		    $this->tableName = 'user_theme'; 
		} 
	     
		public function get_theme($user_id){
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('user_theme');
			return $query->row();
		}

		public function update_theme($user_id,$theme_id){
			$data = array('theme_id' => $theme_id,
							'date' => date("Y-m-d H:i:s"));
			$this->db->where('user_id', $user_id);
			$res = $this->db->update('user_theme', $data);
		}

		public function set_theme($user_id,$theme_id){
			$data = array('theme_id' => $theme_id,
							'user_id' => $user_id,
						  'date' => date("Y-m-d H:i:s")
						  );
			$res=  $this->db->insert('user_theme', $data);
		}

		public function get_image_by_theme($theme_id){
			$this->db->where('theme_id', $theme_id);
			$query = $this->db->get('themes');
			return $query->row();
		}

	}