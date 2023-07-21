<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Company extends CI_Controller {
   public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Company_Model');
    }
    public function index()
    {
      redirect('company/company_details');
      /*$user_id = $this->session->userdata('id');
      $res = $this->Company_Model->get_company_by_user($user_id);
      $data['tab'] = 'tab1';
      $data['company_details'] = $result;
      $this->load->view('users/company_info',$data);*/
    }

  public function company_details($id = NULL)
  {
    $data = array();
    $data['tab'] = 'tab1';
    if ($this->input->post('action') == 'create') 
    {
      $this->form_validation->set_rules('company_name', 'Company Name', 'required');
      $this->form_validation->set_rules('business_nature', 'Nature of Business', 'required');

      if($this->form_validation->run() === FALSE){
        $data['company_details'] = $this->Company_Model->get_company_by_user($user_id);
        $messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
        $this->session->set_flashdata('item',$messge );
        $data['main'] = 'users/company_info';
        $this->load->view('layout/main_view',$data);

      }else{ 
            $user_id = $this->session->userdata('id');
               if(!empty($_FILES['company_image']['name'])){ 
                    $imageName = $_FILES['company_image']['name']; 
                     
                    // File upload configuration 
                    $uploadPath = 'uploads/company_images/'; 
                    $config['upload_path'] = $uploadPath;  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('company_image'))
                      $filename = $this->upload->data('file_name');
                }
                        $data = [
                          'company_name' => $this->input->post('company_name'), 
                          'year_start' => $this->input->post('established_year'),
                          'business_nature  ' => $this->input->post('business_nature'),
                          'website' => $this->input->post('website'),
                          'gstin  ' => $this->input->post('gstin'),
                          'description' => $this->input->post('description'),
                          'user_id' => $this->session->userdata('id'),
                          'date' => date('Y-m-d')
                        ];
                        if($filename)
                          $data['company_image']= $filename;
                        $this->Company_Model->add_company($data);

        //Set Message
        $messge = array('message' => 'Company Details added successfully','class' => 'alert alert-success align-center');
        $this->session->set_flashdata('item',$messge );
        redirect('company/company_details');
      }
    }
    else
    {
      $edit_id = $this->input->post('action');
     // $id = $this->session->userdata('company_id');
      $user_id = $this->session->userdata('id');
      $res = $this->Company_Model->get_company_by_user($user_id);
        if(isset($res) && ($res!=''))
          $id = $res->company_id;

      $this->form_validation->set_rules('company_name', 'Company Name', 'required');
     // $this->form_validation->set_rules('business_nature', 'Nature of Business', 'required');

      if($this->form_validation->run() === FALSE){
        if($edit_id)
        {
         $messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
        $this->session->set_flashdata('item',$messge );
        redirect('company/company_details');
      }

        $result = $this->Company_Model->edit_company($id);
          $data['company_details'] = $result;
          $data['main'] = 'users/company_info';
          $this->load->view('layout/main_view',$data);
        }else{
          $data = array(); 
              $user_id = $this->session->userdata('id');
              $result = $this->Company_Model->edit_company($edit_id);
              $prevImage = $result->company_image; 

                if(!empty($_FILES['company_image']['name'])){
                    $imageName = $_FILES['company_image']['name'];
                    // File upload configuration 
                    $uploadPath = 'uploads/company_images/'; 
                    $config['upload_path'] = $uploadPath;  
                    $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                     
                    // Load and initialize upload library 
                    $this->load->library('upload', $config); 
                    $this->upload->initialize($config); 
                     
                    // Upload file to server 
                    if($this->upload->do_upload('company_image'))
                    {
                      $filename = $this->upload->data('file_name');
                      // Remove old file from the server  
                        if(!empty($prevImage)){ 
                            @unlink('./'.$uploadPath.$prevImage);  
                        } 
                    }

                }

        $data = ['company_name' => $this->input->post('company_name'), 
                'year_start' => $this->input->post('established_year'),
                'business_nature  ' => $this->input->post('business_nature'),
                'website' => $this->input->post('website'),
                'gstin  ' => $this->input->post('gstin'),
                'description' => $this->input->post('description')
                ];
                if(isset($filename)&& $filename!='')
                    $data['company_image']= $filename;


          $this->Company_Model->update_company_details($edit_id,$data);
          //Set Message
         $messge = array('message' => 'Company Details Updated successfully','class' => 'alert alert-success align-center');
        $this->session->set_flashdata('item',$messge );
          redirect('company/company_details');
        }
      }
  } 
  
}
?>