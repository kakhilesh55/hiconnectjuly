<?php
	class Qr_Model extends CI_Model{
		
		public function add_qr($data){
			$res=  $this->db->insert('qr_images', $data);
			return($res);
		}

		public function get_qr_by_user($user_id){
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('qr_images');
			return $query->row();
		}
		public function get_qr(){
			$this->db->select('*');    
$this->db->from('qr_images');
//$this->db->join('users', 'users.id = qr_images.user_id');
$query = $this->db->get();
			
			

			return $query->result_array();
		}

	}