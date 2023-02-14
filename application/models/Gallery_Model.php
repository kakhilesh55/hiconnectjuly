<?php
	class Gallery_Model extends CI_Model{
		function __construct() { 
		    $this->tableName = 'gallery'; 
		} 
	     /*  Fetch files data from the database  */ 
	    public function getRows($id = ''){ 
		 	$user_id = $this->session->userdata('id');
	        $this->db->select('id,file_name,uploaded_on'); 
	        $this->db->from('gallery'); 
	        $this->db->where('user_id',$user_id); 
	        if($id){ 
	            $this->db->where('id',$id); 
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
	        $insert = $this->db->insert_batch('gallery',$data); 
	        return $insert?true:false; 
	    } 
	    /* Delete file data from the database  */ 
		public function delete_image($id){
			$this->db->where('id', $id);
        	return $this->db->delete('gallery');
		}

	}