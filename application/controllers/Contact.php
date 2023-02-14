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
      redirect('contact/contact_details');
    }

  public function contact_details($id = NULL)
  {
    
    if ($this->input->post('action') == 'create') 
    {
      $this->form_validation->set_rules('mob1', 'Mobile 1', 'required');

      if($this->form_validation->run() === FALSE){
        $messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
        $this->session->set_flashdata('item',$messge );
        $data['main'] = 'users/contact_details';
        $this->load->view('layout/main_view',$data);

      }else{

        $this->Contact_Model->add_contact();

        //Set Message
        $messge = array('message' => 'Contact Details added successfully','class' => 'alert alert-success align-center');
        $this->session->set_flashdata('item',$messge );
        redirect('contact/contact_details');
      }
    }
    else
    {
      $edit_id = $this->input->post('action');
      $user_id = $this->session->userdata('id');
      $res = $this->Contact_Model->get_contact_by_user($user_id);
      if(isset($res) && ($res!=''))
        $id = $res->contact_id;
      
      $this->form_validation->set_rules('mob1', 'Mobile 1', 'required');

      if($this->form_validation->run() === FALSE){
        if($edit_id ){
          $messge = array('message' => 'Please fill the mandatory fields','class' => 'alert alert-danger align-center');
          $this->session->set_flashdata('item',$messge );
        }
         $result = $this->Contact_Model->edit_contact($id);
          $data['contact_details'] = $result;
          $data['main'] = 'users/contact_details';
          $this->load->view('layout/main_view',$data);
        }else{
          $this->Contact_Model->update_contact_details($edit_id);
          //Set Message
          $messge = array('message' => 'Contact Details Updated successfully','class' => 'alert alert-success align-center');
          $this->session->set_flashdata('item',$messge );
          redirect('contact/contact_details');
        }
      }
  } 
  
}
?>