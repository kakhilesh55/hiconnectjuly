<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Renewals_billing extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_Model');
        $this->load->model('Package_Model');
        $this->load->model('Manage_products_Model');
    }

  	public function index()
  	{
  		//$data['users'] = $this->User_Model->get_orders_by_user($this->session->userdata('user_id'));
		  $data['users'] = $this->User_Model->get_orders_by_user($this->session->userdata('user_id'));
		$data['title'] = 'User List';

    	$data['main'] = 'users/renewals_billing';
    	$this->load->view('layout/main_view',$data);
  	}
	  public function update_renewal()
	  {
		  $id=$this->input->post('eid');
		  $data = array('order_status' => 7,'refund_reason' =>$this->input->post('reason'));
			  $this->db->where('user_id', $id);
			  $res = $this->db->update('orders', $data);
			  $data['main'] = 'users/renewals_billing';
			  $this->load->view('layout/main_view',$data);
	  }
	  public function myproducts()
  	{
  		$data['users'] = $this->User_Model->get_my_products($this->session->userdata('user_id'));

  		$data['products'] = $this->Manage_products_Model->get_products();
		  
		$data['title'] = 'User List';

    	$data['main'] = 'users/myproducts';
    	$this->load->view('layout/main_view',$data);
  	}
}
		
	
?>