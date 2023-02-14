<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends CI_Controller {
   public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('User_Model');
          $this->load->model('Qr_Model');
    }

  public function dashboard()
  {
    $result = $this->User_Model->get_views_count($this->session->userdata('id'));
    if($result) 
      $data['views_count'] = $result->visiters;
    $data['main'] = 'home_view';
    $this->load->view('layout/main_view',$data);
  }
  public function scanner()
  {
    $user=$this->session->userdata('id');
    			$result = $this->Qr_Model->get_qr_by_user($user);
        $data['qr_details'] = $result;
 
    $data['user'] = $user;
    $data['main'] = 'qr_scanner';
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
    $data['main'] = 'users/personal_details';
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
                          'type' => $this->input->post('type'),
                          'profession' => $this->input->post('profession'),
                          'website' => $this->input->post('website'),
                          'google_map_link' => $this->input->post('google_map_link'), 
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
    
}
?>