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
    	$data = array(); 
      	$id= $_REQUEST['id'];
      	$errorUploadType = $statusMsg = ''; 
      	$user_id = $this->session->userdata('id');
      	// Get files data from the database 
      	$data['achievements'] = $this->Achievements_Model->get_achievements();
      	$this->load->view('users/achievementstab',$data);
     /* if($this->input->post('search')){ 
          $from_date = $this->input->post('from_date');
          $to_date = $this->input->post('to_date');
          $data['from_date'] = $from_date;
          $data['to_date'] = $to_date;
            // Get files data from the database 
         $data['educations'] = $this->Education_Model->get_educations($from_date,$to_date);
      }*/
    }

    public function achievements($id = NULL)
	{
		$edit_id = $id;
		$data['tab'] = 'tab4';
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Achievements';

			$this->form_validation->set_rules('name', 'Achievements', 'required');

			if($this->form_validation->run() === FALSE){
				$data['achievements'] = $this->Achievements_Model->get_achievements();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'users/profile';
				$this->load->view('layout/main_view',$data);
			}else{
				$data = array(); 
            	$user_id = $this->session->userdata('id');
               	if(!empty($_FILES['ach_image']['name'])){ 
                    $imageName = $_FILES['ach_image']['name'];
                    // File upload configuration 
                    $uploadPath = 'uploads/user_images/'; 
                    $config['upload_path'] = $uploadPath;  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('ach_image'))
                      $filename = $this->upload->data('file_name');
                }
                        $data = [
                          	'name' => $this->input->post('name'),
                            'date' => $this->input->post('date'),
              				'description' => $this->input->post('description'),
              				'user_id' => $this->session->userdata('id')
                        ];
						
                        if($filename)
                          $data['image']= $filename;
                          // Insert files data into the database 
				$this->Achievements_Model->add_achievement($data);

				//Set Message
				$messge = array('message' => 'Achievements Added Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item', $messge);
				redirect('achievements/achievements_list');
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
				//$data['main'] = 'users/achievements';
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$this->load->view('users/achievementstab',$data);
			}else{
				$this->Achievements_Model->update_achievement($edit_id);

				//Set Message
				$messge = array('message' => 'Achievements Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('achievements/achievements_list');
			}
		}
	}

	public function delete_achievement($id)
    {
    	$this->Achievements_Model->delete_achievement($id);
    	$messge = array('message' => 'Achievements Deleted Successfully','class' => 'alert alert-danger align-center');
		$this->session->set_flashdata('item',$messge );
    	redirect('achievements/achievements_list');
    }

    public function achievements_list(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
         
        // Get files data from the database 
        $data['achievements'] = $this->Achievements_Model->get_achievements();
        
        $data['tab'] = 'tab4';
        if($this->input->post('search')){ 
            $from_date = $this->input->post('from_date');
            $to_date = $this->input->post('to_date');
            $data['from_date'] = $from_date;
            $data['to_date'] = $to_date;
              // Get files data from the database 
            $data['achievements'] = $this->Achievements_Model->get_achievements($from_date,$to_date);
        }
       
        $data['main'] = 'users/profile';
        $this->load->view('layout/main_view',$data);
    } 

    public function view_achievement($id)
    {
		//$id=$_POST["user_id"];

        $data = array(); 
        $output = array(); 
        $user_id = $this->session->userdata('id');
       	$data['tab'] = 'tab4';
        // Get files data from the database 
        $data = $this->Achievements_Model->getachievement($id);
        foreach($data as $row)  
        {  
            $output['ach_name'] = $row->name; 
            $output['achievement_id'] = $row->achievement_id; 
           	$output['ach_date'] = $row->date;  
            $output['ach_image'] = $row->image;  
            $output['ach_description'] = $row->description; 
        }   
      echo json_encode($output);
    }

  	public function update_ach()
	{
    	$data = array(); 
 		$id=$this->input->post('achid');
        $result = $this->Achievements_Model->edit_achievement($id);
        $prevImage = $result->image; 

               	if(!empty($_FILES['ach_image']['name'])){ 
                    $imageName = $_FILES['ach_image']['name'];
                    // File upload configuration 
                    $uploadPath = 'uploads/user_images/'; 
                    $config['upload_path'] = $uploadPath;  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('ach_image'))
                    {
                      $filename = $this->upload->data('file_name');
                      // Remove old file from the server  
                        if(!empty($prevImage)){ 
                            @unlink('./'.$uploadPath.$prevImage);  
                        } 
                    }

                }

				
    $data = ['user_id' => $this->session->userdata('id'),
						  'name' => $this->input->post('name'),
						  'date' => $this->input->post('date'),
						  'description' => $this->input->post('description'),
						  
						  ];
				if(isset($filename)&& $filename!='')
                    $data['image']= $filename;
						  $id=$this->input->post('ach');
						  $this->db->where('achievement_id',$id);
			$res=  $this->db->update('achievements', $data);
            redirect('achievements/achievements_list');
    
}

}
?>