<?php
	class Enquiry_Model extends CI_Model{		

		 public function getRows($from_date = '',$to_date = ''){ 
		 	$user_id = $this->session->userdata('id');
	        $this->db->select('id,name,email,phone,comments,date,status,status_button'); 
	        $this->db->from('contact_form_info'); 
	        $this->db->where('user_id', $user_id);
	        if($from_date!='' && $to_date!=''){ 
				$this->db->where('date BETWEEN "'. date('Y-m-d', strtotime($from_date)). '" and "'. date('Y-m-d', strtotime($to_date)).'"');$query = $this->db->get(); 
	            $result = $query->result_array(); 
	        }
	        else if($from_date!=''){ 
	            $this->db->where('date >=', $from_date);
				$query = $this->db->get(); 
	            $result = $query->result_array(); 
	        }
	        else if($to_date!=''){ 
				$this->db->where('date <=', $to_date);
				$query = $this->db->get(); 
	            $result = $query->result_array(); 
	        }
	        else{ 
	            $this->db->order_by('date','desc'); 
	            $query = $this->db->get(); 
	            $result = $query->result_array(); 
	        } 
	        
	            return !empty($result)?$result:false; 
	    } 
		public function view_lead($id){
			$this->db->where('customer_id', $id);
			$query = $this->db->get('lead');
			return $query->row();
		}
		function getUsers($postData){

			$response = array();
	   
			if(isset($postData['search']) ){
			  // Select record
			  $this->db->select('*');
			  $this->db->where("name like '%".$postData['search']."%' ");
	   
			  $records = $this->db->get('users')->result();
	   
			  foreach($records as $row ){
				 $response[] = array("value"=>$row->id,"label"=>$row->name);
			  }
	   
			}
	   
			return $response;
		 }

	}