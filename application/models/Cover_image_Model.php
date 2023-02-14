<?php
	class Cover_image_Model extends CI_Model{
		function __construct() { 
		    $this->tableName = 'cover_image'; 
		} 
	     /*  Fetch files data from the database  */ 
	    public function getRows($id = ''){ 
	        $this->db->select('cover_id,category_id,file_name,uploaded_on,added_by,user_id'); 
	        $this->db->from('cover_image'); 
	        if($id){ 
	            $this->db->where('cover_id',$id); 
	            $query = $this->db->get(); 
	            $result = $query->row_array(); 
	        }else{ 
	            $this->db->order_by('uploaded_on','desc'); 
	            $query = $this->db->get(); 
	            $result = $query->result_array(); 
	        } 
	        return !empty($result)?$result:false; 
	    } 
	     
	    /* Insert file data into the database  */ 
	    
	    public function insert($data = array()){ 
	        $insert = $this->db->insert_batch('cover_image',$data); 
	        return $insert?true:false; 
	    } 
	    /* Delete file data from the database  */ 
		public function delete_cover_image($id){
			$this->db->where('cover_id', $id);
        	return $this->db->delete('cover_image');
		}

	}