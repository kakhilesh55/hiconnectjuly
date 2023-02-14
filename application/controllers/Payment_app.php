<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Payment_app extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Payment_app_Model');
    }

    public function index()
    {
    	redirect('payment_app/applications');
    }

    public function applications($id = NULL)
	{
		$edit_id = $id;
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Payment App';

			$this->form_validation->set_rules('payment_type', 'Payment Type', 'required');
			$this->form_validation->set_rules('app_name', 'App Name ', 'required');

			if($this->form_validation->run() === FALSE){
				$data['payment_apps'] = $this->Payment_app_Model->get_payment_apps();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );

				$data['main'] = 'admin/payment_app';
				$this->load->view('layout/main_admin',$data);
			}else{
				$this->Payment_app_Model->add_payment_app();

				//Set Message
				$messge = array('message' => 'Payment App Added Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item', $messge);
				redirect('payment_app/applications');
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Payment App';

			$this->form_validation->set_rules('payment_type', 'Payment Type', 'required');
			$this->form_validation->set_rules('app_name', 'App Name ', 'required');

			if($this->form_validation->run() === FALSE){
				$data['payment_apps'] = $this->Payment_app_Model->get_payment_apps();
				$result = $this->Payment_app_Model->edit_payment_app($id);
				$data['payment_app'] = $result;
				$data['main'] = 'admin/payment_app';
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$this->load->view('layout/main_admin',$data);
			}else{
				$this->Payment_app_Model->update_payment_app($edit_id);

				//Set Message
				$messge = array('message' => 'Payment App Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('payment_app/applications');
			}
		}
	}

	public function delete_payment_app($id)
    {
    	$this->Payment_app_Model->delete_payment_app($id);
    	$messge = array('message' => 'Payment App deleted successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
    	redirect('payment_app/applications');
    }

}
?>