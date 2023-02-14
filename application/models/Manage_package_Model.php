<?php
	class Manage_package_Model extends CI_Model{
		function __construct() { 
		    $this->tableName = 'manage_package'; 
		} 
	     
	    /* Insert data into the database  */ 
	    
	    public function insert($data){ 
	        $insert = $this->db->insert('manage_package',$data); 
	        return $insert?$this->db->insert_id():false; 
	    } 

	    /* Delete data from the database  */ 
		public function delete_package_pages($id){
			$this->db->where('package_id', $id);
        	return $this->db->delete('manage_package');
		}

 /*  Fetch data from the database  */ 
	    public function getRows($package_id = ''){ 
	        $this->db->select('cover_id,category_id,file_name,uploaded_on,added_by,user_id'); 
	        $this->db->from('manage_package'); 
	        if($package_id){ 
	            $this->db->where('package_id',$package_id); 
	            $query = $this->db->get(); 
	            $result = $query->result_array(); 
	        }else{ 
	            $this->db->order_by('id','desc'); 
	            $query = $this->db->get(); 
	            $result = $query->result_array(); 
	        } 
	        return !empty($result)?$result:false; 
	    } 

 	/* Fetch data from the database */
		public function get_package_pages($id){
			$this->db->where('package_id', $id);
			$query = $this->db->get('manage_package');
			$res = $query->row();
			return $res;
		}  

		public function get_packag(){
			
			$query = $this->db->get('package');
			$result = $query->result_array(); 
			return $result;
		}
		public function get_package(){
			
			$query = $this->db->get('package');
			$result = $query->result_array(); 
			return $result;
		}
		public function update_package_pages($id,$data){
			$this->db->where('package_id', $id);
			$res = $this->db->update('manage_package', $data);
		}

	}