<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
   public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_Model');
          $this->load->model('Qr_Model');
          $this->load->model('Education_Model');
    }

  public function dashboard()
  {
    $result = $this->User_Model->get_views_count($this->session->userdata('id'));
    if($result) 
      $data['views_count'] = $result->visiters;
   $data['new_activiti'] =$this->User_Model->get_activiti();
       $data['lead_count'] =  $this->User_Model->get_views_lead($this->session->userdata('id'));
              $data['enq_count'] =  $this->User_Model->get_views_enq($this->session->userdata('id'));
   $data['notifications'] =$this->User_Model->get_notifications($this->session->userdata('id'));

    $data['main'] = 'home_view';
    $this->load->view('layout/main_view',$data);
  }
  public function scanner()
  {
    $user=$this->session->userdata('id');
    			$result = $this->Qr_Model->get_qr_by_user($user);
        $data['qr_details'] = $result;
 $data['devices'] = $this->Qr_Model->getRows($user);
    $data['user'] = $user;
    $data['main'] = 'qr_scanner';
  $this->load->view('layout/main_view',$data);
   // $this->load->view('qr_scanner');
  }
   public function scanner_test()
  {
    $user=$this->session->userdata('id');
    			$result = $this->Qr_Model->get_qr_by_user($user);
        $data['qr_details'] = $result;
 
    $data['user'] = $user;
    $data['main'] = 'qr_scanner_final';
  $this->load->view('layout/main_view',$data);
   // $this->load->view('qr_scanner');
  }
  public function edit_qr($user,$content)
  {
  
$this->db->where('qr_text',$content);
$this->db->where('user_id','0');

    $query = $this->db->get('qr_images');
    if ($query->num_rows() > 0){
        
    
    $this->db->set('user_id', $user);
            $this->db->where('qr_text', $content);
            $rslt=$this->db->update('qr_images');
           echo $rslt;
           
    }
   else
   {
        echo 0;
   }
 
  }
  public function details()
  {
    $id = $this->session->userdata('id');
    
   // $user = $this->db->get_where('users', ['id' => $id])->row_array();
    $result = $this->User_Model->edit_user($id);
    $data['user_details'] = $result;
    $data['tab'] = 'tab1';
    $data['main'] = 'users/profile';//personal_details
    $userlevel = $this->session->userdata('user_level');
    if($userlevel==1 || $userlevel==2)
      $this->load->view('layout/main_admin',$data);
    else
     $this->load->view('layout/main_view',$data);

    if ($this->input->post('action')) 
    {
      
      $edit_id = $this->input->post('action');
      $data['title'] = 'Update User';

      $this->form_validation->set_rules('name', 'Name', 'required');
      $this->form_validation->set_rules('address', 'Billing Address', 'required');
      $this->form_validation->set_rules('shipping_address', 'Shipping Address', 'required');

      if($this->form_validation->run() === FALSE){
        $messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
        $this->session->set_flashdata('item',$messge );
        redirect('users/details');
      }else{
        $data = array(); 
            $user_id = $this->session->userdata('id');
               if(!empty($_FILES['user_image']['name'])){ 
                    $imageName = $_FILES['user_image']['name']; 
                     
                    // File upload configuration 
                    $uploadPath = 'uploads/user_images/'; 
                    $config['upload_path'] = $uploadPath;  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('user_image'))
                      $filename = $this->upload->data('file_name');
                }
                        $data = [
                          'name' => $this->input->post('name'),
                          'lname' => $this->input->post('lname'),
                          'phone' => $this->input->post('phone'),
                          'phone2' => $this->input->post('phone2'),
                          'company' => $this->input->post('company'),
                          'job_title' => $this->input->post('job_title'),
                          'type' => $this->input->post('type'),
                          'address' => $this->input->post('address'),
                          'shipping_address' => $this->input->post('shipping_address'),
                          'about' => $this->input->post('about')
                        ];
                        if(isset($filename))
                          $data['user_image']= $filename;
                          // Insert files data into the database 
                           $insert =$this->User_Model->update_user_details($edit_id,$data);

                          if($insert){ 
                            //Set Message
                            $messge = array('message' => 'User Updated successfully','class' => 'alert alert-success align-center');
                            $this->session->set_flashdata('item',$messge );
                            redirect('users/details');
                          }else{ 
                              $messge = array('message' => 'Some problems occurred, please try again.','class' => 'alert alert-danger align-center');
                              $this->session->set_flashdata('item',$messge );
                              redirect('users/details/');
                          } 
               
      }
    }
  }
    
  public function education_details($id = NULL)
	{
		$edit_id = $id;
		$messge = array('message' => '','class' => '');
    $data['educations'] = $this->Education_Model->get_educations();
   // $edu = $this->Education_Model->get_educations();
    //$data['edu_count'] = count($edu);
    $data['tab'] = 'tab2';
		if ($this->input->post('action') == 'create') 
		{
			$data['title'] = 'Add Education';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('edu_type', 'Type', 'required');

			if($this->form_validation->run() === FALSE){
				$data['educations'] = $this->Education_Model->get_educations();
				$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
				$this->session->set_flashdata('item',$messge );
				$data['main'] = 'users/profile';
				$this->load->view('layout/main_view',['data' => $data]);
			}else{
				$this->Education_Model->add_education();

				//Set Message
				$messge = array('message' => 'Education Added Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item', $messge);
				redirect('users/education_details');
			}
		}
		else
		{
			$edit_id = $this->input->post('action');
			$data['title'] = 'Update Education';

			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('edu_type', 'Type', 'required');

			if($this->form_validation->run() === FALSE){
				$data['educations'] = $this->Education_Model->get_educations();
				$result = $this->Education_Model->edit_education($id);
				$data['education'] = $result;
				$data['main'] = 'users/education_details';
				if($edit_id ){
					$messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
					$this->session->set_flashdata('item',$messge );
				}
				$this->load->view('layout/main_view',['data' => $data]);


			}else{
				$this->Education_Model->update_education($edit_id);

				//Set Message
				$messge = array('message' => 'Education Updated Successfully','class' => 'alert alert-success align-center');
				$this->session->set_flashdata('item',$messge );
				redirect('users/education_details');
			}
		}
	}

