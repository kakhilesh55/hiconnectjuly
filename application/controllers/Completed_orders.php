<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Completed_orders extends CI_Controller {

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
  		$data['users'] = $this->User_Model->get_completed_orders();

		$data['title'] = 'User List';

    	$data['main'] = 'admin/completed_orders';
    	$this->load->view('layout/main_admin',$data);
  	}

 }
		
	
?>