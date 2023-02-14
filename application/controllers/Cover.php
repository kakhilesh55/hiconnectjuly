<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cover extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Cover_Model');
    }

    public function index()
    {
    	redirect('cover/cover_category');
    }

    public function cover_category($id = NULL)
	{
		$edit_id = $id;
		validation_errors('');
		$messge = array('message' => '','class' => '');
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Cover Category';

			$this->form_validation->set_rules('category', 'Category', 'required');

			if($this->form_validation->run() === FALSE){
				$data['categories'] = $this->Cover_Model->get_categories();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'admin/category_cover';
				$this->load->view('layout/main_admin',$data);
			}else{
				$this->Cover_Model->add_category();

				//Set Message
				$messge = array('message' => 'New Category Added','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('cover/cover_category');
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Cover Category';

			$this->form_validation->set_rules('category', 'Category', 'required');

			if($this->form_validation->run() === FALSE){
				$data['categories'] = $this->Cover_Model->get_categories();
				$result = $this->Cover_Model->edit_category($id);
				$data['category'] = $result;
				$data['main'] = 'admin/category_cover';
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$this->load->view('layout/main_admin',$data);
			}else{
				$this->Cover_Model->update_category($edit_id);

				//Set Message
				$messge = array('message' => 'Category Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('cover/cover_category');
			}
		}
	}

	public function delete_category($id)
    {
    	$this->Cover_Model->delete_category($id);
    	$messge = array('message' => 'Category deleted.','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge);
    	redirect('cover/cover_category');
    }


}
?>