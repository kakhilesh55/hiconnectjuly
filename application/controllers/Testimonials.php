<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonials extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Testimonials_Model');
    }

    public function index()
    {
    	redirect('testimonials/testimonials');
    }

    public function testimonials($id = NULL)
	{
		$edit_id = $id;
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Testimonials';

			$this->form_validation->set_rules('name', 'Testimonials', 'required');

			if($this->form_validation->run() === FALSE){
				$data['testimonials'] = $this->Testimonials_Model->get_testimonials();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'users/testimonials';
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Testimonials_Model->add_testimonial();

				//Set Message
				$messge = array('message' => 'Testimonial Added successfully.','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('testimonials/testimonials');
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Testimonials';

			$this->form_validation->set_rules('name', 'Testimonials', 'required');

			if($this->form_validation->run() === FALSE){
				$data['testimonials'] = $this->Testimonials_Model->get_testimonials();
				$result = $this->Testimonials_Model->edit_testimonial($id);
				$data['testimonial'] = $result;
				$data['main'] = 'users/testimonials';
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Testimonials_Model->update_testimonial($edit_id);

				//Set Message
				$messge = array('message' => 'Testimonial Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('testimonials/testimonials');
			}
		}
	}

	public function delete_testimonial($id)
    {
    	$this->Testimonials_Model->delete_testimonial($id);
    	$messge = array('message' => 'Testimonial Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
    	redirect('testimonials/testimonials');
    }

}
?>