<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social_link extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Social_link_Model');
        $this->load->model('Social_Model');
    }

    public function index()
    {
    	redirect('social_link/social_links');
    }

    public function social_links($id = NULL)
	{
		$edit_id = $id;
	
			$data['title'] = 'Add Social Link';

			$this->form_validation->set_rules('social_link_type', 'Social Link Type', 'required');
			$this->form_validation->set_rules('link', 'Social Link', 'required');

			if($this->form_validation->run() === FALSE){
				$data['social_links'] = $this->Social_link_Model->get_social_links();
				$data['social_link_types'] = $this->Social_Model->get_social_link_types();
			//	$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				//$this->session->set_flashdata('item',$messge );

				$data['main'] = 'users/social_links';
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Social_link_Model->add_social_link();

				//Set Message
				$messge = array('message' => 'Social Link Added Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item', $messge);
				redirect('social_link/social_links');
			}
	
	/*	else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Social Link';

			$this->form_validation->set_rules('social_link_type', 'Social Link Type', 'required');
			$this->form_validation->set_rules('link', 'Social Link', 'required');

			if($this->form_validation->run() === FALSE){
				$data['social_links'] = $this->Social_link_Model->get_social_links();
				$data['social_link_types'] = $this->Social_Model->get_social_link_types();
				$result = $this->Social_link_Model->edit_social_link($id);
				$data['social_link'] = $result;
				$data['main'] = 'users/social_links';
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Social_link_Model->update_social_link($edit_id);

				//Set Message
				$messge = array('message' => 'Social Link Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('social_link/social_links');
			}
		}*/
	}

	public function delete_social_link($id)
    {
    	$this->Social_link_Model->delete_social_link($id);
    	$messge = array('message' => 'Social Link deleted successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
    	redirect('social_link/social_links');
    }

}
?>