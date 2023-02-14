<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Experiences extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Experience_Model');
    }

    public function index()
    {
    	redirect('experiences/experiences');
    }

    public function experiences($id = NULL)
	{
		$edit_id = $id;
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Experience';

			$this->form_validation->set_rules('company', 'Company', 'required');
			$this->form_validation->set_rules('position', 'Position', 'required');

			if($this->form_validation->run() === FALSE){
				$data['experiences'] = $this->Experience_Model->get_experiences();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'users/experience';
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Experience_Model->add_experience();

				//Set Message
				$messge = array('message' => 'Experience Added Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item', $messge);
				redirect('experiences/experiences');
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Experience';

			$this->form_validation->set_rules('company', 'Company', 'required');
			$this->form_validation->set_rules('position', 'Position', 'required');

			if($this->form_validation->run() === FALSE){
				$data['experiences'] = $this->Experience_Model->get_experiences();
				$result = $this->Experience_Model->edit_experience($id);
				$data['experience'] = $result;
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$data['main'] = 'users/experience';
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Experience_Model->update_experience($edit_id);

				//Set Message
				$messge = array('message' => 'Experience Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('experiences/experiences');
			}
		}
	}

	public function delete_experience($id)
    {
    	$this->Experience_Model->delete_experience($id);
    	$messge = array('message' => 'Experience Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
    	redirect('experiences/experiences');
    }

}
?>