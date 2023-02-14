<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Coupon extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Coupon_Model');
    }

    public function index()
    {
    	redirect('coupon/coupons');
    }

    public function coupons($id = NULL)
	{
		$edit_id = $id;
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Coupon';

			$this->form_validation->set_rules('coupon_name', 'Coupon Name', 'required');
			$this->form_validation->set_rules('percentage', 'Percentage', 'required');
			$this->form_validation->set_rules('start_date', 'From Date', 'required');
			$this->form_validation->set_rules('end_date', 'To Date', 'required');

			if($this->form_validation->run() === FALSE){
				$data['coupons'] = $this->Coupon_Model->get_coupons();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'admin/coupon_management';
				$this->load->view('layout/main_admin',$data);
			}else{
				$this->form_validation->set_rules('coupon_name', 'Coupon Code', 'is_unique[coupon.coupon_name]');
				if($this->form_validation->run() === FALSE)
				{
					$messge = array('message' => 'Coupon Code already exists.','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
					$data['coupons'] = $this->Coupon_Model->get_coupons();
					$data['main'] = 'admin/coupon_management';
					$this->load->view('layout/main_admin',$data);
				}
				else
				{
					$this->Coupon_Model->add_coupon();

					//Set Message
					$messge = array('message' => 'Coupon Added Successfully','class' => 'alert alert-success align-center');
					$this->session->set_flashdata('item', $messge);
					redirect('coupon/coupons');
				}
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Coupon';

			$this->form_validation->set_rules('coupon_name', 'Coupon Code', 'required');
			$this->form_validation->set_rules('percentage', 'Percentage', 'required');
			$this->form_validation->set_rules('start_date', 'From Date', 'required');
			$this->form_validation->set_rules('end_date', 'To Date', 'required');

			if($this->form_validation->run() === FALSE){
				$data['coupons'] = $this->Coupon_Model->get_coupons();
				$result = $this->Coupon_Model->edit_coupon($id);
				$data['coupon'] = $result;
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$data['main'] = 'admin/coupon_management';
				$this->load->view('layout/main_admin',$data);
			}else{
				$this->form_validation->set_rules('coupon_name', 'Coupon Code', 'is_unique[coupon.coupon_name]');
				if($this->form_validation->run() === FALSE)
				{
					$messge = array('message' => 'Coupon Code already exists.','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
					$data['coupons'] = $this->Coupon_Model->get_coupons();
					$result = $this->Coupon_Model->edit_coupon($id);
					$data['coupon'] = $result;
					$data['main'] = 'admin/coupon_management';
					$this->load->view('layout/main_admin',$data);
				}
				else
				{
					$this->Coupon_Model->update_coupon($edit_id);

					//Set Message
					$messge = array('message' => 'Coupon Updated Successfully','class' => 'alert alert-success align-center');
					$this->session->set_flashdata('item',$messge );
					redirect('coupon/coupons');
				}
			}
		}
	}

	public function delete_coupon($id)
    {
    	$this->Coupon_Model->delete_coupon($id);
    	$messge = array('message' => 'Coupon Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
    	redirect('coupon/coupons');
    }



public function edit_cp()
{
	$this->load->model('Coupon_Model');
	$coupon_percentage = $this->Coupon_Model->edit_coupon($coupon);
	//$coupon_percent = $coupon_percentage->percentage;
	//$coupon_amount = ($total*$coupon_percent)/100;
}
}
?>