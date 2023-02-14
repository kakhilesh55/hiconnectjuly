<?php
	class Set_Cover_Model extends CI_Model{
		function __construct() { 
		    $this->tableName = 'cover_image'; 
		} 
	     /*  Fetch files data from the database  */ 
	    public function getRows($category_id = ''){ 
	        $this->db->select('cover_id,category_id,file_name,uploaded_on,added_by,user_id'); 
	        $this->db->from('cover_image'); 
	        if($category_id){ 
	            $this->db->where('category_id',$category_id); 
	            $query = $this->db->get(); 
	            $result = $query->result_array(); 
	        }else{ 
	            $this->db->order_by('uploaded_on','desc'); 
	            $query = $this->db->get(); 
	            $result = $query->result_array(); 
	        } 
	        return !empty($result)?$result:false; 
	    } 
	     
	    /* Insert file data into the database  */ 
	    
	    public function insert($data){ 
	        $insert = $this->db->insert('cover_image',$data); 
	        return $insert?$this->db->insert_id():false; 
	    } 
	    /* Delete file data from the database  */ 
		public function delete_cover_image($id){
			$this->db->where('cover_id', $id);
        	return $this->db->delete('cover_image');
		}

		public function get_cover($user_id){
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('set_cover');
			return $query->row();
		}

		public function update_cover($user_id,$cover_id){
			$data = array('cover_id' => $cover_id);
			$this->db->where('user_id', $user_id);
			$res = $this->db->update('set_cover', $data);
		}

		public function set_cover($user_id,$cover_id){
			$data = array('user_id' => $user_id,
						  'cover_id' => $cover_id
						  );
			$res=  $this->db->insert('set_cover', $data);
		}

		public function get_image_by_cover($cover_id){
			$this->db->where('cover_id', $cover_id);
			$query = $this->db->get('cover_image');
			return $query->row();
		}

	}