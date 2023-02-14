<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manage_packages extends CI_Controller {

 	public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Manage_package_Model');
        $this->load->model('Package_Model');
    }

     public function index(){ 
        $data = array(); 
        $statusMsg = ''; 
         
        if($this->input->post('show_pages')){ 
            $package_id = $this->input->post('package');
            $data['selected_package'] = $package_id;
              // Get files data from the database 
            $data['show_pages'] = $this->Manage_package_Model->get_package_pages($package_id);
        }
    
        if($this->input->post('submit')){ 
            $package_id = $this->input->post('package');

            //insert size checkboxes into database.
            $pageArray = $this->input->post('page');  // Array
                   
            $pageString = implode(",", $pageArray);    // String

            $data = array(
                'package_id' => $package_id,
                'page'=>$pageString
                );

            $result = $this->Manage_package_Model->get_package_pages($package_id);
              // Get files data from the database 
            if($result)
            {
               $update = $this->Manage_package_Model->update_package_pages($package_id,$data);
               $messge = array('message' => 'Package Access Updated Successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('manage_packages');
            }
            else
            {
                $this->Manage_package_Model->insert($data);
                $messge = array('message' => 'Package Access Added Successfully','class' => 'alert alert-success align-center');
                $this->session->set_flashdata('item', $messge);
                redirect('manage_packages');
            }
              
        }
            // Pass the files data to view 
        $data['packages'] = $this->Package_Model->get_packages();
        $data['main'] = 'admin/manage_package';
		$this->load->view('layout/main_admin',$data);
    }

    public function delete_package_pages($id)
    { 
    	$statusMsg = ''; 
    	if($this->Manage_package_Model->getRows($id))
    	{
    		$data = $this->Manage_package_Model->getRows($id);
    		$filetodelete  = ('./uploads/cover_image/'.$data['file_name']);
    		if(file_exists('./uploads/cover_image/'.$data['file_name']))
    			unlink('./uploads/cover_image/'.$data['file_name']);

	    	$this->Manage_package_Model->delete_package_pages($id);
	    	$messge = array('message' => 'Cover Image Deleted Successfully','class' => 'alert alert-danger align-center');
			$this->session->set_flashdata('item',$messge );
	    	redirect('cover_image/');
    	}
    }

  
}
?>