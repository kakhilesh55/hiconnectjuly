<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Services extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Service_Model');
    }

    public function index()
    {
    	redirect('services/services');
    }

    public function services($id = NULL)
	{
		$edit_id = $id;
		$messge = array('message' => '','class' => '');
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Service';

			$this->form_validation->set_rules('service', 'Service', 'required');

			if($this->form_validation->run() === FALSE){
				$data['services'] = $this->Service_Model->get_services();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'users/services';
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Service_Model->add_service();

				//Set Message
				$messge = array('message' => 'Service Added successfully.','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('services/services');
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Service';

			$this->form_validation->set_rules('service', 'Service', 'required');

			if($this->form_validation->run() === FALSE){
				$data['services'] = $this->Service_Model->get_services();
				$result = $this->Service_Model->edit_service($id);
				$data['service'] = $result;
				$data['main'] = 'users/services';
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Service_Model->update_service($edit_id);

				//Set Message
				$messge = array('message' => 'Service Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('services/services');
			}
		}
	}

	public function delete_service($id)
    {
    	$this->Service_Model->delete_service($id);
    	$messge = array('message' => 'Service Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
    	redirect('services/services');
    }

}
?>