<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {
   public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Contact_Model');
    }
    public function index()
    {
      $user_id = $this->session->userdata('id');
      $result = $this->Contact_Model->get_contact_by_user($user_id);
      $data['tab'] = 'tab2';
      $data['contact_details'] = $result;
      $this->load->view('users/contact_tab',$data);
    }

  public function contact_details($id = NULL)
  {
    $data = array();
    $data['tab']='tab2';
    if ($this->input->post('action') == 'create') 
    {
      $this->form_validation->set_rules('email1', 'Email 1', 'required');
      $this->form_validation->set_rules('phone1', 'Phone 1', 'required');
      $this->form_validation->set_rules('address1', 'Address 1', 'required');
      $this->form_validation->set_rules('city', 'City', 'required');

      if($this->form_validation->run() === FALSE)
      {
        $data['contact_details'] =$this->Contact_Model->get_contact_by_user($user_id);
        $messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
        $this->session->set_flashdata('item',$messge );
        $data['main'] = 'users/company_info';
        $this->load->view('layout/main_view',$data);
      }
      else
      {
        $this->Contact_Model->add_contact();
        //Set Message
        $messge = array('message' => 'Contact Details added successfully','class' => 'alert alert-success align-center');
        $this->session->set_flashdata('item',$messge );
        redirect('contact/contact_list');
      }
    }
    else
    {
      $edit_id = $this->input->post('action');
      $user_id = $this->session->userdata('id');
      $res = $this->Contact_Model->get_contact_by_user($user_id);
      if(isset($res) && ($res!=''))
        $id = $res->contact_id;
      
      $this->form_validation->set_rules('email1', 'Email 1', 'required');
      $this->form_validation->set_rules('phone1', 'Phone 1', 'required');
      $this->form_validation->set_rules('address1', 'Address 1', 'required');
      $this->form_validation->set_rules('city', 'City', 'required');

      if($this->form_validation->run() === FALSE)
      {
        if($edit_id )
        {
          $messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
          $this->session->set_flashdata('item',$messge );
        }
        $result = $this->Contact_Model->edit_contact($id);
        $data['contact_details'] = $result;
        $this->load->view('users/contact_tab',$data);
      }
      else
      {
          $this->Contact_Model->update_contact_details($edit_id);
          //Set Message
          $messge = array('message' => 'Contact Details Updated successfully','class' => 'alert alert-success align-center');
          $this->session->set_flashdata('item',$messge );
          redirect('contact/contact_list');
      }
    }
  }

   public function contact_list(){ 
        $data = array(); 
        $errorUploadType = $statusMsg = ''; 
        $user_id = $this->session->userdata('id');
         
        // Get files data from the database 
        $data['contact_details'] = $this->Contact_Model->get_contact_by_user($user_id); 
        $data['tab'] = 'tab2';
    
        $data['main'] = 'users/company_info';
        $this->load->view('layout/main_view',$data);
    } 

    public function view_contact()
    {
        $data = array(); 
        $output = array(); 
        $user_id = $this->session->userdata('id');
        // Get files data from the database 
        $data =  $this->Contact_Model->get_contact_dt($user_id); 
        foreach($data as $row)  
           {  
                $output['email1'] = $row->email1;
                $output['email2'] = $row->email2; 
                $output['email3'] = $row->email3; 
                $output['phone1'] = $row->phone1;
                $output['phone2'] = $row->phone2; 
                $output['phone3'] = $row->phone3;  
                $output['contact_id'] = $row->contact_id;
                $email_count = 0;
                if ($row->email1!='')
                {
                  $email_count += 1;
                }
                if ($row->email2!='')
                {
                  $email_count += 1;
                }
                if ($row->email3!='')
                {
                  $email_count += 1;
                }
                $output['email_count'] = $email_count;

                $phone_count = 0;
                if ($row->phone1!='')
                {
                  $phone_count += 1;
                }
                if ($row->phone2!='')
                {
                  $phone_count += 1;
                }
                if ($row->phone3!='')
                {
                  $phone_count += 1;
                }
                $output['phone_count'] = $phone_count;
                
           }   
      echo json_encode($output);
    }


}
?>