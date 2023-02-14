<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Package extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Package_Model');
    }

    public function index()
    {
    	redirect('package/packages');
    }

    public function packages($id = NULL)
	{
		$edit_id = $id;
		validation_errors('');
		$messge = array('message' => '','class' => '');
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Package';

			$this->form_validation->set_rules('package', 'Package', 'required');

			if($this->form_validation->run() === FALSE){
				$data['packages'] = $this->Package_Model->get_packages();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'admin/packages';
				$this->load->view('layout/main_admin',$data);
			}else{
				$this->Package_Model->add_package();

				//Set Message
				$messge = array('message' => 'New package Added','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('package/packages');
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update package';

			$this->form_validation->set_rules('package', 'package', 'required');

			if($this->form_validation->run() === FALSE){
				$data['packages'] = $this->Package_Model->get_packages();
				$result = $this->Package_Model->edit_package($id);
				$data['package'] = $result;
				$data['main'] = 'admin/packages';
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$this->load->view('layout/main_admin',$data);
			}else{
				$this->Package_Model->update_package($edit_id);

				//Set Message
				$messge = array('message' => 'Package Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('package/packages');
			}
		}
	}

	public function delete_package($id)
    {
    	$this->Package_Model->delete_package($id);
    	$messge = array('message' => 'Package Deleted.','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge);
    	redirect('package/packages');
    }


}
?>