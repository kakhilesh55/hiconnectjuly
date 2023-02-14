<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Achievements extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Achievements_Model');
    }

    public function index()
    {
    	redirect('achievements/achievements');
    }

    public function achievements($id = NULL)
	{
		$edit_id = $id;
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Achievements';

			$this->form_validation->set_rules('name', 'Achievements', 'required');

			if($this->form_validation->run() === FALSE){
				$data['achievements'] = $this->Achievements_Model->get_achievements();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'users/achievements';
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Achievements_Model->add_achievement();

				//Set Message
				$messge = array('message' => 'Achievements Added Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item', $messge);
				redirect('achievements/achievements');
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Achievements';

			$this->form_validation->set_rules('name', 'Achievements', 'required');

			if($this->form_validation->run() === FALSE){
				$data['achievements'] = $this->Achievements_Model->get_achievements();
				$result = $this->Achievements_Model->edit_achievement($id);
				$data['achievement'] = $result;
				$data['main'] = 'users/achievements';
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Achievements_Model->update_achievement($edit_id);

				//Set Message
				$messge = array('message' => 'Achievements Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('achievements/achievements');
			}
		}
	}

	public function delete_achievement($id)
    {
    	$this->Achievements_Model->delete_achievement($id);
    	$messge = array('message' => 'Achievements Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
    	redirect('achievements/achievements');
    }

}
?>