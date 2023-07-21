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
    	$data = array(); 
      $id= $_REQUEST['id'];
      $errorUploadType = $statusMsg = ''; 
      $user_id = $this->session->userdata('id');
      // Get files data from the database 
      $data['testimonials'] =  $this->Testimonials_Model->get_testimonials();
      $this->load->view('users/testimonialstab',$data);
    }

    public function testimonials($id = NULL)
	{
		$edit_id = $id;
		$data['tab'] = 'tab3';
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Testimonials';

			$this->form_validation->set_rules('name', 'Testimonials', 'required');

			if($this->form_validation->run() === FALSE){
				$data['testimonials'] = $this->Testimonials_Model->get_testimonials();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'users/company_info';
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Testimonials_Model->add_testimonial();

				//Set Message
				$messge = array('message' => 'Testimonial Added successfully.','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('testimonials/testimonials_list');
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Testimonials';

			$this->form_validation->set_rules('name', 'Testimonials', 'required');

			if($this->form_validation->run() === FALSE){
				//$data['testimonials'] = $this->Testimonials_Model->get_testimonials();
				$result = $this->Testimonials_Model->edit_testimonial($id);
				$data['testimonial'] = $result;
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$this->load->view('users/testimonialstab',$data);
			}else{
				$this->Testimonials_Model->update_testimonial($edit_id);

				//Set Message
				$messge = array('message' => 'Testimonial Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('testimonials/testimonials_list');
			}
		}
	}

	public function testimonials_list(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
         
        // Get files data from the database 
        $data['testimonials'] = $this->Testimonials_Model->get_testimonials();
        
        $data['tab'] = 'tab3';
       
        $data['main'] = 'users/company_info';
        $this->load->view('layout/main_view',$data);
    } 

    public function view_testimonial($id)
    {
        $data = array(); 
        $output = array(); 
        $user_id = $this->session->userdata('id');
       	$data['tab'] = 'tab3';
        // Get files data from the database 
        $data = $this->Testimonials_Model->gettestimonial($id);
        foreach($data as $row)  
        {  
            $output['tname'] = $row->name; 
            $output['testimonial_id'] = $row->testimonial_id; 
            $output['tdesignation'] = $row->designation;  
            $output['tcompany'] = $row->company;  
            $output['tmessage'] = $row->message;  
            $output['user_id'] = $row->user_id;  
        }   
      echo json_encode($output);
    }

	public function delete_testimonial($id)
    {
    	$this->Testimonials_Model->delete_testimonial($id);
    	$messge = array('message' => 'Testimonial Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
    	redirect('testimonials/testimonials_list');
    }

    public function  update_testimonial()
 	{

    $data = array(); 
  
    $data = array(  'user_id' => $this->session->userdata('id'),
						  'name' => $this->input->post('name'),
						  'designation' => $this->input->post('designation'),
						   'company' => $this->input->post('company'),
						    'message' => $this->input->post('message'),
						  
						  );
						  $id=$this->input->post('id');
						  $this->db->where('testimonial_id ',$id);
			$res=  $this->db->update('testimonials', $data);
            redirect('testimonials/testimonials_list');
    
}

}
?>