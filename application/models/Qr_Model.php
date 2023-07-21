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
		  public function getRows($category_id){ 
	        $this->db->select('*'); 
	        $this->db->from('manage_products'); 
	   
	     $this->db->join('order_detail', 'order_detail.productid = manage_products.id', 'inner');
	       $this->db->join('orders', 'orders.order_id = order_detail.orderid', 'inner');
	            $this->db->where('orders.user_id',$category_id); 
	            $query = $this->db->get(); 
	            $result = $query->result_array(); 
	       
	        return !empty($result)?$result:false; 
	    } 

	}