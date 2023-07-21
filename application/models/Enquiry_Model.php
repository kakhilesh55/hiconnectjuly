<?php
	class Enquiry_Model extends CI_Model{		

		 public function getRows($search){ 
		 	$user_id = $this->session->userdata('id');
	        $this->db->select('id,name,email,phone,comments,date,status,status_button,type'); 
	        $this->db->from('contact_form_info'); 
	        $this->db->where('user_id', $user_id);
	        if($search!=''){ 
			 $this->db->where('email', $search);
				$query = $this->db->get(); 
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
	    public function getRows1($from_date = '',$to_date = ''){ 
		 	$user_id = $this->session->userdata('id');
	        $this->db->select('id,name,email,phone,comments,date,status,status_button,type'); 
	        $this->db->from('contact_form_info'); 
	        $this->db->where('user_id', $user_id);
	        $this->db->where('status', 1);
	        if($from_date!='' && $to_date!=''){ 
				$this->db->where('date BETWEEN "'. date('Y-m-d', strtotime($from_date)). '" and "'. date('Y-m-d', strtotime($to_date)).'"');$query = $this->db->get(); 
	            $result = $query->result_array(); 
	        }
	        else if($from_date!=''){ 
	            $this->db->where('date >=', $from_date);
	             $this->db->where('status', 1);
				$query = $this->db->get(); 
	            $result = $query->result_array(); 
	        }
	        else if($to_date!=''){ 
				$this->db->where('date <=', $to_date);
				  $this->db->where('status', 1);
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
	    	    public function getRows2($from_date = '',$to_date = ''){ 
		 	$user_id = $this->session->userdata('id');
	        $this->db->select('id,name,email,phone,comments,date,status,status_button,type'); 
	        $this->db->from('contact_form_info'); 
	        $this->db->where('user_id', $user_id);
	        $this->db->where('status', 2);
	        if($from_date!='' && $to_date!=''){ 
				$this->db->where('date BETWEEN "'. date('Y-m-d', strtotime($from_date)). '" and "'. date('Y-m-d', strtotime($to_date)).'"');$query = $this->db->get(); 
	            $result = $query->result_array(); 
	        }
	        else if($from_date!=''){ 
	            $this->db->where('date >=', $from_date);
	             $this->db->where('status', 2);
				$query = $this->db->get(); 
	            $result = $query->result_array(); 
	        }
	        else if($to_date!=''){ 
				$this->db->where('date <=', $to_date);
				  $this->db->where('status', 2);
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
public function getRows3($from_date = '',$to_date = ''){ 
		 	$user_id = $this->session->userdata('id');
	        $this->db->select('id,name,email,phone,comments,date,status,status_button,type'); 
	        $this->db->from('contact_form_info'); 
	        $this->db->where('user_id', $user_id);
	        $this->db->where('status', 3);
	        if($from_date!='' && $to_date!=''){ 
				$this->db->where('date BETWEEN "'. date('Y-m-d', strtotime($from_date)). '" and "'. date('Y-m-d', strtotime($to_date)).'"');$query = $this->db->get(); 
	            $result = $query->result_array(); 
	        }
	        else if($from_date!=''){ 
	            $this->db->where('date >=', $from_date);
	             $this->db->where('status', 3);
				$query = $this->db->get(); 
	            $result = $query->result_array(); 
	        }
	        else if($to_date!=''){ 
				$this->db->where('date <=', $to_date);
				  $this->db->where('status', 3);
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
	    function getUserss($postData){

     $response = array();

     
       // Select record
       $this->db->select('*');
       $this->db->where("name like '%".$postData['search']."%' ");
       $user_id = $this->session->userdata('id');
     $this->db->where('user_id', $user_id);
       $records = $this->db->get('lead')->result();

       foreach($records as $row ){
          $response[] = array("value"=>$row->customer_id,"label"=>$row->name);
       }
     return $response;
	    }
	    
	    
	     public function getleads($sch = ''){ 
		 	$user_id = $this->session->userdata('id');
	        $this->db->select('*'); 
	        $this->db->from('lead'); 
	        $this->db->where('user_id', $user_id);
	        if($sch!='' ){ 
	            $this->db->where('name', $sch);
			$query = $this->db->get(); 
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
	    
	    
	    public function getleadss($from_date = '',$to_date = ''){ 
	         $date = new DateTime("now");

 $curr_date = $date->format('Y-m-d ');
		 	$user_id = $this->session->userdata('id');
	        $this->db->select('*'); 
	        $this->db->from('lead'); 
	        $this->db->where('user_id', $user_id);
	        
 $this->db->where('DATE(Date)',$curr_date);
	      $query = $this->db->get(); 
	            $result = $query->result_array(); 
	       
	        
	            return !empty($result)?$result:false; 
	    } 
	    
	    	 
	       
	    public function getleads11($from_date = '',$to_date = ''){ 
	         $date = new DateTime("now");

 $curr_date = $date->format('Y-m-d ');
		 	$user_id = $this->session->userdata('id');
	        $this->db->select('*'); 
	        $this->db->from('lead'); 
	        $this->db->where('user_id', $user_id);
	        
 $this->db->where('DATE(Date)>=',$curr_date);

	      $query = $this->db->get(); 
	            $result = $query->result_array(); 
	       
	        
	            return !empty($result)?$result:false; 
	    } 
	    
	    	  
	       public function getleads2($from_date = '',$to_date = ''){ 
	         $date = new DateTime("now");

 $curr_date = $date->format('Y-m-d ');
		 	$user_id = $this->session->userdata('id');
	        $this->db->select('*'); 
	        $this->db->from('lead'); 
	        $this->db->where('user_id', $user_id);
	        
 $this->db->where('DATE(Date)<=',$curr_date);

	      $query = $this->db->get(); 
	            $result = $query->result_array(); 
	       
	        
	            return !empty($result)?$result:false; 
	    } 
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
	    
		public function view_lead($id){
		    	$user_id = $this->session->userdata('id');
			$this->db->where('id', $id);
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('contact_form_info');
		  return $query->result(); 
		}
			public function getleads1($id){
		    	$user_id = $this->session->userdata('id');
			$this->db->where('id', $id);
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('lead');
		  return $query->result(); 
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