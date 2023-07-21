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
    	$data = array(); 
      	$id= $_REQUEST['id'];
      	$errorUploadType = $statusMsg = ''; 
      	$user_id = $this->session->userdata('id');
      	// Get files data from the database 
      	$data['experiences'] = $this->Experience_Model->get_experiences();
      	$this->load->view('users/worktab',$data);
     /* if($this->input->post('search')){ 
          $from_date = $this->input->post('from_date');
          $to_date = $this->input->post('to_date');
          $data['from_date'] = $from_date;
          $data['to_date'] = $to_date;
            // Get files data from the database 
         $data['educations'] = $this->Education_Model->get_educations($from_date,$to_date);
      }*/
    }

    public function experiences($id = NULL)
	{
		$edit_id = $id;
		$data['tab'] = 'tab3';
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Experience';

			$this->form_validation->set_rules('company', 'Company', 'required');
			$this->form_validation->set_rules('position', 'Position', 'required');

			if($this->form_validation->run() === FALSE){
				$data['experiences'] = $this->Experience_Model->get_experiences();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'users/profile';
				$this->load->view('layout/main_view',$data);
			}else{
				$this->Experience_Model->add_experience();

				//Set Message
				$messge = array('message' => 'Experience Added Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item', $messge);
				redirect('experiences/experience_list');
			}
		}
		else
		{
			//$edit_id = $this->input->post('action');
			$data['title'] = 'Update Experience';

			$this->form_validation->set_rules('company', 'Company', 'required');
			$this->form_validation->set_rules('position', 'Position', 'required');

			if($this->form_validation->run() === FALSE){
				//$data['experiences'] = $this->Experience_Model->get_experiences();
				$result = $this->Experience_Model->edit_experience($id);
				$data['experience'] = $result;
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				// $data['main'] = 'users/worktab';
				//$this->load->view('layout/main_view',$data);
				 $this->load->view('users/worktab',$data);
			}else{
				$this->Experience_Model->update_experience($edit_id);

				//Set Message
				$messge = array('message' => 'Experience Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('experiences/experience_list');
			}
		}
	}

	public function delete_experience($id)
    {
    	$this->Experience_Model->delete_experience($id);
    	$messge = array('message' => 'Experience Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
    	redirect('experiences/experience_list');
    }

    public function experience_list(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
         
        // Get files data from the database 
        $data['experiences'] = $this->Experience_Model->get_experiences();
        
            $data['tab'] = 'tab3';
        if($this->input->post('search')){ 
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
            $data['from_date'] = $from_date;
            $data['to_date'] = $to_date;
              // Get files data from the database 
            $data['experiences'] = $this->Experience_Model->get_experiences($from_date,$to_date);
        }
       
        $data['main'] = 'users/profile';
        $this->load->view('layout/main_view',$data);
    } 

    public function view_work($id)
    {
		//$id=$_POST["user_id"];

        $data = array(); 
        $output = array(); 
        $user_id = $this->session->userdata('id');
       	$data['tab'] = 'tab3';
        // Get files data from the database 
        $data = $this->Experience_Model->getwork($id);
        foreach($data as $row)  
        {  
            $output['company'] = $row->company; 
            $output['experience_id'] = $row->experience_id; 
           	$output['position'] = $row->position;  
            $output['place'] = $row->place;  
            $output['description'] = $row->description;  
            $output['status'] = $row->status;  
           	$output['start_date'] = $row->start_date;  
           	$output['end_date'] = $row->end_date; 
        }   
      echo json_encode($output);
    }

public function update_exp()
{
    $data = array(); 
    $id=$this->input->post('exp_id');
    $this->Experience_Model->update_experience($id);
  
   /* $data = array(  'user_id' => $this->session->userdata('id'),
					'company' => $this->input->post('company'),
					'start_date' => $this->input->post('start_date'),
					'end_date' => $this->input->post('end_date'),
					'position' => $this->input->post('position'),
					'description' => $this->input->post('description'),
					'place' => $this->input->post('place'));
						  );
						  $id=$this->input->post('exp_id');
						  $this->db->where('experience_id',$id);
			$res=  $this->db->update('experience', $data);*/
            redirect('experiences/experience_list');
    
}
}
?>