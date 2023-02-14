<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Education extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Education_Model');
    }

    public function index()
    {
    	redirect('education/education_details');
    }

    public function education_details($id = NULL)
	{
		$edit_id = $id;
		$messge = array('message' => '','class' => '');
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Education';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('university', 'University/College', 'required');

			if($this->form_validation->run() === FALSE){
				$data['educations'] = $this->Education_Model->get_educations();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'users/education';
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Education_Model->add_education();

				//Set Message
				$messge = array('message' => 'Education Added Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item', $messge);
				redirect('education/education_details');
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Education';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('university', 'University/College', 'required');

			if($this->form_validation->run() === FALSE){
				$data['educations'] = $this->Education_Model->get_educations();
				$result = $this->Education_Model->edit_education($id);
				$data['education'] = $result;
				$data['main'] = 'users/education';
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$this->load->view('layout/main_view',$data);


			}else{
				$this->Education_Model->update_education($edit_id);

				//Set Message
				$messge = array('message' => 'Education Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('education/education_details');
			}
		}
	}


	public function delete_education($id)
    {
    	$this->Education_Model->delete_education($id);
    	$messge = array('message' => 'Education Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
    	redirect('education/education_details');
    }

}
?>