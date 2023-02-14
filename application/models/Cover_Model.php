<?php
	class Cover_Model extends CI_Model{

		public function add_category(){
			$data = array('category' => $this->input->post('category') );
			$res=  $this->db->insert('cover_category', $data);
		}

		public function get_categories(){
			$this->db->order_by('category_id');
			$query = $this->db->get('cover_category');
			return $query->result_array();
		}

		public function edit_category($id){
			$this->db->where('category_id', $id);
			$query = $this->db->get('cover_category');
			return $query->row();
		}

		public function update_category($id){
			$data = array('category' => $this->input->post('category'));
			$this->db->where('category_id', $id);
			$res = $this->db->update('cover_category', $data);
		}

		public function delete_category($id){
			$this->db->where('category_id', $id);
        	return $this->db->delete('cover_category');
		}

	}