public function update_edu()
{
    $data = array(); 
  
    $data = array(  'user_id' => $this->session->userdata('id'),
						  'name' => $this->input->post('name'),
						  'start_date' => $this->input->post('start_date'),
						  'end_date' => $this->input->post('end_date'),
					'edu_type' => $this->input->post('edu_type'),
						  );
						  $id=$this->input->post('edu_id');
						  $this->db->where('education_id',$id);
			$res=  $this->db->update('education', $data);
            redirect('users');
    
  }

  public function view_educ()
  {
$id=$_POST["user_id"];

      $data = array(); 
    $output = array(); 
      $user_id = $this->session->userdata('id');
     
      // Get files data from the database 
      $data = $this->Education_Model->getedu($id);
      foreach($data as $row)  
         {  
              $output['name'] = $row->name; 
              $output['education_id'] = $row->education_id; 
            
                    $output['edu_type'] = $row->edu_type;  
                     $output['start_date'] = $row->start_date;  
           $output['end_date'] = $row->end_date;  
               $output['description'] = $row->description;  
              
         }   
    echo json_encode($output);
  }

  public function view_test()
    {
$id=$_POST["user_id"];

        $data = array(); 
      $output = array(); 
        $user_id = $this->session->userdata('id');
       
        // Get files data from the database 
        $data = $this->Education_Model->getedu($id);
        foreach($data as $row)  
           {  
                $output['name'] = $row->name; 
                $output['education_id'] = $row->education_id; 
              
                      $output['university'] = $row->university;  
                       $output['start_date'] = $row->start_date;  
             $output['end_date'] = $row->end_date;  
                 $output['description'] = $row->description;  
                
           }   
      echo json_encode($output);
    }

public function delete_education($id)
    {
        $this->Education_Model->delete_education($id);
        $messge = array('message' => 'Education Deleted Successfully','class' => 'alert alert-danger align-center');
        $this->session->set_flashdata('item',$messge );
        redirect('users/education_details');
    }
}
?>