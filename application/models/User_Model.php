<?php
	class User_Model extends CI_Model{
		
		public function login($user_id, $encrypt_password){
			
			$this->db->where('user_id', $user_id);
			$this->db->where('password', $encrypt_password);
			$this->db->where('status', 1);

			$result = $this->db->get('users');

			if ($result->num_rows() == 1) {
				return $result->row(0);
			}else{
				return false;
			}
		}

		public function get_qr_by_user($user_id){
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('qr_images');
			return $query->row();
		}
		public function add_user($data){
			$res = $this->db->insert('users', $data);
			return $this->db->insert_id();
		}

		public function update_user($id){
			$data = array('name' => $this->input->post('name'), 
						  'email' => $this->input->post('email'),
						  'phone' => $this->input->post('phone'),
						  'card_id' => $this->input->post('card_id'),
						  'type' => $this->input->post('type'),
						  'user_level' => $this->input->post('user_level'),
						  'added_by' => $this->session->userdata('id'),
						  'package' => $this->input->post('package')
						  );
			$this->db->where('id', $id);
			$res = $this->db->update('users', $data);
		}

		public function get_users(){
			$user_level = $this->session->userdata('user_level');
			$this->db->order_by('id');
			if($user_level==2)
			{
				$userid = $this->session->userdata('id');
				$this->db->where('added_by', $userid);
			}

			$query = $this->db->get('users');
			return $query->result_array();
		}

		public function edit_user($id){
			$this->db->where('id', $id);
			$query = $this->db->get('users');
			return $query->row();
		}

		public function delete_user($id){
			$this->db->where('id', $id);
        	return $this->db->delete('users');
		}

		public function active_user($id){
            $this->db->set('status', '1');
            $this->db->where('id', $id);
            return $this->db->update('users');
		}

		public function inactive_user($id){
			$this->db->set('status', '0');
            $this->db->where('id', $id);
            return $this->db->update('users');
		}


		public function editqr($user,$scan){
		
			$this->db->set('qr_text', $scan);
            $this->db->where('user_id', $user);
            return $this->db->update('qrg_images');
		}







		public function update_user_details($id,$data){
			$this->db->where('id', $id);
			$res = $this->db->update('users', $data);
			return $res;
		}

		// Check Username exists
		public function check_user_id_exists($user_id){
			$query = $this->db->get_where('users', array('user_id' => $user_id));
			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}

		// Check email exists
		public function check_email_exists($email){
			$query = $this->db->get_where('users', array('email' => $email));
			if(empty($query->row_array())){
				return true;
			}else{
				return false;
			}
		}

		public function get_active_users_count(){
			
			$this->db->where('status', 1);

			$query = $this->db->get('users');
			return $query->num_rows();
		}
		public function get_orders(){
			$month = date('m');
			$this->db->where('month(order_date)', $month);

			$query = $this->db->get('orders');
			return $query->num_rows();
		}

		public function get_views_count($user_id){
			
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('counter');
			$res = $query->row();
			return $res;
		}

		 //send verification email to user's email id
	    function sendEmail($to_email,$subject,$message)
	    {

	        $from_email = 'support@hiconnect.co.in'; //change this to yours
	        //configure email settings
	        $config['protocol'] = 'smtp';
	        $config['smtp_host'] = 'ssl://smtp.hostinger.com'; //smtp host name
	        $config['smtp_port'] = '465'; //smtp port number
	        $config['smtp_user'] = $from_email;
	        $config['smtp_pass'] = 'HiCon@234ct'; //$from_email password
	        $config['mailtype'] = 'html';
	        $config['charset'] = 'iso-8859-1';
	        $config['wordwrap'] = TRUE;
	        $config['newline'] = "\r\n"; //use double quotes
	        $this->email->initialize($config);
	        
	        //send mail
	        $this->email->from($from_email, 'HiConnect');
	        $this->email->to($to_email);
	        $this->email->subject($subject);
	        $this->email->message($message);
	        return $this->email->send();
	    }


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










	    public function get_free_accounts($from_date = '',$to_date = ''){
	    	$this->db->select('users.*,package.* ');
			$this->db->from('users');
			$this->db->join('package', 'package.package_id = users.package', 'left');
			$this->db->where('package.sale_price = ',0);
			if($from_date!='' && $to_date!=''){ 
				$this->db->where('register_date BETWEEN "'. date('Y-m-d', strtotime($from_date)). '" and "'. date('Y-m-d', strtotime($to_date)).'"');
				
			$query = $this->db->get();
			$result=$query->result_array();
			}
			else if($from_date!=''){ 
				$this->db->where('users.register_date >=', $from_date);
				$query = $this->db->get(); 
				$result = $query->result_array(); 
			}
			else if($to_date!=''){ 
				$this->db->where('users.register_date <=', $to_date);
				$query = $this->db->get(); 
				$result = $query->result_array(); 
			}
			else{ 
				$this->db->order_by('users.register_date','desc'); 
				$query = $this->db->get(); 
				$result = $query->result_array(); 
			} 
			return $result;
		}








		public function get_my_products($user){
	    
$sql="SELECT users.*, orders.*, order_detail.*,GROUP_CONCAT(manage_products.product_name  ORDER BY manage_products.product_name ASC SEPARATOR ', ')as product_name ,manage_products.image AS product_image, manage_products.short_description, manage_products.long_description, sum(price) as price FROM users LEFT JOIN orders ON orders.user_id = users.id LEFT JOIN coupon ON coupon.coupon_id = orders.coupon_id LEFT JOIN order_detail ON order_detail.orderid = orders.order_id LEFT JOIN manage_products ON order_detail.productid = manage_products.id WHERE manage_products.product_name != '' and users.id=222 GROUP BY orders.order_id order by orders.order_date DESC";
$query = $this->db->query($sql);
$result=$query->result_array();
			
			 
			return $result;
		}










public function get_pricing_accountsuser($from_date = '',$to_date = ''){
	    
			$uid=$this->session->userdata('user_id');
$sql="SELECT users.*, orders.*, order_detail.*,GROUP_CONCAT(manage_products.product_name  ORDER BY manage_products.product_name ASC SEPARATOR ', ')as product_name ,manage_products.image AS product_image, manage_products.short_description, manage_products.long_description, sum(price) as price FROM users LEFT JOIN orders ON orders.user_id = users.id LEFT JOIN coupon ON coupon.coupon_id = orders.coupon_id LEFT JOIN order_detail ON order_detail.orderid = orders.order_id LEFT JOIN manage_products ON order_detail.productid = manage_products.id WHERE manage_products.product_name != '' and  users.user_id='$uid' GROUP BY orders.order_id order by orders.order_date DESC ";
$query = $this->db->query($sql);
$result=$query->result_array();
			  
			 
			return $result;
		}













		public function get_pricing_accounts($from_date = '',$to_date = ''){
	    	/*$this->db->select('users.*,package.*,manage_products.product_name,manage_products.image AS product_image,manage_products.short_description,manage_products.long_description,IFNULL((package.sale_price + manage_products.sale_price),package.sale_price) AS total ');
			$this->db->from('users');
			$this->db->join('package', 'package.package_id = users.package', 'left');
			$this->db->join('manage_products', 'manage_products.id = users.product', 'left');
			$this->db->where('package.sale_price != ',0);*/
			//$this->db->select('users.*,orders.*,order_detail.*,GROUP_CONCAT(`manage_products`.`product_name`  ORDER BY `manage_products`.`product_name` ASC SEPARATOR ', ')as product_name,manage_products.image AS product_image,manage_products.short_description,manage_products.long_description,sum(price) as price ');
			//$this->db->from('users');
			//$this->db->join('orders', 'orders.user_id = users.id', 'left');
			//$this->db->join('coupon', 'coupon.coupon_id = orders.coupon_id', 'left');
			//$this->db->join('order_detail', 'order_detail.orderid = orders.order_id', 'left');
			//$this->db->join('package', 'package.package_id = order_detail.productid', 'left');
			//$this->db->join('manage_products', 'order_detail.productid = manage_products.id', 'left');
			//$this->db->where('manage_products.product_name !=""');
			//$this->db->group_by('orders.order_id');
$sql="SELECT users.*, orders.*, order_detail.*,GROUP_CONCAT(manage_products.product_name  ORDER BY manage_products.product_name ASC SEPARATOR ', ')as product_name ,manage_products.image AS product_image, manage_products.short_description, manage_products.long_description, sum(price) as price FROM users LEFT JOIN orders ON orders.user_id = users.id LEFT JOIN coupon ON coupon.coupon_id = orders.coupon_id LEFT JOIN order_detail ON order_detail.orderid = orders.order_id LEFT JOIN manage_products ON order_detail.productid = manage_products.id WHERE manage_products.product_name != '' GROUP BY orders.order_id order by orders.order_date DESC";
$query = $this->db->query($sql);
$result=$query->result_array();
			  if($from_date!='' && $to_date!=''){ 
			//	$this->db->where('orders.order_date BETWEEN "'. date('Y-m-d', strtotime($from_date)). '" and "'. date('Y-m-d', strtotime($to_date)).'"');
				$sql="SELECT users.*, orders.*, order_detail.*,GROUP_CONCAT(manage_products.product_name  ORDER BY manage_products.product_name ASC SEPARATOR ', ')as product_name ,manage_products.image AS product_image, manage_products.short_description, manage_products.long_description, sum(price) as price FROM users LEFT JOIN orders ON orders.user_id = users.id LEFT JOIN coupon ON coupon.coupon_id = orders.coupon_id LEFT JOIN order_detail ON order_detail.orderid = orders.order_id LEFT JOIN manage_products ON order_detail.productid = manage_products.id WHERE manage_products.product_name != '' and orders.order_date BETWEEN str_to_date('$from_date','%Y-%m-%d') AND str_to_date('$to_date','%Y-%m-%d')  GROUP BY orders.order_id ";

				$query = $this->db->query($sql);
			$result=$query->result_array();
			}
			else if($from_date!=''){ 
				$sql="SELECT users.*, orders.*, order_detail.*,GROUP_CONCAT(manage_products.product_name  ORDER BY manage_products.product_name ASC SEPARATOR ', ')as product_name ,manage_products.image AS product_image, manage_products.short_description, manage_products.long_description, sum(price) as price FROM users LEFT JOIN orders ON orders.user_id = users.id LEFT JOIN coupon ON coupon.coupon_id = orders.coupon_id LEFT JOIN order_detail ON order_detail.orderid = orders.order_id LEFT JOIN manage_products ON order_detail.productid = manage_products.id WHERE manage_products.product_name != '' and orders.order_date BETWEEN str_to_date('$from_date','%Y-%m-%d') AND str_to_date('$to_date','%Y-%m-%d')  GROUP BY orders.order_id";

				$query = $this->db->query($sql);
				$result = $query->result_array(); 
			}
			else if($to_date!=''){ 
				$sql="SELECT users.*, orders.*, order_detail.*,GROUP_CONCAT(manage_products.product_name  ORDER BY manage_products.product_name ASC SEPARATOR ', ')as product_name ,manage_products.image AS product_image, manage_products.short_description, manage_products.long_description, sum(price) as price FROM users LEFT JOIN orders ON orders.user_id = users.id LEFT JOIN coupon ON coupon.coupon_id = orders.coupon_id LEFT JOIN order_detail ON order_detail.orderid = orders.order_id LEFT JOIN manage_products ON order_detail.productid = manage_products.id WHERE manage_products.product_name != '' and orders.order_date BETWEEN str_to_date('$from_date','%Y-%m-%d') AND str_to_date('$to_date','%Y-%m-%d') GROUP BY orders.order_id";
				$query = $this->db->query($sql);
				$result = $query->result_array(); 
			}
			 
			return $result;
		}
		public function get_pricing_accounts_plan($from_date = '',$to_date = ''){
	    	/*$this->db->select('users.*,package.*,manage_products.product_name,manage_products.image AS product_image,manage_products.short_description,manage_products.long_description,IFNULL((package.sale_price + manage_products.sale_price),package.sale_price) AS total ');
			$this->db->from('users');
			$this->db->join('package', 'package.package_id = users.package', 'left');
			$this->db->join('manage_products', 'manage_products.id = users.product', 'left');
			$this->db->where('package.sale_price != ',0);*/
			$this->db->select('package.package_id,package.package as pk,users.*,orders.*,order_detail.*');
			$this->db->from('users');
			$this->db->join('orders', 'orders.user_id = users.id', 'left');
			$this->db->join('coupon', 'coupon.coupon_id = orders.coupon_id', 'left');
			$this->db->join('order_detail', 'order_detail.orderid = orders.order_id', 'left');
			$this->db->join('package', 'package.package_id = order_detail.productid', 'left');
			//$this->db->join('manage_products', 'order_detail.productid = manage_products.id', 'left');
			$this->db->where('package.package !=""');
			if($from_date!='' && $to_date!=''){ 
				$this->db->where('orders.order_date BETWEEN "'. date('Y-m-d', strtotime($from_date)). '" and "'. date('Y-m-d', strtotime($to_date)).'"');
				
			$query = $this->db->get();
			$result=$query->result_array();
			}
			else if($from_date!=''){ 
				$this->db->where('orders.order_date>=', $from_date);
				$query = $this->db->get(); 
				$result = $query->result_array(); 
			}
			else if($to_date!=''){ 
				$this->db->where('orders.order_date <=', $to_date);
				$query = $this->db->get(); 
				$result = $query->result_array(); 
			}
			else{ 
				$this->db->order_by('orders.order_date','desc'); 
				$query = $this->db->get(); 
				$result = $query->result_array(); 
			} 
		
			return $result;
		}

		public function edit_pricing_accounts($id){
			/*$this->db->select('users.*,package.*,orders.*,order_detail.*,manage_products.product_name,manage_products.image AS product_image,manage_products.short_description,manage_products.long_description,IFNULL((package.sale_price + manage_products.sale_price),package.sale_price) AS total ');
			$this->db->from('users');
			$this->db->join('orders', 'orders.user_id = users.id', 'left');
			$this->db->join('order_detail', 'order_detail.orderid = orders.order_id', 'left');
			$this->db->join('package', 'package.package_id = order_detail.productid', 'left');
			$this->db->join('manage_products', 'order_detail.productid = users.product', 'left');
			$this->db->where('package.sale_price != ',0);
			$this->db->where('users.id', $id);*/
			$this->db->select('package.package_id,package.package as pk,users.*,orders.*,order_detail.*,manage_products.product_name,manage_products.image AS product_image,manage_products.short_description,manage_products.long_description ');
			$this->db->from('users');
			$this->db->join('orders', 'orders.user_id = users.id', 'left');
			$this->db->join('coupon', 'coupon.coupon_id = orders.coupon_id', 'left');
			$this->db->join('order_detail', 'order_detail.orderid = orders.order_id', 'left');
			$this->db->join('package', 'package.package_id = order_detail.productid', 'left');
			$this->db->join('manage_products', 'order_detail.productid = manage_products.id', 'left');
			//$this->db->where('package.sale_price != ',0);
			$this->db->where('users.id', $id);
			$query = $this->db->get();
			
			return $query->result_array();
		} 
	

		public function edit_pricing_ac_plan($id){
			/*$this->db->select('users.*,package.*,orders.*,order_detail.*,manage_products.product_name,manage_products.image AS product_image,manage_products.short_description,manage_products.long_description,IFNULL((package.sale_price + manage_products.sale_price),package.sale_price) AS total ');
			$this->db->from('users');
			$this->db->join('orders', 'orders.user_id = users.id', 'left');
			$this->db->join('order_detail', 'order_detail.orderid = orders.order_id', 'left');
			$this->db->join('package', 'package.package_id = order_detail.productid', 'left');
			$this->db->join('manage_products', 'order_detail.productid = users.product', 'left');
			$this->db->where('package.sale_price != ',0);
			$this->db->where('users.id', $id);*/
			$this->db->select('package.package_id,package.package as pk,users.*,orders.*,order_detail.*');
			$this->db->from('users');
			$this->db->join('orders', 'orders.user_id = users.id', 'left');
			$this->db->join('coupon', 'coupon.coupon_id = orders.coupon_id', 'left');
			$this->db->join('order_detail', 'order_detail.orderid = orders.order_id', 'left');
			$this->db->join('package', 'package.package_id = order_detail.productid', 'left');
			//$this->db->join('manage_products', 'order_detail.productid = manage_products.id', 'left');
			$this->db->where('package.package !=""');
			//$this->db->where('package.sale_price != ',0);
			$this->db->where('users.id', $id);
			$query = $this->db->get();
			
			return $query->result_array();
		} 

		public function edit_pricing_ac_product($id){
			/*$this->db->select('users.*,package.*,orders.*,order_detail.*,manage_products.product_name,manage_products.image AS product_image,manage_products.short_description,manage_products.long_description,IFNULL((package.sale_price + manage_products.sale_price),package.sale_price) AS total ');
			$this->db->from('users');
			$this->db->join('orders', 'orders.user_id = users.id', 'left');
			$this->db->join('order_detail', 'order_detail.orderid = orders.order_id', 'left');
			$this->db->join('package', 'package.package_id = order_detail.productid', 'left');
			$this->db->join('manage_products', 'order_detail.productid = users.product', 'left');
			$this->db->where('package.sale_price != ',0);
			$this->db->where('users.id', $id);*/
			$this->db->select('users.*,orders.*,order_detail.*,manage_products.product_name,manage_products.image AS product_image,manage_products.short_description,manage_products.long_description ');
			$this->db->from('users');
			$this->db->join('orders', 'orders.user_id = users.id', 'left');
			$this->db->join('coupon', 'coupon.coupon_id = orders.coupon_id', 'left');
			$this->db->join('order_detail', 'order_detail.orderid = orders.order_id', 'left');
			//$this->db->join('package', 'package.package_id = order_detail.productid', 'left');
			$this->db->join('manage_products', 'order_detail.productid = manage_products.id', 'left');
			$this->db->where('manage_products.product_name !=""');
			//$this->db->where('package.sale_price != ',0);
			$this->db->where('users.id', $id);
			$query = $this->db->get();
			
			return $query->result_array();
		} 
















		public function edit_pricing_account($id){
			/*$this->db->select('users.*,package.*,orders.*,order_detail.*,manage_products.product_name,manage_products.image AS product_image,manage_products.short_description,manage_products.long_description,IFNULL((package.sale_price + manage_products.sale_price),package.sale_price) AS total ');
			$this->db->from('users');
			$this->db->join('orders', 'orders.user_id = users.id', 'left');
			$this->db->join('order_detail', 'order_detail.orderid = orders.order_id', 'left');
			$this->db->join('package', 'package.package_id = order_detail.productid', 'left');
			$this->db->join('manage_products', 'order_detail.productid = users.product', 'left');
			$this->db->where('package.sale_price != ',0);
			$this->db->where('users.id', $id);*/
			$this->db->select('package.package_id,package.package as pk,users.*,orders.*,order_detail.*,manage_products.product_name,manage_products.image AS product_image,manage_products.short_description,manage_products.long_description ');
			$this->db->from('users');
			$this->db->join('orders', 'orders.user_id = users.id', 'left');
			$this->db->join('coupon', 'coupon.coupon_id = orders.coupon_id', 'left');
			$this->db->join('order_detail', 'order_detail.orderid = orders.order_id', 'left');
			$this->db->join('package', 'package.package_id = order_detail.productid', 'left');
			$this->db->join('manage_products', 'order_detail.productid = manage_products.id', 'left');
			//$this->db->where('package.sale_price != ',0);
			$this->db->where('users.id', $id);
			$query = $this->db->get();
			
			return $query->row();
		} 
		public function update_product_status($id){
			$data = array('order_status' => $this->input->post('product_status') );
			$this->db->where('id', $id);
			$res = $this->db->update('users', $data);
			$data1 = array('order_status' => $this->input->post('product_status') );
			$this->db->where('user_id', $id);
			$res = $this->db->update('orders', $data1);
		}

		public function get_completed_orders(){
	    	/*$this->db->select('users.*,package.*,manage_products.product_name,manage_products.image AS product_image,manage_products.short_description,manage_products.long_description,IFNULL((package.sale_price + manage_products.sale_price),package.sale_price) AS total ');
			$this->db->from('users');
			$this->db->join('package', 'package.package_id = users.package', 'left');
			$this->db->join('manage_products', 'manage_products.id = users.product', 'left');
			$this->db->where('package.sale_price != ',0);*/
			//$this->db->select('users.*,orders.*,order_detail.*,GROUP_CONCAT(`manage_products`.`product_name`  ORDER BY `manage_products`.`product_name` ASC SEPARATOR ', ')as product_name,manage_products.image AS product_image,manage_products.short_description,manage_products.long_description,sum(price) as price ');
			//$this->db->from('users');
			//$this->db->join('orders', 'orders.user_id = users.id', 'left');
			//$this->db->join('coupon', 'coupon.coupon_id = orders.coupon_id', 'left');
			//$this->db->join('order_detail', 'order_detail.orderid = orders.order_id', 'left');
			//$this->db->join('package', 'package.package_id = order_detail.productid', 'left');
			//$this->db->join('manage_products', 'order_detail.productid = manage_products.id', 'left');
			//$this->db->where('manage_products.product_name !=""');
			//$this->db->group_by('orders.order_id');
$sql="SELECT users.*, orders.*, order_detail.*,GROUP_CONCAT(manage_products.product_name  ORDER BY manage_products.product_name ASC SEPARATOR ', ')as product_name ,manage_products.image AS product_image, manage_products.short_description, manage_products.long_description, sum(price) as price FROM users LEFT JOIN orders ON orders.user_id = users.id LEFT JOIN coupon ON coupon.coupon_id = orders.coupon_id LEFT JOIN order_detail ON order_detail.orderid = orders.order_id LEFT JOIN manage_products ON order_detail.productid = manage_products.id WHERE manage_products.product_name != '' and  orders.order_status=8 GROUP BY orders.order_id order by orders.order_date DESC";
$query = $this->db->query($sql);
$result=$query->result_array();
			  if($from_date!='' && $to_date!=''){ 
			//	$this->db->where('orders.order_date BETWEEN "'. date('Y-m-d', strtotime($from_date)). '" and "'. date('Y-m-d', strtotime($to_date)).'"');
				$sql="SELECT users.*, orders.*, order_detail.*,GROUP_CONCAT(manage_products.product_name  ORDER BY manage_products.product_name ASC SEPARATOR ', ')as product_name ,manage_products.image AS product_image, manage_products.short_description, manage_products.long_description, sum(price) as price FROM users LEFT JOIN orders ON orders.user_id = users.id LEFT JOIN coupon ON coupon.coupon_id = orders.coupon_id LEFT JOIN order_detail ON order_detail.orderid = orders.order_id LEFT JOIN manage_products ON order_detail.productid = manage_products.id WHERE manage_products.product_name != '' and  orders.order_status=8 and orders.order_date BETWEEN str_to_date('$from_date','%Y-%m-%d') AND str_to_date('$to_date','%Y-%m-%d')  GROUP BY orders.order_id ";

				$query = $this->db->query($sql);
			$result=$query->result_array();
			}
			else if($from_date!=''){ 
				$sql="SELECT users.*, orders.*, order_detail.*,GROUP_CONCAT(manage_products.product_name  ORDER BY manage_products.product_name ASC SEPARATOR ', ')as product_name ,manage_products.image AS product_image, manage_products.short_description, manage_products.long_description, sum(price) as price FROM users LEFT JOIN orders ON orders.user_id = users.id LEFT JOIN coupon ON coupon.coupon_id = orders.coupon_id LEFT JOIN order_detail ON order_detail.orderid = orders.order_id LEFT JOIN manage_products ON order_detail.productid = manage_products.id WHERE manage_products.product_name != '' and  orders.order_status=8 and orders.order_date BETWEEN str_to_date('$from_date','%Y-%m-%d') AND str_to_date('$to_date','%Y-%m-%d')  GROUP BY orders.order_id";

				$query = $this->db->query($sql);
				$result = $query->result_array(); 
			}
			else if($to_date!=''){ 
				$sql="SELECT users.*, orders.*, order_detail.*,GROUP_CONCAT(manage_products.product_name  ORDER BY manage_products.product_name ASC SEPARATOR ', ')as product_name ,manage_products.image AS product_image, manage_products.short_description, manage_products.long_description, sum(price) as price FROM users LEFT JOIN orders ON orders.user_id = users.id LEFT JOIN coupon ON coupon.coupon_id = orders.coupon_id LEFT JOIN order_detail ON order_detail.orderid = orders.order_id LEFT JOIN manage_products ON order_detail.productid = manage_products.id WHERE manage_products.product_name != '' and  orders.order_status=8 and orders.order_date BETWEEN str_to_date('$from_date','%Y-%m-%d') AND str_to_date('$to_date','%Y-%m-%d') GROUP BY orders.order_id";
				$query = $this->db->query($sql);
				$result = $query->result_array(); 
			}
			 
			return $result;
		}

		public function get_orders_by_user($user_id)
		{
			$this->db->select('package.package_id,package.package as pk,users.*,orders.*,order_detail.*');
			$this->db->from('users');
			$this->db->join('orders', 'orders.user_id = users.id', 'left');
			$this->db->join('coupon', 'coupon.coupon_id = orders.coupon_id', 'left');
			$this->db->join('order_detail', 'order_detail.orderid = orders.order_id', 'left');
			$this->db->join('package', 'package.package_id = order_detail.productid', 'left');
			//$this->db->join('manage_products', 'order_detail.productid = manage_products.id', 'left');
			$this->db->where('package.package !=""');
			//$this->db->where('package.sale_price != ',0);
			$this->db->where('users.user_id', $user_id);
			$query = $this->db->get();
			return $query->result_array();
		}
	public function get_us($user_id)
		{
			$this->db->select('*');
			$this->db->from('users');
		
			$this->db->where('users.id', $user_id);
			$query = $this->db->get();
			return $query->result_array();
		}
		public function add_to_order($data)
		{
			$res = $this->db->insert('orders', $data);
			return $this->db->insert_id();
		}

		public function update_invoice_link($order_id,$inv_link)
		{
			$data = array('invoice_link' => $inv_link );
			$this->db->where('order_id', $order_id);
			$res = $this->db->update('orders', $data);
		}
		public function update_invoice_link1($order_id,$inv_link)
		{
			$data = array('invoice_link_product' => $inv_link );
			$this->db->where('order_id', $order_id);
			$res = $this->db->update('orders', $data);
		}
		public function up_user($user_id,$data1)
		{
			//$data = array('login_ip' => $inv_link );
			$this->db->where('user_id', $user_id);
			$res = $this->db->update('users', $data1);
		}
		public function get_invoice_details($user_id){
	    	$this->db->select('users.*,orders.* ');
			$this->db->from('users');
			$this->db->join('orders', 'orders.user_id = users.id', 'left');
			//$this->db->where('orders.status = ',1);
			$this->db->where('users.id', $user_id);
			$query = $this->db->get();
			return $query->row();
		}

		public function get_orders_user($user_id)
		{
			$this->db->where('user_id', $user_id);
			$query = $this->db->get('orders');
			return $query->result_array();
		}

		public function update_order_status($id){
			$data = array('status' => 0);
			$this->db->where('order_id', $id);
			$res = $this->db->update('orders', $data);
		}
		public function fetch_chart_data($year)
 {
$this->db->select('Day(order_date) as month, COUNT(*) as profit');
  $this->db->where('Month(order_date)', $year);
  $this->db->group_by('DATE(order_date)');
  return $this->db->get('orders');
 }
 public function fetch_chart_dataa($yearr)
 {
$this->db->select('Day(register_date) as month, COUNT(*) as profit');
  $this->db->where('Month(register_date)', $yearr);
  $this->db->group_by('DATE(register_date)');
  return $this->db->get('users');
 }
 public function fetch_chart_dataa1($yearr)
 {
      $user=$this->session->userdata('id');
$this->db->select('Day(date) as month, COUNT(*) as profit');
  $this->db->where('Month(date)', $yearr);
  $this->db->where('user_id', $user);
  $this->db->group_by('DATE(date)');
  return $this->db->get('lead');
 }
	}