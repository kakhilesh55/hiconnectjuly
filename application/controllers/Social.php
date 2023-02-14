<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Social extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Social_Model');
    }

    public function index()
    {
    	redirect('social/social_links_type');
    }

    public function social_links_type($id = NULL)
	{
		$edit_id = $id;
		validation_errors('');
		$messge = array('message' => '','class' => '');
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Social Media Types';

			$this->form_validation->set_rules('social', 'Social Media Type', 'required');
			$this->form_validation->set_rules('social_class', 'Social Class', 'required');

			if($this->form_validation->run() === FALSE){
				$data['socail_medias'] = $this->Social_Model->get_social_link_types();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'admin/social_links';
				$this->load->view('layout/main_admin',$data);
			}else{
				if(!empty($this->Social_Model->check_social_link_type($this->input->post('social'))))
				{
					$messge = array('message' => 'Social Media type already exist.','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				else
				{
					$this->Social_Model->add_social_link_type();

					//Set Message
					$messge = array('message' => 'Social Media Type Created successfully.','class' => 'alert alert-success align-center');
					$this->session->set_flashdata('item',$messge );
				}
				redirect('social/social_links_type');
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Social Media Types';

			$this->form_validation->set_rules('social', 'Social Media Type', 'required');
			$this->form_validation->set_rules('social_class', 'Social Class', 'required');

			if($this->form_validation->run() === FALSE){
				$data['socail_medias'] = $this->Social_Model->get_social_link_types();
				$result = $this->Social_Model->edit_social_link_type($id);
				$data['social_media'] = $result;
				$data['main'] = 'admin/social_links';
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$this->load->view('layout/main_admin',$data);
			}else{
				$check_exist = $this->Social_Model->check_social_link_type($this->input->post('social'));
				if(!empty($check_exist))
				{
					if($check_exist->social_link_id!=$edit_id)
					{
						$messge = array('message' => 'Social Media type already exist.','class' => 'alert alert-danger align-center');
					
					$this->session->set_flashdata('item',$messge );
					$data['main'] = 'admin/social_links';
					$this->load->view('layout/main_admin',$data);
					}
					else
					{
						$this->Social_Model->update_social_link_type($edit_id);

						//Set Message
						$messge = array('message' => 'Social Media Type Updated successfully','class' => 'alert alert-success align-center');
						$this->session->set_flashdata('item',$messge );
						redirect('social/social_links_type');
					}
				}
					else
					{
						$this->Social_Model->update_social_link_type($edit_id);

						//Set Message
						$messge = array('message' => 'Social Media Type Updated successfully','class' => 'alert alert-success align-center');
						$this->session->set_flashdata('item',$messge );
						redirect('social/social_links_type');
					}
			
				redirect('social/social_links_type');
			}
		}
	}

	public function delete_social_link_type($id)
    {
    	$this->Social_Model->delete_social_link_type($id);
    	$messge = array('message' => 'Social Media Type deleted.','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
    	redirect('social/social_links_type');
    }

}
?>