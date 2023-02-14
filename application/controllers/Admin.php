<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_Model');
        $this->load->model('Package_Model');
    }

	public function dashboard()
    {
    	$result = $this->User_Model->get_users();
		$data['user_count'] = count($result);

		$result_active = $this->User_Model->get_active_users_count();
		$data['active_user_count'] = $result_active;

		$orders = $this->User_Model->get_orders();
		$data['orders'] = $orders;


        $data['main'] = 'dashboard_admin';
        $this->load->view('layout/main_admin',$data);
    }

	public function user($id = NULL)
	{
		$edit_id = $id;
		$messge = array('message' => '','class' => '');
		validation_errors('');
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Create New User';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
			$this->form_validation->set_rules('phone', 'Phone', 'required');
			$this->form_validation->set_rules('user_id', 'User ID', 'required');
			$this->form_validation->set_rules('password', 'Password', 'required');
			$this->form_validation->set_rules('type', 'Type', 'required');
			$this->form_validation->set_rules('user_level', 'User Level', 'required');
			$this->form_validation->set_rules('package', 'Package', 'required');

			if($this->form_validation->run() === FALSE){
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['packages'] = $this->Package_Model->get_packages();
				$data['main'] = 'user/user';
				$this->load->view('layout/main_admin',$data);
			}else{
				$this->form_validation->set_rules('user_id', 'User ID', 'is_unique[users.user_id]');
				$this->form_validation->set_rules('email', 'Email', 'is_unique[users.email]');
				$this->form_validation->set_rules('card_id', 'Card ID', 'is_unique[users.card_id]');
				if($this->form_validation->run() === FALSE)
				{
					$messge = array('message' => 'User ID or Email already exists.','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
					$data['packages'] = $this->Package_Model->get_packages();
					$data['main'] = 'user/user';
					$this->load->view('layout/main_admin',$data);
				}
				else
				{
					//Encrypt Password
					$encrypt_password = md5($this->input->post('password'));
					$data['name'] = $this->input->post('name'); 
					$data['email'] = $this->input->post('email');
					$data['phone'] = $this->input->post('phone');
					$data['user_id'] = $this->input->post('user_id');
					$data['password'] = $encrypt_password;
					$data['card_id'] = $this->input->post('card_id');
					$data['type'] = $this->input->post('type');
					$data['user_level'] = $this->input->post('user_level');
					$data['register_date'] = date('Y-m-d');
					$data['added_by'] = $this->session->userdata('id');
					$data['package'] = $this->input->post('package');

					            // insert form data into database
		            if ($this->User_Model->add_user($data))
		            {
		            	$to_email = $this->input->post('email');
				    	$name = $this->input->post('name');
				    	$user_id = $this->input->post('user_id');
				    	$password = $this->input->post('password');
				    	$types = $this->input->post('type');
				    	if($types==1)
				    		$type = 'Personal';
				    	else
				    		$type = 'Business';

				    	$level = $this->input->post('user_level');
				    	if($level == 1) 
				    		$user_level = 'Admin';
				    	else if($level == 2)
				    		$user_level = 'Manager';
				    	else if($level == 3)
				    		$user_level = 'User';

				    	$subject = 'Login Details';
	        			$message = 'Dear '.$name.',<br /><br />You have created as a new '.$user_level.' and the type is '.$type.'. <br /><br /> You have to Login and add your details using the following credentials. <br/><br/> Login details. <br /><br />  https://card.weblyconnect.com/erp/ <br /> User ID: ' . $user_id . '<br /> Password: ' . $password . '<br /><br />Thanks<br />Digital Card';

		                // send email
		               if ($this->User_Model->sendEmail($to_email,$subject,$message))
		                {
		                    // successfully sent mail
		                    $messge = array('message' => 'New User Created','class' => 'alert alert-success align-center');
							$this->session->set_flashdata('item',$messge );
							redirect('admin/user_list');
						
		                }
		                else
		                {
		                    // error
		                     $messge = array('message' => 'Cannot Send Email','class' => 'alert alert-danger align-center');
							$this->session->set_flashdata('item',$messge );
		                    redirect('admin/user');
		                }
		                redirect('admin/user');
		            }
		            else
		            {
		                // error
		                $messge = array('message' => 'Oops! Error. Please try again later!!!','class' => 'alert alert-danger align-center');
							$this->session->set_flashdata('item',$messge );
		                    redirect('admin/user');
		            }



				}
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update User';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email', 'required');
			$this->form_validation->set_rules('phone', 'Phone', 'required');
			$this->form_validation->set_rules('type', 'Type', 'required');
			$this->form_validation->set_rules('user_level', 'User Level', 'required');
			$this->form_validation->set_rules('package', 'Package', 'required');

			if($this->form_validation->run() === FALSE){
				$result = $this->User_Model->edit_user($id);
				$data['user_details'] = $result;
				$data['packages'] = $this->Package_Model->get_packages();
				$data['main'] = 'user/user';
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$this->load->view('layout/main_admin',$data);
			}else{
				/*if($this->form_validation->set_rules('user_id', 'User ID', 'callback_check_user_id_exists'))
				{
					$messge = array('message' => 'User ID already exists.','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
					$data['main'] = 'user/user';
					$this->load->view('layout/main_admin',$data);
				}
				else if ($this->form_validation->set_rules('email', 'Email', 'callback_check_email_exists'))
				{
					$messge = array('message' => 'Email already exists.','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
					$data['main'] = 'user/user';
					$this->load->view('layout/main_admin',$data);
				}
				else
				{*/
				$this->User_Model->update_user($edit_id);
				//Set Message
				$messge = array('message' => 'User Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('admin/user_list');
				//}
			}
		}
			
	}	
  	public function user_list()
  	{
  		$data['users'] = $this->User_Model->get_users();

		$data['added_by'] = $this->User_Model->get_users();

		$data['title'] = 'User List';

    	$data['main'] = 'user/user_list';
    	$this->load->view('layout/main_admin',$data);
  	}

	public function delete_user($id)
    {
		$this->User_Model->delete_user($id);
		$messge = array('message' => 'User deleted successfully','class' => 'alert alert-danger align-center');
   		$this->session->set_flashdata('item',$messge );
    	redirect('admin/user_list');
    }

    public function active_user($id)
    {
    	$this->User_Model->active_user($id);
		$messge = array('message' => 'User Activated successfully','class' => 'alert alert-success align-center');
    	$this->session->set_flashdata('item',$messge );
    	redirect('admin/user_list');
    }

    public function inactive_user($id)
    {
		$this->User_Model->inactive_user($id);
		$messge = array('message' => 'User Deactivated successfully','class' => 'alert alert-success align-center');
    	$this->session->set_flashdata('item',$messge );
    	redirect('admin/user_list');
    }

 	// Check Email exists
		public function check_email_exists($email){
			$this->form_validation->set_message('check_email_exists', 'This email is already registered.');

			if ($this->User_Model->check_email_exists($email)) {
				return true;
			}else{
				return false;
			}
		}   

		// Check User id exists
		public function check_user_id_exists($user_id){
			$this->form_validation->set_message('check_user_id_exists', 'This user id is already exist.');

			if ($this->User_Model->check_user_id_exists($user_id)) {
				return true;
			}else{
				return false;
			}
		}  

}
	
?>